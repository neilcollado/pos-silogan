<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table = "order";
    protected $primaryKey = "order_id";
    protected $fillable = [
        'Customername',
        "created_at",
        "updated_at",
        "totalPrice",
    ];
}
