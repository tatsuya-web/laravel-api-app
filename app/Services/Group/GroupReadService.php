<?php

namespace App\Services\Group;


use App\Services\RepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Media;

/**
 * @return GroupReadService
 * @throws \Illuminate\Contracts\Container\BindingResolutionException
 * @throws \ReflectionException
 */
function newGroupReadService(RepositoryInterface $repo, FormRequest $request): GroupReadService
{
    return new GroupReadService($repo, $request);
}

class GroupReadService
{
    function __construct(RepositoryInterface $repo, FormRequest $request)
    {
        $this->repo = $repo;
        $this->request = $request;
    }

    public function read(): Media
    {
        $validated = $this->request->validated();
        /**
         * @var Media $media
         */
        $media = $this->repo->readQuery($validated);
        
        return $media;
    }
}