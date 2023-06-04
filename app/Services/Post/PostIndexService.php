<?php

namespace App\Services\Post;

use App\Services\RepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Collection;

/**
 * @return PostIndexService
 * @throws \Illuminate\Contracts\Container\BindingResolutionException
 * @throws \ReflectionException
 */
function newPostIndexService(RepositoryInterface $repo, FormRequest $request): PostIndexService
{
    return new PostIndexService($repo, $request);
}

class PostIndexService
{
    function __construct(RepositoryInterface $repo, FormRequest $request)
    {
        $this->repo = $repo;
        $this->request = $request;
    }

    public function index(): Collection
    {
        $validated = $this->request->validated();
        /**
         * @var Collection $posts
         */
        $posts = $this->repo->listQuery($validated);

        return $posts;
    }
}