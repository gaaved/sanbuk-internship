<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    const TYPE_CRUISE = 0;
    const TYPE_POPULAR = 1;
    const TYPE_THEME = 2;
    const TYPE_BOAT = 3;
}
