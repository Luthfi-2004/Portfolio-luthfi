<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('tagline');
            $table->text('bio');
            $table->string('photo')->nullable();
            $table->string('resume_file')->nullable();
            $table->string('email')->nullable();
            $table->string('github')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};