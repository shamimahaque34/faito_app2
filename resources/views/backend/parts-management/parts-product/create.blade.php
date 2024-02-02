

@extends('backend.master')

@section('title', 'Create Parts Product')

@section('body')
    <div class="row mt-5">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3>{{ isset($partsProduct) ? 'update' : 'Create' }}Parts Product</h3>
                    <a href="{{ route('admin.parts-products.index') }}" class="btn btn-success btn-sm position-absolute me-5" style="right: 0"><i class="fa fa-sliders"></i></a>
                </div>
                <div class="card-body">
                    <form action="{{ isset($partsProduct) ? route('admin.parts-products.update', $partsProduct->id) : route('admin.parts-products.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(isset($partsProduct))
                            @method('put')
                        @endif

                        <div class="row mt-3">
                            <div class="col-md-4">
                            <label for="" class="">Parts Brand Category</label>
                            <div class="">
                                <select name="parts_brand_category_id" class=" form-control " data-toggle="select" data-placeholder="Choose ...">
                                    <option value="">Select a Parts Brand Category</option>
                                    @foreach($partsBrandCategories as $partsBrandCategory)
                                        <option value="{{ $partsBrandCategory->id }}" {{ $errors->any() ? (old('parts_parent_brand_id')) :(isset($partsProduct) && $partsProduct->parts_brand_category_id== $partsBrandCategory->id ? 'selected' : '')}}> {{ $partsBrandCategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('parts_brand_category_id') <span class="text-danger">{{ $errors->first('parts_brand_category_id') }}</span>@enderror
                        </div>
                        <div class="col-md-4">
                            <label for="" class="">Title</label>
                            <div class="">
                                <input type="text" name="title" class="form-control" value="{{ isset($partsProduct) ? $partsProduct->title : '' }}" placeholder="Parts Product Title" />
                            </div>
                            @error('title') <span class="text-danger">{{ $errors->first('title') }}</span>@enderror
                        </div>

                        <div class="col-md-4">
                            <label for="" class="">Sub Title</label>
                            <div class="">
                                <input type="text" name="sub_title" class="form-control" value="{{ isset($partsProduct) ? $partsProduct->sub_title : '' }}" placeholder="Parts Product Sub Title" />
                            </div>
                            @error('sub_title') <span class="text-danger">{{ $errors->first('sub_title') }}</span>@enderror
                        </div>
                    </div>
                        <div class="row mt-3">
                            <label for="" class="col-md-4">Short Description</label>
                            <div class="col-md-8">
                                <textarea type="text" name="short_description" class="form-control ckeditor" placeholder="Parts Product Short Description" id="" cols="30" rows="5">{{ isset($partsProduct) ? $partsProduct->short_description : '' }}</textarea>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <label for="" class="col-md-4">Long Description</label>
                            <div class="col-md-8">
                                <textarea type="text" name="long_description" class="form-control ckeditor" placeholder="Parts Product Long Description" id="" cols="30" rows="5">{{ isset($partsProduct) ? $partsProduct->long_description : '' }}</textarea>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <label for="" class="col-md-4">Features</label>
                            <div class="col-md-8">
                                <textarea type="text" name="features" class="form-control ckeditor" placeholder="Parts Product Features" id="" cols="30" rows="5">{{ isset($partsProduct) ? $partsProduct->features : '' }}</textarea>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-4">
                            <label for="" class="">Sku</label>
                            <div class="">
                                <input type="text" name="sku" class="form-control" value="{{ isset($partsProduct) ? $partsProduct->sku : '' }}" placeholder="Parts Product Sku" />
                            </div>
                            @error('sku') <span class="text-danger">{{ $errors->first('sku') }}</span>@enderror
                        </div>
                        <div class="col-md-4">
                            <label for="" class="">Main Image</label>
                            <div class="">
                                <input type="file" name="main_image" class="form-control" placeholder="Parts Product Main Image" accept="">
                                @if(isset($partsProduct))
                                    <img src="{{ asset($partsProduct->main_image) }}" alt="" style="height: 80px">
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="" class="">Sub Images</label>
                            <div class="">
                                <input type="file" name="sub_images[]" multiple class="form-control" placeholder="Parts Product Sub Images" accept="">
                                @if(isset($partsProduct))
                                @foreach (json_decode($partsProduct->sub_images) as $sub_image)
                                <img src="{{ asset($sub_image) }}" alt="ete" height="60" width="80"
                                    style="margin: 6px" />
                            @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                        <div class="row mt-3">
                            <label for="" class="">Status</label>
                            <div class="">
                                <div class="material-switch">
                                    <input id="someSwitchOptionLight" name="status" type="checkbox" {{ isset($partsProduct) && $partsProduct->status == 0 ? '' : 'checked' }} />
                                    <label for="someSwitchOptionLight" class="label-light"></label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label for="" class="col-md-4"></label>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-success" value="{{ isset($partsProduct) ? 'update' : 'Create' }} Parts Product">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

