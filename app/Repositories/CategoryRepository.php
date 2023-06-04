<?php

namespace App\Repositories;

use App\Models\Category;
use App\Services\RepositoryInterface;
use Illuminate\Support\Collection;

class CategoryRepository implements RepositoryInterface
{
    public function listQuery(array $validated): Collection
    {
        /**
         * @var Collection $categories
         */
        $categories = Category::all();

        return $categories;
    }

    public function createExcecute(array $validated): Category
    {
        /**
         * @var Category $category
         */
        $category = Category::create($validated);

        return $category;
    }

    public function readQuery(array $validated): Category
    {
        /**
         * @var Category $category
         */
        $category = Category::findOrFail($validated['id']);

        return $category;
    }

    public function updateExcecute(array $validated): Category
    {
        /**
         * @var Category $category
         */
        $category = Category::findOrFail($validated['id']);
        $category->update($validated);

        return $category;
    }

    public function deleteExcecute(array $validated): void
    {
        /**
         * @var Category $category
         */
        $category = Category::findOrFail($validated['id']);
        $category->delete();
    }
}