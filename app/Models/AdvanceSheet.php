<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvanceSheet extends Model
{

    protected $table = 'advance_sheet';
    protected $fillable = [
        'orders_id',
        'amount',
        'method',
        'transaction_id',
        'transaction_date'     
];


    public function Orders()
    {
        return $this->belongsTo(Order::class);
    } 
    

}
