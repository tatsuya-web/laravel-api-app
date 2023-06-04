<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;
use App\Services\Post\PostReadService;
use App\Http\Requests\Post\PostReadRequest;
use App\Models\Post;
use \Illuminate\View\View;

class ReadController extends Controller
{
    /**
     * show update form
     * @param PostReadRequest $request
     * @return View
     */
    public function __invoke(PostReadRequest $request): View
    {
        /**
         * @var PostRepository $repo
         * @var PostReadService $service
         * @var Post $post
         */
        $repo    = new PostRepository();
        $service = new PostReadService($repo, $request);
        $post    = $service->read();

        return view('post.update', ['post' => $post]);
    }
}
