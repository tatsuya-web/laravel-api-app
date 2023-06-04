<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Services\Category\CategoryDeleteService;
use App\Http\Requests\Category\CategoryDeleteRequest;
use \Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CategoryDeleteRequest $request): RedirectResponse
    {
        /**
         * @var CategoryRepository $repo
         * @var CategoryDeleteService $service
         */
        $repo    = new CategoryRepository();
        $service = new CategoryDeleteService($repo, $request);
        $service->delete();

        return redirect()->route('category.index');
    }
}
