<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');                // Product name
            $table->text('description');           // Product description
            $table->string('image');               // Product image (e.g., 'saree1.jpg')
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Foreign key to categories
           $table->integer('stock')->default(0);
            $table->decimal('mrp', 8, 2);          // MRP (Maximum Retail Price)
            $table->decimal('price', 8, 2);        // Discounted price
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
