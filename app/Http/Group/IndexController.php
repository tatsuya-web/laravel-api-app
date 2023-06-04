<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Repositories\GroupRepository;
use App\Services\Group\GroupIndexService;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Group index
     *
     * @param Request $request
     * @return View
     */
    public function __invoke(Request $request): View
    {
        /**
         * @var GroupRepository $repo
         * @var GroupIndexService $service
         * @var Collection $groups
         */
        $repo = new GroupRepository();
        $service = new GroupIndexService($repo, $request);
        $groups = $service->index();

        return view('group.index', ['groups' => $groups]);
    }
}
