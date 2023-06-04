<?php

namespace App\Repositories;

use App\Models\Media;
use App\Services\RepositoryInterface;
use Illuminate\Support\Collection;

class MediaRepository implements RepositoryInterface
{
    public function listQuery(array $validated): Collection
    {
        /**
         * @var Collection $categories
         */
        $media = Media::all();

        return $media;
    }

    public function createExcecute(array $validated): Media
    {
        /**
         * @var Media $media
         */
        $media = Media::create($validated);

        return $media;
    }

    public function readQuery(array $validated): Media
    {
        /**
         * @var Media $media
         */
        $media = Media::findOrFail($validated['id']);

        return $media;
    }

    public function updateExcecute(array $validated): Media
    {
        /**
         * @var Media $media
         */
        $media = Media::findOrFail($validated['id']);
        $media->update($validated);

        return $media;
    }

    public function deleteExcecute(array $validated): void
    {
        /**
         * @var Media $media
         */
        $media = Media::findOrFail($validated['id']);
        $media->delete();
    }
}