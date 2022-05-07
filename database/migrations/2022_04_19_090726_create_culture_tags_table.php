<?php

use App\Models\Culture;
use App\Models\Tag;
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
        Schema::create('culture_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('culture_id');    
            $table->unsignedBigInteger('tag_id');    
            $table->timestamps();

            $table->foreign('culture_id')->references('id')->on('cultures');
            $table->foreign('tag_id')->references('id')->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('culture_tags');
    }
};
