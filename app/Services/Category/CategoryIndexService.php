<?php

namespace App\Services\Category;


use App\Services\RepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Collection;

/**
 * @return CategoryIndexService
 * @throws \Illuminate\Contracts\Container\BindingResolutionException
 * @throws \ReflectionException
 */
function newCategoryIndexService(RepositoryInterface $repo, FormRequest $request): CategoryIndexService
{
    return new CategoryIndexService($repo, $request);
}

class CategoryIndexService
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
         * @var Collection $categories
         */
        $categories = $this->repo->listQuery($validated);

        return $categories;
    }
}