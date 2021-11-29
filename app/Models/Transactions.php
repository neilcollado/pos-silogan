<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    public function orders() {
        return $this->belongsTo(Orders::class, 'o_id');
    }
}
