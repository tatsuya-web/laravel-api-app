<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryCreateRequest;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Services\Category\CategoryCreateService;
use Illuminate\Http\Request;
use \Illuminate\Http\RedirectResponse;
use \Illuminate\View\View;

class CreateController extends Controller
{
    /**
     * create category
     * @param CategoryCreateRequest $request
     * @return View
     */
    public function __invoke(CategoryCreateRequest $request): RedirectResponse
    {
        /**
         * @var CategoryRepository $repo
         * @var CategoryCreateService $service
         * @var Category $category
         */
        $repo     = new CategoryRepository();
        $service  = new CategoryCreateService($repo, $request);
        $category = $service->create();

        return redirect()->route('category.read', ['id' => $category->id]);
    }
}
