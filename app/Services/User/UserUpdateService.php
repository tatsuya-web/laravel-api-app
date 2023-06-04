<?php

namespace App\Services\User;


use App\Services\RepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

/**
 * @return UserUpdateService
 * @throws \Illuminate\Contracts\Container\BindingResolutionException
 * @throws \ReflectionException
 */
function newUserUpdateService(RepositoryInterface $repo, FormRequest $request): UserUpdateService
{
    return new UserUpdateService($repo, $request);
}

class UserUpdateService
{
    function __construct(RepositoryInterface $repo, FormRequest $request)
    {
        $this->repo = $repo;
        $this->request = $request;
    }

    public function update(): User
    {
        $validated = $this->request->validated();
        /**
         * @var User $user
         */
        $user = $this->repo->updateExcecute($validated);

        return $user;
    }
}