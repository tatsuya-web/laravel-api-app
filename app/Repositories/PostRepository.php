<?php

namespace App\Repositories;

use App\Models\Post;
use App\Services\RepositoryInterface;
use Illuminate\Support\Collection;

class PostRepository implements RepositoryInterface
{
    public function listQuery(array $validated): Collection
    {
        /**
         * @var Collection $posts
         */
        $posts = Post::where('user_id', $validated['user_id'])
            ->orderBy('created_at', 'desc')
            ->get();

        return $posts;
    }

    public function createExcecute(array $validated): Post
    {
        /**
         * @var Post $post
         */
        $post = Post::create($validated);

        return $post;
    }

    public function readQuery(array $validated): Post
    {
        /**
         * @var Post $post
         */
        $post = Post::findOrFail($validated['id']);

        return $post;
    }

    public function updateExcecute(array $validated): Post
    { 
        /**
         * @var Post $post
         */
        $post = Post::findOrFail($validated['id']);

        $post->update($validated);

        return $post;
    }

    public function deleteExcecute(array $validated): void
    {
        /**
         * @var Post $post
         */
        $post = Post::findOrFail($validated['id']);
        $post->delete();
    }
}