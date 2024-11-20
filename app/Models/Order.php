<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'status',
        'total_price',
        'shipping_address',
        'payment_method',
    ];
public function product()
{
    return $this->belongsTo(Product::class);
}
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
     public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id'); // Ensure 'customer_id' is the correct foreign key
    }
    public function orderItems()
{
    return $this->hasMany(OrderItem::class);
}
}
