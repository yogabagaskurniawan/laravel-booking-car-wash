<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->integer('city_id');
            $table->string('uuid');
            $table->string('name');
            $table->boolean('is_open')->default(false);
            $table->string('address');
            $table->string('about');
            $table->string('cs_name');
            $table->string('cs_phone');
            $table->string('img_thumbnail');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
