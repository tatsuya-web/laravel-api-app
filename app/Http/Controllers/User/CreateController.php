<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserCreateRequest;
use App\Repositories\UserRepository;
use App\Services\User\UserCreateService;
use App\Models\User;
use Illuminate\View\View;
use \Illuminate\Http\RedirectResponse;

class CreateController extends Controller
{

    /**
     * User create
     *
     * @param UserCreateRequest $request
     * @return RedirectResponse
     */
    public function __invoke(UserCreateRequest $request): RedirectResponse
    {
        /**
         * @var UserRepository $repo
         * @var UserCreateService $service
         * @var User $user
         */
        $repo    = new UserRepository();
        $service = new UserCreateService($repo, $request);
        $user    = $service->create();

        return redirect()->route('user.read', ['id' => $user->id]);
    }
}
