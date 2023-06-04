<?php

namespace App\Http\Controllers\Media;

use App\Http\Controllers\Controller;
use App\Http\Requests\Media\MediaUpdateRequest;
use App\Models\Media;
use App\Repositories\MediaRepository;
use App\Services\Media\MediaUpdateService;
use Illuminate\Http\RedirectResponse;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(MediaUpdateRequest $request): RedirectResponse
    {
        /**
         * @var MediaRepository $repo
         * @var MediaUpdateService $service
         * @var Media $media
         */
        $repo = new MediaRepository();
        $service = new MediaUpdateService($repo, $request);
        $media = $service->update();

        return redirect()->route('media.read', ['id' => $media->id]);
    }
}
