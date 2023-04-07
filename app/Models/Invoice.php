<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    public $fillable = [
        'subtotal',
        'shipping',
        'vat',
        'discounts',
        'total'
    ];

    protected $casts =[
        'discounts' => 'array'
    ];

    public function getDiscountAttribute()
    {
        $discountCollect = collect($this->discounts);
        return $discountCollect->sum('discount');
    }
}
