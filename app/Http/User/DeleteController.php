<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserDeleteRequest;
use App\Repositories\UserRepository;
use App\Services\User\UserDeleteService;
use \Illuminate\Http\RedirectResponse;

class DeleteController extends Controller
{
    /**
     * User delete
     *
     * @param UserDeleteRequest $request
     * @return RedirectResponse
     */
    public function __invoke(UserDeleteRequest $request): RedirectResponse
    {
        /**
         * @var UserRepository $repo
         * @var UserDeleteService $service
         */
        $repo    = new UserRepository();
        $service = new UserDeleteService($repo, $request);
        $service->delete();

        return redirect()->route('user.index');
    }
}
