<?php

namespace App\Services\User;


use App\Services\RepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

/**
 * @return UserReadService
 * @throws \Illuminate\Contracts\Container\BindingResolutionException
 * @throws \ReflectionException
 */
function newUserReadService(RepositoryInterface $repo, FormRequest $request): UserReadService
{
    return new UserReadService($repo, $request);
}

class UserReadService
{
    function __construct(RepositoryInterface $repo, FormRequest $request)
    {
        $this->repo = $repo;
        $this->request = $request;
    }

    public function read(): User
    {
        $validated = $this->request->validated();
        /**
         * @var User $user
         */
        $user = $this->repo->readQuery($validated);
        
        return $user;
    }
}