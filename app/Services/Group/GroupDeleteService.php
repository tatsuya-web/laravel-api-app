<?php

namespace App\Services\Group;


use App\Services\RepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @return GroupDeleteService
 * @throws \Illuminate\Contracts\Container\BindingResolutionException
 * @throws \ReflectionException
 */
function newGroupDeleteService(RepositoryInterface $repo, FormRequest $request): GroupDeleteService
{
    return new GroupDeleteService($repo, $request);
}

class GroupDeleteService
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