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
        Schema::create('price_records', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("image_id")->nullable();
            $table->text("description")->nullable();
            $table->decimal("price", 12, 2)->nullable();
            $table->decimal("old_price", 12, 2)->nullable();
            $table->date("start_date")->nullable();
            $table->string("price_sign")->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('price_records');
    }
};
