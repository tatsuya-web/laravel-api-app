<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostUpdateRequest;
use App\Repositories\PostRepository;
use App\Services\Post\PostUpdateService;
use App\Models\Post;
use \Illuminate\Http\RedirectResponse;

class UpdateController extends Controller
{
    /**
     * update post
     */
    public function __invoke(PostUpdateRequest $request): RedirectResponse
    {
        /**
         * @var PostRepository $repo
         * @var PostUpdateService $service
         * @var Post $post
         */
        $repo    = new PostRepository();
        $service = new PostUpdateService($repo, $request);
        $post = $service->update();

        return redirect()->route('post.read', ['id' => $post->id]);
    }
}
