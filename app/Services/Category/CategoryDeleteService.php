<?php

namespace App\Services\Category;


use App\Services\RepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @return CategoryDeleteService
 * @throws \Illuminate\Contracts\Container\BindingResolutionException
 * @throws \ReflectionException
 */
function newCategoryDeleteService(RepositoryInterface $repo, FormRequest $request): CategoryDeleteService
{
    return new CategoryDeleteService($repo, $request);
}

class CategoryDeleteService
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