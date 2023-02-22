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
        Schema::create('exhibition_sponser', function (Blueprint $table) {
            $table->unsignedBigInteger('exhibition_id')->index();
            $table->unsignedBigInteger('sponser_id')->index();

            $table->primary(['exhibition_id', 'sponser_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exhibition_sponser');
    }
};
