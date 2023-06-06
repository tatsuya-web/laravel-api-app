<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostCreateRequest;
use App\Services\Post\PostCreateService;
use App\Repositories\PostRepository;
use App\Repositories\MediaRepository;
use App\Models\Post;

class CreateController extends Controller
{
    /**
     * @param PostCreateRequest $request
     * @return Post
     */
    public function __invoke(PostCreateRequest $request): Post
    {
        /**
         * @var PostRepository $repo
         * @var PostCreateService $service
         * @var Post $post
         */
        $postRepo    = new PostRepository();
        $mediaRepo    = new MediaRepository();
        $service = new PostCreateService($postRepo, $mediaRepo, $request);
        $post    = $service->create();

        return $post;
    }
}
