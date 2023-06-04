<?php

namespace App\Services\Group;


use App\Services\RepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Group;

/**
 * @return GroupCreateService
 * @throws \Illuminate\Contracts\Container\BindingResolutionException
 * @throws \ReflectionException
 */
function newGroupCreateService(RepositoryInterface $repo, FormRequest $request): GroupCreateService
{
    return new GroupCreateService($repo, $request);
}

class GroupCreateService
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
    public function create(): Group
    {
        $validated = $this->request->validated();
        /**
         * @var Group $group
         */
        $group = $this->repo->createExcecute($validated);
        
        return $group;
    }
}