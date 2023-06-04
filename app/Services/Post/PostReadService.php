<?php

namespace App\Services\Post;


use App\Services\RepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Post;

/**
 * @return PostReadService
 * @throws \Illuminate\Contracts\Container\BindingResolutionException
 * @throws \ReflectionException
 */
function newPostReadService(RepositoryInterface $repo, FormRequest $request): PostReadService
{
    return new PostReadService($repo, $request);
}

class PostReadService
{
    function __construct(RepositoryInterface $repo, FormRequest $request)
    {
        $this->repo = $repo;
        $this->request = $request;
    }

    public function read(): Post
    {
        $validated = $this->request->validated();
        /**
         * @var Post $post
         */
        $post = $this->repo->readQuery($validated);
        
        return $post;
    }
}