<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Services\User\UserIndexService;
use App\Http\Requests\User\UserIndexRequest;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class IndexController extends Controller
{
    /**
     * User index
     *
     * @param UserIndexRequest $request
     * @return View
     */
    public function __invoke(UserIndexRequest $request): View
    {
        /**
         * @var UserRepository $repo
         * @var UserIndexService $service
         * @var Collection $users
         */
        $repo    = new UserRepository();
        $service = new UserIndexService($repo, $request);
        $users   = $service->index();

        return view('user.index', ['users' => $users]);
    }
}
