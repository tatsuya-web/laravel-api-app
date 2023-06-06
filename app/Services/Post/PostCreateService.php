<?php

namespace App\Services\Post;

use App\Models\Post;
use App\Services\RepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;

class PostCreateService
{
    function __construct(RepositoryInterface $repo, FormRequest $request)
    {
        $this->repo = $repo;
        $this->request = $request;
    }

    /**
     * @return Post
     */
    public function create(): Post
    {
        $validated = $this->request->validated();
        /**
         * @var Post $post
         */
        $post = $this->repo->createExcecute($validated);
        
        return $post;
    }
}