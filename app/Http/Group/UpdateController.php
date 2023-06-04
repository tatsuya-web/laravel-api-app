<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Http\Requests\Group\GroupUpdateRequest;
use App\Models\Group;
use App\Repositories\GroupRepository;
use App\Services\Group\GroupUpdateService;
use \Illuminate\Http\RedirectResponse;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(GroupUpdateRequest $request): RedirectResponse
    {
        /**
         * @var GroupRepository $repo
         * @var GroupUpdateService $service
         * @var Group $group
         */
        $repo = new GroupRepository();
        $service = new GroupUpdateService($repo, $request);
        $group = $service->update();

        return redirect()->route('group.read', ['id' => $group->id]);
    }
}
