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
        Schema::create('loans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid("user_id");
            $table->foreign("user_id")->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->uuid("product_id");
            $table->foreign("product_id")->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->string("rent_date");
            $table->string("return_date");
            $table->boolean("is_returned")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
