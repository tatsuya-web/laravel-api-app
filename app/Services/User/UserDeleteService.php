<?php

namespace App\Services\User;


use App\Services\RepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @return UserDeleteService
 * @throws \Illuminate\Contracts\Container\BindingResolutionException
 * @throws \ReflectionException
 */
function newUserDeleteService(RepositoryInterface $repo, FormRequest $request): UserDeleteService
{
    return new UserDeleteService($repo, $request);
}

class UserDeleteService
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