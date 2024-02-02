<?php

namespace App\Models\Frontend;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'contact_type',
        'name',
        'email',
        'mobile',
        'bike_motor_type_id',
        'message',
        'workshop_info',
        'workshop_outside_image',
        'workshop_inside_image',
        'workshop_selfie_image',
        'status',
    ];

    protected $searchableFields = ['*'];

    public function bikeMotorType()
    {
        return $this->belongsTo(BikeMotorType::class);
    }
}
