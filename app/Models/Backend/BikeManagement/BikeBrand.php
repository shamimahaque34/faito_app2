<?php

namespace App\Models\Backend\BikeManagement;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BikeBrand extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'logo', 'description', 'status'];

    protected $searchableFields = ['*'];

    protected $table = 'bike_brands';

    protected static $bikeBrands;

    public static function saveOrUpdatebikeBrand($request, $id = null)
    {
        BikeBrand::updateOrCreate(['id' => $id], [
            'name'        => $request->name,
            'description' => $request->description,
            'logo'        =>fileUpload($request->file('logo'), 'bike-management/ bike-brand', isset($id) ? static::find($id)->logo : ''),
            'status'      => $request->status == 'on' ? 1 : 0,
        ]);
    }

    public function motorBikes()
    {
        return $this->hasMany(MotorBike::class);
    }
}
