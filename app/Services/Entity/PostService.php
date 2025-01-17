<?php

namespace App\Services\Entity;

use App\Http\Requests\MovePostRequest;
use App\Models\Entity;
use App\Models\Post;
use App\Services\EntityMappingService;

class PostService
{
    protected EntityMappingService $mappingService;

    protected Post $post;

    protected int $entityId;

    public function __construct(EntityMappingService $mappingService)
    {
        $this->mappingService = $mappingService;
    }

    public function post(Post $post): self
    {
        $this->post = $post;
        return $this;
    }

    /**
     * Move or copy an entity note to another entity
     *
     * @param Post $post
     * @param MovePostRequest $request
     * @return Post
     */
    public function handle(MovePostRequest $request): Post
    {
        $this->entityId = (int) $request->get('entity');
        if ($request->has('copy')) {
            return $this->copy();
        }
        return $this->move();
    }

    /**
     * Copy the post with its permissions to another entity
     * @return Post
     * @throws \Exception
     */
    protected function copy(): Post
    {
        $entity = Entity::findOrFail($this->entityId);
        $newPost = $this->post->copyTo($entity);

        // Update the "mentioned in" mapping for the entity
        $this->mappingService->mapPost($newPost);

        return $newPost;
    }

    /**
     * Move the post to another entity
     *
     * @return Post
     */
    protected function move(): Post
    {
        $this->post->entity_id = $this->entityId;
        $this->post->save();

        return $this->post;
    }
}
