<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Services\Category\CategoryReadService;
use App\Http\Requests\Category\CategoryReadRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use \Illuminate\View\View;

class ReadController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CategoryReadRequest $request): View
    {
        /**
         * @var CategoryRepository $repo
         * @var CategoryReadService $service
         * @var Category $category
         */
        $repo       = new CategoryRepository();
        $service    = new CategoryReadService($repo, $request);
        $category   = $service->read();

        return view('category.update', ['category' => $category]);
    }
}
