<?php

namespace App\Models\Backend\BikeManagement;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BikeEngineSize extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'info', 'status'];

    protected $searchableFields = ['*'];

    protected $table = 'bike_engine_sizes';

    protected static $bikeEngineSizes;

    public static function saveOrUpdatebikeEngineSize($request, $id = null)
    {
        BikeEngineSize::updateOrCreate(['id' => $id], [
            'name'   => $request->name,
            'info'   => $request->info,
            'status' => $request->status == 'on' ? 1 : 0,
        ]);
    }

    public function motorBikes()
    {
        return $this->hasMany(MotorBike::class);
    }
}
