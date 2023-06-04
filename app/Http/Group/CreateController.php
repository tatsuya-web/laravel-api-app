<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Http\Requests\Group\GroupCreateRequest;
use App\Repositories\GroupRepository;
use App\Services\Group\GroupCreateService;
use App\Models\Group;
use \Illuminate\Http\RedirectResponse;
use \Illuminate\View\View;

class CreateController extends Controller
{
    /**
     * Group create
     *
     * @param GroupCreateRequest $request
     * @return RedirectResponse
     */
    public function __invoke(GroupCreateRequest $request): RedirectResponse
    {
        /**
         * @var GroupRepository $repo
         * @var GroupCreateService $service
         * @var Group $group
         */
        $repo = new GroupRepository();
        $service = new GroupCreateService($repo, $request);
        $group = $service->create();

        return redirect()->route('group.read', ['id' => $group->id]);
    }
}
