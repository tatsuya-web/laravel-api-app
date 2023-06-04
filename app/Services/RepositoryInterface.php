<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface RepositoryInterface
{
    public function listQuery(array $validated): Collection;
    public function createExcecute(array $validated): Model;
    public function readQuery(array $validated): Model;
    public function updateExcecute(array $validated): Model;
    public function deleteExcecute(array $validated): void;
}