<?php

namespace App\Services\Media;


use App\Services\RepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Media;

/**
 * @return UpdateServiceInterface
 * @throws \Illuminate\Contracts\Container\BindingResolutionException
 * @throws \ReflectionException
 */
function newMediaUpdateService(RepositoryInterface $repo, FormRequest $request): MediaUpdateService
{
    return new MediaUpdateService($repo, $request);
}

class MediaUpdateService
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