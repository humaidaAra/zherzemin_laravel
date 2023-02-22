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
        Schema::create('article_profile', function (Blueprint $table) {
            $table->unsignedBigInteger('article_id')->index();
            $table->unsignedBigInteger('profile_id')->index();

            $table->primary(['article_id', 'profile_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_profile');
    }
};
