<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Request\Post\PostCreateRequest;
use App\Services\Post\PostCreateService;
use App\Repositories\PostRepository;
use App\Models\Post;
use \Illuminate\Http\RedirectResponse;
use \Illuminate\View\View;

class CreateController extends Controller
{
    /**
     * @param PostCreateRequest $request
     * @return RedirectResponse
     */
    public function __invoke(PostCreateRequest $request): RedirectResponse
    {
        /**
         * @var PostRepository $repo
         * @var PostCreateService $service
         * @var Post $post
         */
        $repo    = new PostRepository();
        $service = newPostCreateService($repo, $request);
        $post    = $service->create();

        return redirect()->route('post.read', ['id' => $post->id]);
    }
}
