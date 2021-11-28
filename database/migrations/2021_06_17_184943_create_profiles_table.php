<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('phone')->default('NULL')->nullable(true);
            $table->string('city')->default('NULL')->nullable(true);
            $table->string('state')->default('NULL')->nullable(true);
            $table->string('address')->default('NULL')->nullable(true);
            $table->string('addrOpt')->default('NULL')->nullable(true);
            $table->string('zip')->default('NULL')->nullable(true);
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
        Schema::dropIfExists('profiles');
    }
}
