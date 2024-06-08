<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->bigInteger('expire_at');
            $table->boolean('view_mode')->nullable();
            $table->string('user_image_link', 150)->nullable();
            $table->string('password');
            $table->string('password1')->nullable();
            $table->string('password2')->nullable();
            $table->string('password3')->nullable();
            $table->string('password4')->nullable();
            $table->string('password5')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->boolean('disabled')->nullable();
        });
        $user = App\Models\User::factory()->make();
        $user->save();
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
