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
        Schema::create('chefs', function (Blueprint $table) {
            $table->id();
            $table->string('chef_name_en');
            $table->string('chef_name_ar');
            $table->string('position_name_en');
            $table->string('position_name_ar');
            $table->string('chef_image');
            $table->string('chef_facebook_profile');
            $table->string('chef_twitter_profile');
            $table->string('chef_instagram_profile');
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
        Schema::dropIfExists('chefs');
    }
};