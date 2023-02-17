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
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('salary');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('criteria_id');
            $table->unsignedBigInteger('responsibility_id');
            $table->unsignedBigInteger('requirement_id');
            $table->unsignedBigInteger('condition_id');
            $table->unsignedBigInteger('skill_id');
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
