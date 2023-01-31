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
        Schema::create('role_ablities', function (Blueprint $table) {
            $table->id();
            $table->string('ablity');
            $table->foreignId('role_id')->constrained('roles')->cascadeOnDelete();
            $table->enum('type',[0,1]);
            $table->unique(['ablity','role_id']);
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
        Schema::dropIfExists('role_ablities');
    }
};
