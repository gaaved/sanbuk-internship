<?php

namespace App\Models;

use App\Models\Interfaces\StatusInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Experience
 *
 * @property int $id
 * @property int $vendor_id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Package> $packages
 * @property-read int|null $packages_count
 * @property-read \App\Models\Vendor $vendor
 * @method static \Illuminate\Database\Eloquent\Builder|Experience newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Experience newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Experience query()
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereVendorId($value)
 * @property int $type_id
 * @property int $trip_type_id
 * @property int $charter_type_id
 * @property int $departure_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Package> $packages
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereCharterTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereDepartureId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereTripTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereTypeId($value)
 * @mixin \Eloquent
 */
class Experience extends Model implements StatusInterface
{
    use HasFactory;

    protected $fillable = [
        'status',
        'vendor_id',
        'type_id',
        'trip_type_id',
        'charter_type_id',
        'departure_id',
        'name',
        'description',
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function tripType()
    {
        return $this->belongsTo(TripType::class);
    }

    public function charterType()
    {
        return $this->belongsTo(CharterType::class);
    }

    public function departure()
    {
        return $this->belongsTo(Departure::class);
    }

    public function packages()
    {
        return $this->hasMany(Package::class);
    }

    public function activeVendor(Builder $query)
    {
        return $query->whereRelation('vendor', 'status', Vendor::STATUS_ACTIVE);
    }
}
