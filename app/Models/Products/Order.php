<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'comment',
        'amount',
        'product_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
