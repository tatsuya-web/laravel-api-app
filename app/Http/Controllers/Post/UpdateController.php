<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostUpdateRequest;
use App\Repositories\PostRepository;
use App\Services\Post\PostUpdateService;
use App\Models\Post;

class UpdateController extends Controller
{
    /**
     * @param PostUpdateRequest $request
     * @return Post
     */
    public function __invoke(PostUpdateRequest $request): Post
    {
        /**
         * @var PostRepository $repo
         * @var PostUpdateService $service
         * @var Post $post
         */
        $repo    = new PostRepository();
        $service = new PostUpdateService($repo, $request);
        $post    = $service->update();

        return $post;
    }
}
