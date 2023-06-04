<?php

namespace App\Services\Media;

use App\Services\RepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @return DeleteServiceInterface
 * @throws \Illuminate\Contracts\Container\BindingResolutionException
 * @throws \ReflectionException
 */
function newMediaDeleteService(RepositoryInterface $repo, FormRequest $request): MediaDeleteService
{
    return new MediaDeleteService($repo, $request);
}

class MediaDeleteService
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