<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserReadRequest;
use App\Repositories\UserRepository;
use App\Services\User\UserReadService;
use App\Models\User;
use Illuminate\Http\Request;

class ReadController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UserReadRequest $request): View
    {
        /**
         * @var UserRepository $repo
         * @var UserReadService $service
         * @var User $user
         */
        $repo    = new UserRepository();
        $service = new UserReadService($repo, $request);
        $user    = $service->read();

        return view('user.read', ['user' => $user]);
    }
}
