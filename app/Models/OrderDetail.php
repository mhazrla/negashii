<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'order_detail';

    protected $fillable  = [
        'user_id', 'order_id', 'total_price', 'status'

    ];

    public function order()
    {
        $this->belongsTo(Order::class);
    }
    public function product()
    {
        $this->belongsTo(Product::class);
    }
}
