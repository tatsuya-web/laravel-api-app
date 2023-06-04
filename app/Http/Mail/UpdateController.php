<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mail\MailUpdateRequest;
use App\Models\Mail;
use App\Repositories\MailRepository;
use App\Services\Mail\MailUpdateService;
use \Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    /**
     * Mail update
     * @param Request $request
     * @return RedirectResponse
     */
    public function __invoke(MailUpdateRequest $request): RedirectResponse
    {
        /**
         * @var MailRepository $repo
         * @var MailUpdateService $service
         * @var Mail $mail
         */
        $repo    = new MailRepository();
        $service = new MailUpdateService($repo, $request);
        $mail    = $service->update();

        return redirect()->route('mail.read', ['id' => $mail->id]);
    }
}
