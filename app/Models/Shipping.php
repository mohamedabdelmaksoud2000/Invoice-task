<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
Use App\Models\Product;

class Shipping extends Model
{
    use HasFactory;

    protected $fillable =[
        'country',
        'rate'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
