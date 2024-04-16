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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('city');
            $table->string('type');
            $table->text('description');
            $table->integer('area'); // Assuming area is in square feet
            $table->string('price');
            $table->string('status');
            $table->text('iframe_link'); // Link to the iframe for the 3D model
            $table->string('image'); // Assuming image stores the path to the image file
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
