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
        Schema::create('expense_details', function (Blueprint $table) {
            $table->id();

            $table->integer('expense_id');
            $table->string('propduct_name');
            $table->longText('propduct_desc')->nullable();
            $table->double('price', 2);
            $table->dateTime('buying_date');
            $table->dateTime('receiving_date');
            $table->integer('quantity');
            $table->double('total_price', 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expense_details');
    }
};
