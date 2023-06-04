<?php

namespace App\Services\Group;


use App\Services\RepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Collection;

/**
 * @return GroupIndexService
 * @throws \Illuminate\Contracts\Container\BindingResolutionException
 * @throws \ReflectionException
 */
function newGroupIndexService(RepositoryInterface $repo, FormRequest $request): GroupIndexService
{
    return new GroupIndexService($repo, $request);
}

class GroupIndexService
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
         * @var Collection $groups
         */
        $groups = $this->repo->listQuery($validated);

        return $groups;
    }
}