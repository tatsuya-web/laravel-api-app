<?php

namespace App\Services\Media;


use App\Services\RepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Media;

/**
 * @return ReadServiceInterface
 * @throws \Illuminate\Contracts\Container\BindingResolutionException
 * @throws \ReflectionException
 */
function newMediaReadService(RepositoryInterface $repo, FormRequest $request): MediaReadService
{
    return new MediaReadService($repo, $request);
}

class MediaReadService
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