<?php

namespace App\Services\Post;


use App\Services\RepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;

class PostDeleteService
{
    function __construct(RepositoryInterface $repo, FormRequest $request)
    {
        $this->repo = $repo;
        $this->request = $request;
    }

    public function delete(): void
    {
        $validated = $this->request->validated();
        $this->repo->deleteExcecute($validated);
    }
}