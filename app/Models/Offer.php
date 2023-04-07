<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    
    public $fillable=[
        'offer_type',
        'describe',
        'discount_type',
        'discount',
        'offer',
        'product_id'
    ];

    protected $casts = [
        'offer' => 'array'
    ];


    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function getDiscount($price)
    {
        
        if($this->discount_type == 'percentage')
        {
            return $price * ($this->discount/100);
        }else
        {
            return $this->discount;
        }
    }

}
