<?php

namespace App\Models\Backend\PartsManagement;

use App\Models\Backend\AdditionalFeatures\MarketVerdor;
use App\Models\Backend\AdditionalFeatures\Testimonial;
use App\Models\Backend\BikeManagement\MotorBike;
use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PartsProduct extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'parts_brand_category_id',
        'title',
        'sub_title',
        'short_description',
        'long_description',
        'features',
        'view_count',
        'status',
        'sku',
        'main_image',
        'sub_images',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'parts_products';

    protected static $partsProducts;
    protected static $files;
    protected static $file;
    protected static $fileName;
    protected static $directory;


    public static function saveOrUpdatePartsProduct($request, $id = null)
    {

        $image = [];

        if (self::$files = $request->file('sub_images')) {
            foreach (self::$files as self::$file) {
                self::$fileName = self::$file->getClientOriginalName();
                self::$directory =
                    './admin/uploaded-files/parts-management/parts-product-sub-images/';
                self::$file->move(self::$directory, self::$fileName);
                $image[] = self::$directory . self::$fileName;
                // return  self::$fileName;
            }
        }

        PartsProduct::updateOrCreate(['id' => $id], [
            'parts_brand_category_id' =>$request->parts_brand_category_id,
            'title'                   => $request->title,
            'sub_title'               => $request->sub_title,
            'short_description'       => $request->short_description,
            'long_description'        => $request->long_description,
            'features'                => $request->features,
            'sku'                     => $request->sku,
            'main_image'              =>fileUpload($request->file('main_image'), 'parts-management/parts-product', isset($id) ? static::find($id)->main_image : ''),
            // $images            =>fileUpload($request->file('sub_images'), 'parts-management/parts-product', isset($id) ? static::find($id)->sub_images : ''),
            'sub_images' =>json_encode($image),
            'status'                  => $request->status == 'on' ? 1 : 0,
        ]);
    }

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class, 'parent_model_id');
    }

    public function partsBrandCategory()
    {
        return $this->belongsTo(PartsBrandCategory::class);
    }

    public function marketVerdors()
    {
        return $this->belongsToMany(MarketVerdor::class);
    }

    public function motorBikes()
    {
        return $this->belongsToMany(MotorBike::class);
    }
}
