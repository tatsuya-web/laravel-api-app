<?php

namespace App\Services\Mail;


use App\Services\RepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Mail;

/**
 * @return MailCreateService
 * @throws \Illuminate\Contracts\Container\BindingResolutionException
 * @throws \ReflectionException
 */
function newMailCreateService(RepositoryInterface $repo, FormRequest $request): MailCreateService
{
    return new MailCreateService($repo, $request);
}

class MailCreateService
{
    function __construct(RepositoryInterface $repo, FormRequest $request)
    {
        $this->repo = $repo;
        $this->request = $request;
    }

    /**
     * @return string
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     * @throws \ReflectionException
     */
    public function create(): Mail
    {
        $validated = $this->request->validated();
        /**
         * @var Mail $mail
         */
        $mail = $this->repo->createExcecute($validated);
        
        return $mail;
    }
}