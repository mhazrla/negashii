<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Chatify\Traits\UUID;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class ChMessage extends Model
{
    use HasUuids;
}
