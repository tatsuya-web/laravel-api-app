<?php

namespace App\Repositories;

use App\Models\User;
use App\Services\RepositoryInterface;
use Illuminate\Support\Collection;

class UserRepository implements RepositoryInterface
{
    public function listQuery(array $validated): Collection
    {
        /**
         * @var Collection $users
         */
        $users = User::all();

        return $users;
    }

    public function createExcecute(array $validated): User
    {
        /**
         * @var User $user
         */
        $user = User::create($validated);

        return $user;
    }

    public function readQuery(array $validated): User
    {
        /**
         * @var User $user
         */
        $user = User::findOrFail($validated['id']);

        return $user;
    }

    public function updateExcecute(array $validated): User
    {
        /**
         * @var User $user
         */
        $user = User::findOrFail($validated['id']);
        $user->update($validated);

        return $user;
    }

    public function deleteExcecute(array $validated): void
    {
        /**
         * @var User $user
         */
        $user = User::findOrFail($validated['id']);
        $user->delete();
    }
}