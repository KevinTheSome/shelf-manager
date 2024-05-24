<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'orderDate',
        'receiverDate',
        'status',
        'amount',
        'user_id',
        'product_id',
    ];
}
