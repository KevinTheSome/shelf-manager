<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShelfStorage extends Model
{
    use HasFactory;

    protected $fillable = [
        'shelf_id',
        'product_id',
    ];
}
