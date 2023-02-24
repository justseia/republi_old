<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->string('position');
            $table->unsignedBigInteger('salary_from');
            $table->unsignedBigInteger('salary_to');
            $table->unsignedBigInteger('location_id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('criteria_id');
            $table->json('responsibility')->nullable(true);
            $table->json('requirement')->nullable(true);
            $table->json('condition')->nullable(true);
            $table->json('skill')->nullable(true);
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
        Schema::dropIfExists('vacancies');
    }
};
