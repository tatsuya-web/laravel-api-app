<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostCreateRequest;
use App\Services\Post\PostCreateService;
use App\Repositories\PostRepository;
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
        $repo    = new PostRepository();
        $service = new PostCreateService($repo, $request);
        $post    = $service->create();

        return $post;
    }
}
