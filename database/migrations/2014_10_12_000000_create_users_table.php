<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('role');
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('users')->insert([
                'name'=>'Bzhai Xoman',
                'username' => 'bzhaixoman',
                'email'=> null,
                'email_verified_at'=> null,
                'password'=>'$2y$10$.Ep3BRlH7ctKIjGvaJIs7e/.i50Bo/Y7emBx5pqL6Hextf1peMh6y',
                'role'=>0,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
