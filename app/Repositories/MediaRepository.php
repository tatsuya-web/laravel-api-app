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
        $media = Media::where('user_id', $validated['user_id'])
                    ->orderBy('created_at', 'desc')
                    ->get();

        return $media;
    }

    public function createExcecute(array $validated): Media
    {
        $file = $validated['image'];
        /**
         * @var Media $media
         */
        $media = Media::create([
            'name' => $validated['title'],
            'file_path' => $file->store('public/media'),
            'file_name' => $file->getClientOriginalName(),
            'mime_type' => $file->getMimeType(),
            'alt_text' => $validated['title'],
            'user_id' => $validated['user_id'],
            'size' => $file->getSize(),
        ]);

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