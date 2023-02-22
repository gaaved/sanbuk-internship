<?php

namespace App\Models;

use App\Models\Interfaces\StatusInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Departure
 *
 * @property int $id
 * @property int $status
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Departure newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Departure newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Departure query()
 * @method static \Illuminate\Database\Eloquent\Builder|Departure whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Departure whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Departure whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Departure whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Departure whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Departure extends Model implements StatusInterface
{
    use HasFactory;

    protected $fillable = [
        'status',
        'name',
    ];
}
