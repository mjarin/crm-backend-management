<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;

    protected $table = 'order_details';
    protected $fillable = [
        'order_id',
        'seller_id',
        'reseller_id',
        'product_id',
        'supplier_id',
        'variation',
        'purchase_price',
        'price',
        'selling_price',
        'circle_price',
        'seller_price',
        'tax',
        'shipping_cost',
        'delivery_charge',
        'quantity',
        'payment_status',
        'delivery_status',
        'shipping_type',
        'pickup_point_id',
        'product_referral_code',
        'req_status',
        'return_reason',
        'po_status'
        
];

public function Orders()
{
    return $this->belongsTo(Order::class,'order_id','id');
} 

public function Products()
{
    return $this->hasMany(product::class,'product_id','id');
} 


// End of Model...................................
}
