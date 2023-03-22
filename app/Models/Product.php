<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getGambarProdukAttribute($value)
{
    if ($value) {
        return asset('storage/' . $value);
    } else {
        return asset('img/default.png');
    }
}

}
