<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = [
            'combined_order_id',
            'user_id',
            'guest_id',
            'seller_id',
            'shipping_address',
            'customer_name',
            'customer_phone',
            'shipping_type',
            'pickup_point_id',
            'delivery_status',
            'payment_type',
            'payment_status',
            'payment_details',
            'grand_total',
            'selling_total',
            'collected_price',
            'rto',
            'delivery_charge',
            'back_charge',
            'customer_charge',
            'advance_payment',
            'earnings',
            'coupon_discount',
            'code',
            'tracking_code',
            'order_note',
            'courier',
            'discount',
            'date',
            'viewed',
            'delivery_viewed',
            'payment_status_viewed',
            'invoice_payment_status',
            'commission_calculated',
            'invoice',
            'transaction',
            'voucher',
            'voucher_date',
            'delivery_man',
            'delivery_date',
            'process_date',
            'ready_date',
            'updated_by',
            'remarks',
            'requisition_status',
            'reasons',
            'tracking_link'
           
    ];

    public function orderDetails(){

        return $this->hasMany(OrderDetails::class);
    }

    public function products(){

         return $this->hasManyThrough(Product::class, OrderDetails::class);
        
    }
}


