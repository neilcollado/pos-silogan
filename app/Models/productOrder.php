<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productOrder extends Model
{
    use HasFactory;
    protected $table = "order_product";
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
    ];
}
