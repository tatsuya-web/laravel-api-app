<?php

namespace App\Services\Media;


use App\Services\RepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Media;

/**
 * @return CreateServiceInterface
 * @throws \Illuminate\Contracts\Container\BindingResolutionException
 * @throws \ReflectionException
 */
function newMediaCreateService(RepositoryInterface $repo, FormRequest $request): MediaCreateService
{
    return new MediaCreateService($repo, $request);
}

class MediaCreateService
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
    public function create(): Media
    {
        $validated = $this->request->validated();
        /**
         * @var Media $media
         */
        $media = $this->repo->createExcecute($validated);
        
        return $media;
    }
}