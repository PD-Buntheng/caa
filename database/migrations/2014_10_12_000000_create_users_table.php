<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('gender')->default(1);
            $table->string('phone')->nullable();
            $table->string('profile')->default('default_user.png');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        // Insert some user
        $user = [
            ['name' => 'Sokun Sovisal', 'gender' => '1', 'phone' => '0', 'email'=>'sovisal@gmail.com', 'password' => '$2y$10$8wQdheM4HjyIIsfhidzBcePkf.vqU1dOhqNQiGVOFH.6Qsh29fd32'],
        ];

        DB::table('users')->insert($user);
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
}
