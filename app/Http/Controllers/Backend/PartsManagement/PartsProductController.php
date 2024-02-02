<?php

namespace App\Http\Controllers\Backend\PartsManagement;

use App\Http\Controllers\Controller;
use App\Models\Backend\PartsManagement\PartsBrandCategory;
use App\Models\Backend\PartsManagement\PartsProduct;
use Illuminate\Http\Request;

class PartsProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.parts-management.parts-product.index',[
            'partsBrandCategories'=>PartsBrandCategory::all(),
            'partsProducts'       =>PartsProduct::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.parts-management.parts-product.create',[
            'partsBrandCategories'=>PartsBrandCategory::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        PartsProduct::saveOrUpdatePartsProduct($request);
        return redirect()->route('admin.parts-products.index')->with('success','Parts Product Create Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('backend.parts-management.parts-product.create',[
            'partsBrandCategories'=>PartsBrandCategory::all(),
            'partsProduct' => PartsProduct::where('id',$id)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        PartsProduct::saveOrUpdatePartsProduct($request,$id);
        return redirect()->route('admin.parts-products.index')->with('success','Parts Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $partsProduct = PartsProduct::where('id',$id)->first();
        if ($partsProduct)
        {
            if (file_exists($partsProduct->main_image)){
                unlink($partsProduct->main_image);
            }

            foreach(json_decode($partsProduct->sub_images) as $file){
                unlink($file);
            }
            $partsProduct->delete();
        }
        return redirect()->route('admin.parts-products.index')->with('success','Parts Product Delete Successfully');
    }
}
