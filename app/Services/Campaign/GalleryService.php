<?php

namespace App\Services\Campaign;

use App\Http\Requests\Campaigns\GalleryImageStore;
use App\Models\Image;
use App\Models\Visibility;
use App\Observers\PurifiableTrait;
use App\Traits\CampaignAware;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class GalleryService
{
    use CampaignAware;
    use PurifiableTrait;

    /** @var Image */
    protected Image $image;

    protected array $folders = [];

    /**
     * @param Image $image
     * @return $this
     */
    public function image(Image $image): self
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @param Request $request
     * @param string $field
     * @return array
     */
    public function store(GalleryImageStore $request, string $field = 'file'): array
    {
        $images = [];
        /** @var \Illuminate\Http\UploadedFile $source */
        $files = $request->file($field);
        if (!is_array($files)) {
            $files = [$files];
        }
        foreach ($files as $source) {
            // Prepare the name as sent by the user. It gets purified in the observer
            $name = $source->getClientOriginalName();
            $name = Str::beforeLast($name, '.');

            $image = new Image();
            $image->campaign_id = $this->campaign->id;
            $image->created_by = $request->user()->id;
            $image->id = Str::uuid()->toString();
            $image->ext = $source->extension();
            $image->size = (int) ceil($source->getSize() / 1024); // kb
            $image->name = mb_substr($name, 0, 45);
            $image->folder_id = $request->post('folder_id');
            $image->visibility_id = $this->campaign->defaultVisibilityID();
            $image->save();

            $source
                ->storePubliclyAs(
                    $image->folder,
                    $image->file,
                    ['disk' => 's3']
                );

            $images[] = $image;
        }

        return $images;
    }

    /**
     * @param array $options
     * @return Image
     */
    public function update(array $options): Image
    {
        $this->image->update([
            'name' => Arr::get($options, 'name'),
            'folder_id' => Arr::get($options, 'folder_id', null),
            'visibility_id' => Arr::get($options, 'visibility_id', Visibility::VISIBILITY_ALL),
        ]);

        return $this->image;
    }

    /**
     * Create a folder (virtual image)
     * @param Request $request
     */
    public function createFolder(Request $request)
    {
        $folder = new Image();
        $folder->id = Str::uuid();
        $folder->campaign_id = $this->campaign->id;
        $folder->name = $this->purify($request->post('name'));
        $folder->folder_id = $request->post('folder_id');
        $folder->is_folder = true;
        $folder->created_by = $request->user()->id;
        $folder->visibility_id = (int) $request->post('visibility_id');
        $folder->save();

        return $folder;
    }

    /**
     * @return array
     */
    public function folderList(): array
    {
        $this->folders = ['' => __('campaigns/gallery.no_folder')];

        /** @var Image[] $rootFolders */
        $rootFolders = $this->campaign->images()->folders()->whereNull('folder_id')
            ->with('folders')
            ->select(['id', 'name'])
            ->orderBy('name')
            ->get();
        foreach ($rootFolders as $folder) {
            $this->folders[$folder->id] = $folder->name;
            $this->loopSubfolder($folder, 1);
        }

        return $this->folders;
    }

    /**
     * @param Image $folder
     * @param int $level
     */
    protected function loopSubfolder(Image $folder, int $level)
    {
        $subfolders = $folder->folders;
        foreach ($subfolders as $subfolder) {
            $this->folders[$subfolder->id] = str_repeat('-', $level) . ' ' . $subfolder->name;
            $this->loopSubfolder($subfolder, $level + 1);
        }
    }
}
