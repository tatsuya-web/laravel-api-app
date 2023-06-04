<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Services\Category\CategoryIndexService;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use \Illuminate\View\View;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): View
    {
        /**
         * @var CategoryRepository $repo
         * @var CategoryIndexService $service
         * @var Collection $categories
         */
         */
        $repo = new CategoryRepository();
        $service = new CategoryIndexService($repo, $request);
        $categories = $service->index();

        return view('category.index', ['categories' => $categories]);
    }
}
