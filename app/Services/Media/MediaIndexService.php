<?php

namespace App\Services\Media;


use App\Services\RepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Collection;

/**
 * @return IndexServiceInterface
 * @throws \Illuminate\Contracts\Container\BindingResolutionException
 * @throws \ReflectionException
 */
function newMediaIndexService(RepositoryInterface $repo, FormRequest $request): MediaIndexService
{
    return new MediaIndexService($repo, $request);
}

class MediaIndexService
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
         * @var Collection $media
         */
        $media = $this->repo->listQuery($validated);

        return $media;
    }
}