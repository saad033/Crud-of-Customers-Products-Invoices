<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $fillable = [
        'product_name',
        'short_description',
        'sale_price',
        'quantity',
        'images' 
    ];  
    public function invoice()
    {
    return $this->hasMany(Invoice::class);
    }
}
