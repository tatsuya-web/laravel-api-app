<?php

namespace App\Services\Group;


use App\Services\RepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Collection;

/**
 * @return UpdateServiceInterface
 * @throws \Illuminate\Contracts\Container\BindingResolutionException
 * @throws \ReflectionException
 */
function newGroupUpdateService(RepositoryInterface $repo, FormRequest $request): GroupUpdateService
{
    return new GroupUpdateService($repo, $request);
}

class GroupUpdateService
{
    function __construct(RepositoryInterface $repo, FormRequest $request)
    {
        $this->repo = $repo;
        $this->request = $request;
    }

    public function update(): Media
    {
        $validated = $this->request->validated();
        /**
         * @var Media $media
         */
        $media = $this->repo->updateExcecute($validated);

        return $media;
    }
}