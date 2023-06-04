<?php

namespace App\Repositories;

use App\Models\Mail;
use App\Services\RepositoryInterface;
use Illuminate\Support\Collection;

class MailRepository implements RepositoryInterface
{
    public function listQuery(array $validated): Collection
    {
        /**
         * @var Collection $mails
         */
        $mails = Mail::all();

        return $mails;
    }

    public function createExcecute(array $validated): Mail
    {
        /**
         * @var Mail $mail
         */
        $mail = Mail::create($validated);

        return $mail;
    }

    public function readQuery(array $validated): Mail
    {
        /**
         * @var Mail $mail
         */
        $mail = Mail::findOrFail($validated['id']);

        return $mail;
    }

    public function updateExcecute(array $validated): Mail
    {
        /**
         * @var Mail $mail
         */
        $mail = Mail::findOrFail($validated['id']);
        $mail->update($validated);

        return $mail;
    }

    public function deleteExcecute(array $validated): void
    {
        /**
         * @var Mail $mail
         */
        $mail = Mail::findOrFail($validated['id']);
        $mail->delete();
    }
}