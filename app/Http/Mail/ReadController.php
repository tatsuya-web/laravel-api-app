<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mail\MailReadRequest;
use App\Models\Mail;
use App\Repositories\MailRepository;
use App\Services\Mail\MailReadService;
use Illuminate\View\View;

class ReadController extends Controller
{
    /**
     * Mail read
     *
     * @param MailReadRequest $request
     * @return View
     */
    public function __invoke(MailReadRequest $request): View
    {
        /**
         * @var MailRepository $repo
         * @var MailReadService $service
         * @var Mail $mail
         */
        $repo    = new MailRepository();
        $service = new MailReadService($repo, $request);
        $mail    = $service->read();

        return view('mail.read', ['mail' => $mail]);
    }
}
