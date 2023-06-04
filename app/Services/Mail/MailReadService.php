<?php

namespace App\Services\Mail;


use App\Services\RepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Mail;

/**
 * @return MailReadService
 * @throws \Illuminate\Contracts\Container\BindingResolutionException
 * @throws \ReflectionException
 */
function newMailReadService(RepositoryInterface $repo, FormRequest $request): MailReadService
{
    return new MailReadService($repo, $request);
}

class MailReadService
{
    function __construct(RepositoryInterface $repo, FormRequest $request)
    {
        $this->repo = $repo;
        $this->request = $request;
    }

    public function read(): Mail
    {
        $validated = $this->request->validated();
        /**
         * @var Mail $mail
         */
        $mail = $this->repo->readQuery($validated);
        
        return $mail;
    }
}