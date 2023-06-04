<?php

namespace App\Services\Category;


use App\Services\RepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Category;

/**
 * @return CategoryCreateService
 * @throws \Illuminate\Contracts\Container\BindingResolutionException
 * @throws \ReflectionException
 */
function newCategoryCreateService(RepositoryInterface $repo, FormRequest $request): CategoryCreateService
{
    return new CategoryCreateService($repo, $request);
}

class CategoryCreateService
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
    public function create(): Category
    {
        $validated = $this->request->validated();
        /**
         * @var Category $category
         */
        $category = $this->repo->createExcecute($validated);
        
        return $category;
    }
}