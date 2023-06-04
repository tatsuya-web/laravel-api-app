<?php

namespace App\Http\Controllers\Media;

use App\Http\Controllers\Controller;
use App\Http\Requests\Media\MediaReadRequest;
use App\Repositories\MediaRepository;
use App\Services\Media\MediaReadService;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ReadController extends Controller
{
    /**
     * Media read
     *
     * @param MediaReadRequest $request
     * @return View
     */
    public function __invoke(MediaReadRequest $request): View
    {
        $repo    = new MediaRepository();
        $service = new MediaReadService($repo, $request);
        $media   = $service->read();

        return view('media.read', ['media' => $media]);
    }
}
