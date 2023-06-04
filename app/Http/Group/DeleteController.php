<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Repositories\GroupRepository;
use App\Services\Group\GroupDeleteService;
use \Illuminate\Http\RedirectResponse;
use App\Http\Requests\Group\GroupDeleteRequest;

class DeleteController extends Controller
{
    /**
     * Group delete
     *
     * @param GroupDeleteRequest $request
     * @return RedirectResponse
     */
    public function __invoke(GroupDeleteRequest $request): RedirectResponse
    {
        /**
         * @var GroupRepository $repo
         * @var GroupDeleteService $service
         */
        $repo = new GroupRepository();
        $service = new GroupDeleteService($repo, $request);
        $service->delete();

        return redirect()->route('group.index');
    }
}
