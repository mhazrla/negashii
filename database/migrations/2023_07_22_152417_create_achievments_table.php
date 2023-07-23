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
        Schema::create('achievments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->string('date');
            $table->string('subtitle1');
            $table->text('desc1');
            $table->string('subtitle2')->nullable();
            $table->text('desc2')->nullable();
            $table->string('subtitle3')->nullable();
            $table->text('desc3')->nullable();
            $table->string('subtitle4')->nullable();
            $table->text('desc4')->nullable();
            $table->string('image1');
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achievments');
    }
};
