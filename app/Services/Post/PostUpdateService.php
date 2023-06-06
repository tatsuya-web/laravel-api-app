<?php

namespace App\Services\Post;


use App\Services\RepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Post;

class PostUpdateService
{
    function __construct(RepositoryInterface $repo, FormRequest $request)
    {
        $this->repo = $repo;
        $this->request = $request;
    }

    public function update(): Post
    {
        $validated = $this->request->validated();
        /**
         * @var Post $post
         */
        $post = $this->repo->updateExcecute($validated);

        return $post;
    }
}