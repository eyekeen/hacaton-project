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
        Schema::create('petitions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('document_id');
            
            $table->unsignedBigInteger('user_id');
            $table->dateTime('date_of_sent');
            
            $table->unsignedBigInteger('status');
            $table->unsignedBigInteger('receiver');

            $table->foreign('receiver')->references('id')->on('users');
            $table->foreign('document_id')->references('id')->on('documents');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('status')->references('id')->on('statuses');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('petitions');
    }
};
