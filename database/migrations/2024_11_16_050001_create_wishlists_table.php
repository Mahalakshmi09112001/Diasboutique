<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_wishlists_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWishlistsTable extends Migration
{
    public function up()
    {
        Schema::create('wishlists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Ensure this column exists
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('wishlists');
    }
}
