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
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->string('title',255);
            $table->string('content');
            $table->text('image');
            
            $table->unsignedBigInteger('compagnie_id');
                           
            $table->foreign('compagnie_id')
                  ->references('id')
                  ->on('compagnies')
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
        Schema::dropIfExists('announcements');
    }
};
