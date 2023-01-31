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
        Schema::create('lectures', function (Blueprint $table) {
            $table->id();
            $table->string('lecture_name');
            $table->foreignId('section_id')->constrained('sections')->cascadeOnDelete();
            $table->text('description')->nullable();
            $table->string('video');
            $table->integer('hours')->nullable();
            $table->integer('minutes')->nullable();
            $table->enum('status',['Inactive','Active'])->default('Active');

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
        Schema::dropIfExists('lectures');
    }
};
