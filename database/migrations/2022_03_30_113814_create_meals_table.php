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
        Schema::create('meals', function (Blueprint $table) {
            $table->id();
            $table->integer('chef_id');
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->string('meal_name_en');
            $table->string('meal_name_ar');
            $table->string('meal_code');
            $table->string('meal_qty');
            $table->string('meal_tags_en');
            $table->string('meal_tags_ar');
            $table->string('meal_size_en')->nullable();
            $table->string('meal_size_ar')->nullable();
            $table->string('meal_type_en');
            $table->string('meal_type_ar');
            $table->string('selling_price');
            $table->string('discount_price')->nullable();
            $table->string('short_descp_en');
            $table->string('short_descp_ar');
            $table->string('long_descp_en');
            $table->string('long_descp_ar');
            $table->string('meal_thambnail');
            $table->integer('hot_deals')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('special_offer')->nullable();
            $table->integer('special_deals')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('meals');
    }
};
