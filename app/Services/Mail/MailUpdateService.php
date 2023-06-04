<?php

namespace App\Services\Mail;

use App\Services\RepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Mail;

/**
 * @return MailUpdateService
 * @throws \Illuminate\Contracts\Container\BindingResolutionException
 * @throws \ReflectionException
 */
function newMailUpdateService(RepositoryInterface $repo, FormRequest $request): MailUpdateService
{
    return new MailUpdateService($repo, $request);
}

class MailUpdateService
{
    function __construct(RepositoryInterface $repo, FormRequest $request)
    {
        $this->repo = $repo;
        $this->request = $request;
    }

    public function update(): Mail
    {
        $validated = $this->request->validated();
        /**
         * @var Mail $mail
         */
        $mail = $this->repo->updateExcecute($validated);

        return $mail;
    }
}