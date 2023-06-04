<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('file_path');
            $table->string('file_name');
            $table->string('mime_type')->nullable();
            $table->string('alt_text')->nullable();
            $table
                ->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->onDelete('SET NULL'); // author
            $table->unsignedBigInteger('size');
            $table->timestamps();
        });
    }
};
