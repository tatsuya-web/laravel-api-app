<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;
use App\Services\Post\PostDeleteService;
use App\Request\Post\PostDeleteRequest;
use \Illuminate\Http\RedirectResponse;

class DeleteController extends Controller
{
    /**
     * delete post
     * @param PostDeleteRequest $request
     * @return RedirectResponse
     */
    public function __invoke(PostDeleteRequest $request): RedirectResponse
    {
        /**
         * @var PostRepository $repo
         * @var PostDeleteService $service
         * @var Post $post
         */
        $repo    = new PostRepository();
        $service = newPostDeleteService($repo, $request);
        $service->delete();

        return redirect()->route('post.index');
    }
}
