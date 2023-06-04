<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use App\Repositories\MailRepository;
use App\Services\Mail\MailIndexService;
use App\Http\Requests\Mail\MailIndexRequest;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class IndexController extends Controller
{
    /**
     * Mail index
     *
     * @param MailIndexRequest $request
     * @return View
     */
    public function __invoke(MailIndexRequest $request): View
    {
        /**
         * @var MailRepository $repo
         * @var MailIndexService $service
         * @var Collection $mails
         */
        $repo    = new MailRepository();
        $service = new MailIndexService($repo, $request);
        $mails   = $service->index();

        return view('mail.index', ['mails' => $mails]);
    }
}
