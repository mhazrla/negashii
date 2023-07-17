<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory, HasUuids;

    protected $fillable  = [
        'name', 'price', 'qty', 'image_1', 'image_2', 'image_3', 'desc', 'category_id'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'orders', 'user_id');
    }

    public function loans()
    {
        return $this->hasOne(Loan::class);
    }

    public function orders()
    {
        return $this->hasOne(Order::class);
    }

    public function sales()
    {
        return $this->hasOne(Order::class);
    }
}
