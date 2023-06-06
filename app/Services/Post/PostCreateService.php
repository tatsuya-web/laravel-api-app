<?php

namespace App\Services\Post;

use App\Models\Post;
use App\Services\RepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class PostCreateService
{
    function __construct(RepositoryInterface $postRepo, RepositoryInterface $mediaRepo, FormRequest $request)
    {
        $this->postRepo = $postRepo;
        $this->mediaRepo = $mediaRepo;
        $this->request = $request;
    }

    /**
     * @return Post
     */
    public function create(): Post
    {
        $validated = $this->request->validated();
        
        try {
            DB::beginTransaction();

            /**
             * @var Post $post
             */
            $post = $this->postRepo->createExcecute($validated);

            $media = $this->mediaRepo->createExcecute($validated);

            $post->media()->attach($media->id);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        
        return $post;
    }
}