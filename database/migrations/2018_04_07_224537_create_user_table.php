<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
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
            $table->string('cpf', 11)->unique()->nullable();
            $table->string('name', 50);
            $table->char('phone', 11);
            $table->date('birth')->nullable();
            $table->char('gender', 1)->nullable();
            $table->text('notes')->nullable();
            $table->string('email')->unique();
            $table->text('password', 254)->nullable();
            
            // Permissions
            $table->string('status')->default('active');
            $table->string('permission')->default('app.user');

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
