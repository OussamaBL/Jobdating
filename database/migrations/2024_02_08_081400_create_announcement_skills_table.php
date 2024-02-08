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
        Schema::create('announcement_skills', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('announcement_id');
                           
            $table->foreign('announcement_id')
                  ->references('id')
                  ->on('announcements')
                  ->onDelete('cascade')
                  ->onUpdate('cascade'); 

            $table->unsignedBigInteger('skill_id');
                           
            $table->foreign('skill_id')
                    ->references('id')
                    ->on('skills')
                    ->onDelete('cascade')
                    ->onUpdate('cascade'); 

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
        Schema::dropIfExists('announcement_skills');
    }
};
