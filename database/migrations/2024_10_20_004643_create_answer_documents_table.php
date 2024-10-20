<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('answer_documents', function (Blueprint $table) {
            $table->id();
            $table->string('original_name');
            $table->string('path');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('petition_id');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('petition_id')->references('id')->on('petitions');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answer_documents');
    }
};
