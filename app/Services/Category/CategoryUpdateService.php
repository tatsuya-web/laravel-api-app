<?php

namespace App\Services\Category;


use App\Services\RepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Category;

/**
 * @return UpdateServiceInterface
 * @throws \Illuminate\Contracts\Container\BindingResolutionException
 * @throws \ReflectionException
 */
function newCategoryUpdateService(RepositoryInterface $repo, FormRequest $request): UpdateServiceInterface
{
    return new CategoryUpdateService($repo, $request);
}

class CategoryUpdateService implements UpdateServiceInterface
{
    function __construct(RepositoryInterface $repo, FormRequest $request)
    {
        $this->repo = $repo;
        $this->request = $request;
    }

    public function update(): Category
    {
        $validated = $this->request->validated();
        /**
         * @var Category $category
         */
        $category = $this->repo->updateExcecute($validated);

        return $category;
    }
}