<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $fillable = [
        'type',
        'shipping_id',
        'price',
        'weight',
    ];

    public function offers()
    {
        return $this->hasMany(Offer::class,'product_id');
    }

    public function shippingRate()
    {
        return $this->belongsTo(Shipping::class,'shipping_id','id');
    }

    public function getShippingAttribute()
    {
        $shipping = $this->shippingRate->rate * $this->weight * 10 ;
        return $shipping;
    }

    public function getTaxAttribute()
    {
        return $this->price * ( 14/100 );
    }

}
