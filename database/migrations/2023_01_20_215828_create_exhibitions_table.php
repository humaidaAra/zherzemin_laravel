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
        Schema::create('exhibitions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("user_id")->nullable();

            $table->string("title_en")->nullable();
            $table->string("title_ku")->nullable();
            $table->string("title_ar")->nullable();

            $table->string("description_en")->nullable();
            $table->string("description_ku")->nullable();
            $table->string("description_ar")->nullable();

            $table->string("body_en")->nullable();
            $table->string("body_ku")->nullable();
            $table->string("body_ar")->nullable();
            $table->date("start_date");
            $table->string("cover")->nullable();
            $table->unsignedBigInteger('featured')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('exhibitions');
    }
};
