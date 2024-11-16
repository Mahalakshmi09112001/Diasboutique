<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // User who placed the order
            $table->string('status')->default('pending'); // Order status
            $table->decimal('total_price', 10, 2); // Total price
            $table->string('shipping_address'); // Shipping address
            $table->string('payment_method'); // Payment method
            $table->timestamps();
        });

        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade'); // Related order
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade'); // Ordered product
            $table->integer('quantity'); // Quantity of the product
            $table->decimal('price', 10, 2); // Product price at the time of the order
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('orders');
    }
}
