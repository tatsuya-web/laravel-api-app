<?php

namespace App\Http\Controllers\Media;

use App\Http\Controllers\Controller;
use App\Repositories\MediaRepository;
use App\Services\Media\MediaIndexService;
use App\Http\Requests\Media\MediaIndexRequest;
use Illuminate\Support\Collection;

class IndexController extends Controller
{
    /**
     * Media index
     *
     * @param MediaIndexRequest $request
     * @return View
     */
    public function __invoke(MediaIndexRequest $request): Collection
    {
        /**
         * @var MediaRepository $repo
         * @var MediaIndexService $service
         * @var Collection $media
         */
        $repo    = new MediaRepository();
        $service = new MediaIndexService($repo, $request);
        $media   = $service->index();

        return $media;
    }
}
