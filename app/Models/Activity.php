<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory, HasUuids;

    protected $fillable =
    ['title', 'date', 'subtitle1', 'subtitle2', 'image1', 'image2', 'desc1', 'desc2'];
}
