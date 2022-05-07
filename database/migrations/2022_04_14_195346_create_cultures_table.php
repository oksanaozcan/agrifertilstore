<?php

use App\Models\Fertilizer;
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
        Schema::create('cultures', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('nitrogen', 8, 2);
            $table->float('phosphorus', 8, 2);
            $table->float('potassium', 8, 2);
            $table->unsignedBigInteger('fertilizer_id');           
            $table->string('region');
            $table->float('price', 8, 2);
            $table->text('description');
            $table->string('purpose');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('fertilizer_id')->references('id')->on('fertilizers');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cultures');
    }
};
