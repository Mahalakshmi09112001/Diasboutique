<?php

namespace App\Models;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'image','stock' ,'mrp', 'price', 'category_id'];

    /**
     * Define the relationship to the Category model.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }
    public function orders()
{
    return $this->hasMany(Order::class);
}
}
