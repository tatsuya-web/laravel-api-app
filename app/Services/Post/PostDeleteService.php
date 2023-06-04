<?php

namespace App\Services\Post;


use App\Services\RepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @return PostDeleteService
 * @throws \Illuminate\Contracts\Container\BindingResolutionException
 * @throws \ReflectionException
 */
function newPostDeleteService(RepositoryInterface $repo, FormRquest $request): PostDeleteService
{
    return new PostDeleteService($repo, $request);
}

class PostDeleteService
{
    function __construct(RepositoryInterface $repo, FormRequest $request)
    {
        $this->repo = $repo;
        $this->request = $request;
    }

    public function delete(): void
    {
        $validated = $this->request->validated();
        $this->repo->deleteExcecute($validated);
    }
}