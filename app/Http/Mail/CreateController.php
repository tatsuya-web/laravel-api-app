<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mail\MailCreateRequest;
use App\Models\Mail;
use App\Repositories\MailRepository;
use App\Services\Mail\MailCreateService;
use \Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use \Illuminate\View\View;

class CreateController extends Controller
{
    /**
     * show create form
     * @param MailCreateRequest $request
     * @return RedirectResponse
     */
    public function __invoke(MailCreateRequest $request): RedirectResponse
    {
        /**
         * @var MailRepository $repo
         * @var MailCreateService $service
         * @var Mail $mail
         */
        $repo    = new MailRepository();
        $service = new MailCreateService($repo, $request);
        $mail    = $service->create();

        return redirect()->route('mail.read', ['id' => $mail->id]);
    }
}
