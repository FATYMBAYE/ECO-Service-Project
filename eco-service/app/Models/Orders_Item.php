<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders_Item extends Model
{
    protected $table = 'orders_items';

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
