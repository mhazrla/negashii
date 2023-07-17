<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'user_id', 'product_id', 'rent_date', 'return_date', 'is_returned'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
