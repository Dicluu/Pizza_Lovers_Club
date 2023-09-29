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
        Schema::create('purchase_order_details', function (Blueprint $table) {
            $table->id();
            $table->string( 'name');
            $table->text( 'comment')->nullable();
            $table->string( 'email');
            $table->string( 'phone_number');
            $table->string( 'city');
            $table->string( 'street');
            $table->unsignedBigInteger( 'floor');
            $table->string( 'porch_number')->default('-');
            $table->unsignedBigInteger( 'payment_option_id');
            $table->unsignedBigInteger('purchase_order_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_order_details');
    }
};
