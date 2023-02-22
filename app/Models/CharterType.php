<?php

namespace App\Models;

use App\Models\Interfaces\StatusInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CharterType
 *
 * @property int $id
 * @property int $status
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CharterType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CharterType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CharterType query()
 * @method static \Illuminate\Database\Eloquent\Builder|CharterType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharterType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharterType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharterType whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharterType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CharterType extends Model implements StatusInterface
{
    use HasFactory;

    protected $fillable = [
        'status',
        'name',
    ];
}
