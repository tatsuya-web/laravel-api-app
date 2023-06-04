<?php

namespace App\Repositories;

use App\Models\Group;
use App\Services\RepositoryInterface;
use Illuminate\Support\Collection;

class GroupRepository implements RepositoryInterface
{
    public function listQuery(array $validated): Collection
    {
        /**
         * @var Collection $groups
         */
        $groups = Group::all();

        return $groups;
    }

    public function createExcecute(array $validated): Group
    {
        /**
         * @var Group $group
         */
        $group = Group::create($validated);

        return $group;
    }

    public function readQuery(array $validated): Group
    {
        /**
         * @var Group $group
         */
        $group = Group::findOrFail($validated['id']);

        return $group;
    }

    public function updateExcecute(array $validated): Group
    {
        /**
         * @var Group $group
         */
        $group = Group::findOrFail($validated['id']);
        $group->update($validated);

        return $group;
    }

    public function deleteExcecute(array $validated): void
    {
        /**
         * @var Group $group
         */
        $group = Group::findOrFail($validated['id']);
        $group->delete();
    }
}