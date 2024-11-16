<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartTable extends Migration
{
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // User owning the cart
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade'); // Product added to cart
            $table->integer('quantity');   // Quantity of the product added to cart
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cart');
    }
}
