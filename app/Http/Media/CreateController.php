<?php

namespace App\Http\Controllers\Media;

use App\Http\Controllers\Controller;
use App\Http\Requests\Media\MediaCreateRequest;
use App\Repositories\MediaRepository;
use App\Services\Media\MediaCreateService;
use Illuminate\View\View;
use \Illuminate\Http\RedirectResponse;

class CreateController extends Controller
{
    /**
     * Media create
     *
     * @param MediaCreateRequest $request
     * @return RedirectResponse
     */
    public function __invoke(MediaCreateRequest $request): RedirectResponse
    {
        $repo    = new MediaRepository();
        $service = new MediaCreateService($repo, $request);
        $media   = $service->create();

        return redirect()->route('media.read', ['id' => $media->id]);
    }
}
