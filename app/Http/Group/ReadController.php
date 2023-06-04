<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Http\Requests\Group\GroupReadRequest;
use App\Models\Group;
use App\Repositories\GroupRepository;
use App\Services\Group\GroupDeleteService;
use App\Services\Group\GroupReadService;

class ReadController extends Controller
{
    /**
     * Group read
     *
     * @param GroupReadRequest $request
     * @return View
     */
    public function __invoke(GroupReadRequest $request): View
    {
        /**
         * @var GroupRepository $repo
         * @var GroupDeleteService $service
         * @var Group $group
         */
        $repo = new GroupRepository();
        $service = new GroupReadService($repo, $request);
        $group = $service->read();

        return view('group.read', ['group' => $group]);
    }
}
