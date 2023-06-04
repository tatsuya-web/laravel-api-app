<?php

namespace App\Services\Category;


use App\Services\RepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Category;

/**
 * @return ReadServiceInterface
 * @throws \Illuminate\Contracts\Container\BindingResolutionException
 * @throws \ReflectionException
 */
function newCategoryReadService(RepositoryInterface $repo, FormRequest $request): ReadServiceInterface
{
    return new CategoryReadService($repo, $request);
}

class CategoryReadService implements ReadServiceInterface
{
    function __construct(RepositoryInterface $repo, FormRequest $request)
    {
        $this->repo = $repo;
        $this->request = $request;
    }

    public function read(): Category
    {
        $validated = $this->request->validated();
        /**
         * @var Category $category
         */
        $category = $this->repo->readQuery($validated);
        
        return $category;
    }
}