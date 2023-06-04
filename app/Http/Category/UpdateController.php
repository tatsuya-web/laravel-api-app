<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryUpdateRequest;
use App\Repositories\CategoryRepository;
use App\Services\Category\CategoryUpdateService;
use App\Models\Category;
use \Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CategoryUpdateRequest $request): RedirectResponse
    {
        /**
         * @var CategoryRepository $repo
         * @var CategoryUpdateService $service
         * @var Category $category
         */
        $repo     = new CategoryRepository();
        $service  = new CategoryUpdateService($repo, $request);
        $category = $service->update();

        return redirect()->route('category.read', ['id' => $category->id]);
    }
}
