<?php

namespace App\Services\Entity;

use App\Http\Requests\ReorderStories;
use App\Models\Entity;
use App\Models\EntityNote;
use App\Traits\EntityAware;
use App\Traits\UserAware;
use Illuminate\Support\Facades\Log;

class StoryService
{
    use UserAware;
    use EntityAware;

    /**
     * @param ReorderStories $request
     * @return bool
     */
    public function reorder(ReorderStories $request): bool
    {
        $posts = $request->get('posts');
        if (empty($posts)) {
            return false;
        }

        // If the story element isn't in first place, we need to have negative starting positions.
        $position = 0;
        $storyPosition = array_search('story', array_values($posts));
        $position -= $storyPosition;

        foreach ($posts as $id => $data) {
            // We only want to process posts
            if (!is_array($data) || $data == 'story' || $id === 'story') {
                continue;
            }
            $id = $data['id'];
            /** @var EntityNote|null $story */
            $story = $this->entity->notes->where('id', $id)->first();
            if (empty($story)) {
                continue;
            }

            // Collapses status
            if (isset($data['collapsed'])) {
                $settings = $story->settings;
                if ($data['collapsed']) {
                    $settings['collapsed'] = true;
                } else {
                    unset($settings['collapsed']);
                }
                $story->settings = $settings;
            }
            if (isset($data['visibility_id'])) {
                $story->visibility_id = $data['visibility_id'];
            }

            // We want the first post after the story to always have the "1" position
            if ($position === 0) {
                $position = 1;
            }

            $story->position = $position;
            /*$story->savingObserver = false;
            $story->savedObserver = false;*/
            $story->saveQuietly();
            $position++;
        }

        Log::info('Reorder posts', [
            'user' => $this->user->id,
            'entity' => $this->entity->id,
        ]);

        //$this->entity->touchQuietly();
        return true;
    }
}
