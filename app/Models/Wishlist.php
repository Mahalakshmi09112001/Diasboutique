<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable = ['user_id', 'product_id' ,'price']; // Ensure 'product_id' is fillable

    // Relationship to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship to Product
   public function product()
    {
        return $this->belongsTo(Product::class);  // Each wishlist item belongs to one product
    }
}

