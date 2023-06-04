<?php

namespace App\Services\Mail;


use App\Services\RepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Mail;
use Illuminate\Support\Collection;

/**
 * @return MailIndexService
 * @throws \Illuminate\Contracts\Container\BindingResolutionException
 * @throws \ReflectionException
 */
function newMailIndexService(RepositoryInterface $repo, FormRequest $request): MailIndexService
{
    return new MailIndexService($repo, $request);
}

class MailIndexService
{
    function __construct(RepositoryInterface $repo, FormRequest $request)
    {
        $this->repo = $repo;
        $this->request = $request;
    }

    public function index(): Collection
    {
        $validated = $this->request->validated();
        /**
         * @var Mail $mail
         */
        $mail = $this->repo->listQuery($validated);
        
        return $mail;
    }
}