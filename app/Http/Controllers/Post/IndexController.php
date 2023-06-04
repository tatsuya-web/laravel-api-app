<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Post\PostIndexService;
use App\Repositories\PostRepository;
use App\Http\Requests\Post\PostIndexRequest;
use Illuminate\Support\Collection;
use \Illuminate\View\View;

class IndexController extends Controller
{
    /**
     * Post index
     *
     * @param PostIndexRequest $request
     * @return View
     */
    public function __invoke(PostIndexRequest $request): View
    {
        /**
         * @var PostRepository $repo
         * @var PostIndexService $service
         * @var Collection $posts
         */
        $repo    = new PostRepository();
        $service = new PostIndexService($repo, $request);
        $posts   = $service->index();

        return view('post.index', ['posts' => $posts]);
    }
}
