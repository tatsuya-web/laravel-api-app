<?php

namespace App\Http\Controllers\Media;

use App\Http\Controllers\Controller;
use App\Http\Requests\Media\MediaDeleteRequest;
use App\Repositories\MediaRepository;
use App\Services\Media\MediaDeleteService;
use \Illuminate\Http\RedirectResponse;

class DeleteController extends Controller
{
    /**
     * Media delete
     *
     * @param MediaDeleteRequest $request
     * @return RedirectResponse
     */
    public function __invoke(MediaDeleteRequest $request): RedirectResponse
    {
        /**
         * @var MediaRepository $repo
         * @var MediaDeleteService $service
         */
        $repo    = new MediaRepository();
        $service = new MediaDeleteService($repo, $request);
        $service->delete();

        return redirect()->route('media.index');
    }
}
