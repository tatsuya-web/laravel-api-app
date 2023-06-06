<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Post\PostIndexService;
use App\Repositories\PostRepository;
use App\Http\Requests\Post\PostIndexRequest;
use Illuminate\Support\Collection;

class IndexController extends Controller
{
    /**
     * Post index
     *
     * @param PostIndexRequest $request
     * @return Collection
     */
    public function __invoke(PostIndexRequest $request): Collection
    {
        /**
         * @var PostRepository $repo
         * @var PostIndexService $service
         * @var Collection $posts
         */
        $repo    = new PostRepository();
        $service = new PostIndexService($repo, $request);
        $posts   = $service->index();

        return $posts;
    }
}
