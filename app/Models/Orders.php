<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $fillable = ['status'];
    
    public function products() {
        return $this->belongsToMany(Products::class, "order_product")->withTimeStamps()->withPivot('Quantity');
    }

    public function user() {
        return $this->belongsTo(User::class, 'o_id');
    }

    public function transactions() {
        return $this->belongsTo(Transactions::class, 't_id');
    }
}
