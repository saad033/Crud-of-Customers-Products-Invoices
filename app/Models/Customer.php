<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    public $fillable = [
        'name',
        'address',
        'phone'
    ];
//    public function invoice()
//    {
////    return $this->hasMany(Invoice::class);
//        return $this->hasMany('\App\Models\Invoice','customer_id','id');
//    }


}
