<?php

namespace App\Observers;

use App\Facades\Mentions;
use App\Models\EntityNotePermission;
use App\Models\Post;
use App\Models\PostPermission;
use App\Services\EntityMappingService;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PostObserver
{
    /**
     * Purify trait
     */
    use PurifiableTrait;

    /**
     * Service used to build the map of the entity
     */
    protected EntityMappingService $entityMappingService;

    /**
     * CharacterObserver constructor.
     */
    public function __construct(EntityMappingService $entityMappingService)
    {
        $this->entityMappingService = $entityMappingService;
    }

    /**
     * Saving a post, prepare lots of data
     */
    public function saving(Post $post)
    {
        $post->entry = $this->purify(Mentions::codify($post->entry));

        // Is private hook for non-admin (who can't set is_private)
        if (!isset($post->is_private)) {
            $post->is_private = false;
        }

        $settings = $post->settings;
        if (request()->has('settings[collapse]')) {
            if ((bool) request()->get('settings[collapse]')) {
                $settings['collapse'] = true;
            } else {
                unset($settings['collapse']);
            }
        }
        $post->settings = $settings;
    }

    /**
     * Before we save the new post to the db
     */
    public function creating(Post $post)
    {
        if (!$post->position == 1) {
            // Make sure we're adding this note at the end of other posts
            $last = $post->entity->posts()
                ->where('id', '!=', $post->id)
                ->orderBy('position', 'desc')
                ->first();
            $post->position = $last ? ($last->position + 1) : 1;
        }
    }

    /**
     * After the new post has been saved
     */
    public function created(Post $post)
    {
        $context = [
            'user' => auth()->user()->id,
            'post' => $post->id,
            'entity' => $post->entity_id,
        ];
        Log::info('Created post', $context);
    }

    /**
     * After the post has been saved
     */
    public function saved(Post $post)
    {
        $this->savePermissions($post);

        // When adding or changing an entity note to an entity, we want to update the
        // last updated date to reflect changes in the dashboard.
        $post->entity->child->touchQuietly();

        // If the entity note's entry has changed, we need to re-build it's map.
        if ($post->isDirty('entry')) {
            $this->entityMappingService->mapPost($post);
        }
    }

    /**
     * After the post has been deleted
     */
    public function deleted(Post $post)
    {
        // When deleting an entity note, we want to update the entity's last update
        // for the dashboard. Careful of this when deleting an entity, we could be
        // entering a non-ending loop.
        if ($post->entity) {
            $post->entity->child->touch();
        }

        $context = [
            'user' => auth()->user()->id,
            'post' => $post->id,
            'entity' => $post->entity_id,
        ];
        Log::info('Deleted post', $context);
    }

    public function savePermissions(Post $post): bool
    {
        if (!request()->has('permissions') || !auth()->user()->can('permission', $post->entity->child)) {
            return false;
        }

        $existing = $parsed = [];
        foreach ($post->permissions as $perm) {
            $key = $perm->isUser() ? 'u_' : 'r_';
            $existing[$key . $perm->user_id] = $perm;
        }

        $users = request()->post('perm_user', []);
        $perms = request()->post('perm_user_perm', []);

        foreach ($users as $key => $user) {
            if ($user == '$SELECTEDID$') {
                continue;
            }

            $existingKey = 'u_' . $user;
            if (isset($existing[$existingKey])) {
                $perm = $existing[$existingKey];
                $perm->permission = $perms[$key];
                $perm->save();
                unset($existing[$existingKey]);
                $parsed[] = $existingKey;
            } elseif (!in_array($existingKey, $parsed)) {
                EntityNotePermission::create([
                    'post_id' => $post->id,
                    'user_id' => $user,
                    'permission' => $perms[$key]
                ]);
                $parsed[] = $existingKey;
            }
        }

        $roles = request()->post('perm_role', []);
        $perms = request()->post('perm_role_perm', []);

        foreach ($roles as $key => $user) {
            if ($user == '$SELECTEDID$') {
                continue;
            }

            $existingKey = 'r_' . $user;
            if (isset($existing[$existingKey])) {
                $perm = $existing[$existingKey];
                $perm->permission = $perms[$key];
                $perm->save();
                unset($existing[$existingKey]);
                $parsed[] = $existingKey;
            } elseif (!in_array($existingKey, $parsed)) {
                EntityNotePermission::create([
                    'post_id' => $post->id,
                    'role_id' => $user,
                    'permission' => $perms[$key]
                ]);
                $parsed[] = $existingKey;
            }
        }

        // Cleanup permissions that are no longer used
        foreach ($existing as $oldPermission) {
            $oldPermission->delete();
        }

        return true;
    }
}
