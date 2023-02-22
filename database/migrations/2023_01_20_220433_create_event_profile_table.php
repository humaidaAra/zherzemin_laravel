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
        Schema::create('event_profile', function (Blueprint $table) {
            $table->unsignedBigInteger('event_id')->index();
            $table->unsignedBigInteger('profile_id')->index();

            $table->primary(['event_id', 'profile_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_profile');
    }
};
