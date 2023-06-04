<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserUpdateRequest;
use App\Repositories\UserRepository;
use App\Services\User\UserUpdateService;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class UpdateController extends Controller
{
    /**
     * User update
     *
     * @param UserUpdateRequest $request
     * @return RedirectResponse
     */
    public function __invoke(UserUpdateRequest $request): RedirectResponse
    {
        /**
         * @var UserRepository $repo
         * @var UserUpdateService $service
         * @var User $user
         */
        $repo    = new UserRepository();
        $service = new UserUpdateService($repo, $request);
        $user    = $service->update();

        return redirect()->route('user.read', ['id' => $user->id]);
    }
}
