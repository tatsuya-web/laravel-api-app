<?php

namespace App\Services\User;

use App\Services\RepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

/**
 * @return UserCreateService
 * @throws \Illuminate\Contracts\Container\BindingResolutionException
 * @throws \ReflectionException
 */
function newUserCreateService(RepositoryInterface $repo, FormRequest $request): UserCreateService
{
    return new UserCreateService($repo, $request);
}

class UserCreateService
{
    function __construct(RepositoryInterface $repo, FormRequest $request)
    {
        $this->repo = $repo;
        $this->request = $request;
    }

    /**
     * @return string
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     * @throws \ReflectionException
     */
    public function create(): User
    {
        $validated = $this->request->validated();
        /**
         * @var User $user
         */
        $user = $this->repo->createExcecute($validated);
        
        return $user;
    }
}