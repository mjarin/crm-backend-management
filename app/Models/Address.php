<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'addresses';
    protected $fillable = [
        'user_id',
        'address',
        'country_id',
        'state_id',
        'city_id',
        'customer_name',
        'courier',
        'order_note',
        'shipping_charge',
        'longitude',
        'latitude',
        'postal_code',
        'phone',
        'page_no',
        'set_default'
        
];
}
