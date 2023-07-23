<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievment extends Model
{


    use HasFactory, HasUuids;

    protected $fillable = [
        'title', 'date', 'subtitle1', 'subtitle2', 'subtitle3', 'subtitle4', 'desc1', 'desc2', 'desc3', 'desc4', 'image1', 'image2', 'image3', 'image4'
    ];
}
