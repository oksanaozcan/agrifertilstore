<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('import_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->string('module');
            $table->enum('status', ['processing', 'success', 'failed']);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('attribute')->nullable();
            $table->unsignedInteger('row')->nullable();
            $table->json('values')->nullable();
            $table->json('errors')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('import_statuses');
    }
};
