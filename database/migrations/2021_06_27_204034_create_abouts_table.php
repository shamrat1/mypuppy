<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->text('paragraph_1')->nullable();
            $table->text('paragraph_2')->nullable();
            $table->text('paragraph_3')->nullable();
            $table->string('bannerimage')->nullable();
            $table->string('sidebannerimage')->nullable();
            $table->text('sidebarpoint1')->nullable();
            $table->text('sidebarpoint2')->nullable();
            $table->text('sidebarpoint3')->nullable();
            $table->string('collectiondata_1')->nullable();
            $table->string('collectiondata_2')->nullable();
            $table->string('collectiondata_3')->nullable();
            $table->string('collectiondata_4')->nullable();
            $table->string('collectionimg_1')->nullable();
            $table->string('collectionimg_2')->nullable();
            $table->string('collectionimg_3')->nullable();
            $table->string('collectionimg_4')->nullable();
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
        Schema::dropIfExists('abouts');
    }
}
