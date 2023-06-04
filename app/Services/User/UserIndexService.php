<?php

namespace App\Services\User;


use App\Services\RepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Collection;

/**
 * @return UserIndexService
 * @throws \Illuminate\Contracts\Container\BindingResolutionException
 * @throws \ReflectionException
 */
function newUserIndexService(RepositoryInterface $repo, FormRequest $request): UserIndexService
{
    return new UserIndexService($repo, $request);
}

class UserIndexService
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
         * @var Collection $users
         */
        $users = $this->repo->listQuery($validated);

        return $users;
    }
}