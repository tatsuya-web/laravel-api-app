<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;
use App\Services\Post\PostDeleteService;
use App\Http\Requests\Post\PostDeleteRequest;

class DeleteController extends Controller
{
    /**
     * delete post
     * @param PostDeleteRequest $request
     */
    public function __invoke(PostDeleteRequest $request)
    {
        /**
         * @var PostRepository $repo
         * @var PostDeleteService $service
         * @var Post $post
         */
        $repo    = new PostRepository();
        $service = new PostDeleteService($repo, $request);
        $service->delete();

        return response()->noContent();
    }
}
