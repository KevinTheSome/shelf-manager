<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shelf extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    // public function shelfStorages() {
    //     return $this->hasMany(ShelfStorage::class);
    // }
}
