@extends('backend.master')

@section('title', 'Create Parts Brand Category')

@section('body')
    <div class="row mt-5">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3>{{ isset($partsBrandCategory) ? 'update' : 'Create' }}Parts Brand Category</h3>
                    <a href="{{ route('admin.parts-brand-categories.index') }}" class="btn btn-success btn-sm position-absolute me-5" style="right: 0"><i class="fa fa-sliders"></i></a>
                </div>
                <div class="card-body">
                    <form action="{{ isset($partsBrandCategory) ? route('admin.parts-brand-categories.update', $partsBrandCategory->id) : route('admin.parts-brand-categories.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(isset($partsBrandCategory))
                            @method('put')
                        @endif

                        <div class="row mt-3">
                            <label for="" class="col-md-4">Parts Parent Brand</label>
                            <div class="col-md-8">
                                <select name="parts_parent_brand_id" class=" form-control " data-toggle="select" data-placeholder="Choose ...">
                                    <option value="">Select a Parts Parent Brand</option>
                                    @foreach($partsParentBrands as $partsParentBrand)
                                        <option value="{{ $partsParentBrand->id }}" {{ $errors->any() ? (old('parts_parent_brand_id')) :(isset($partsBrandCategory) && $partsBrandCategory->parts_parent_brand_id== $partsParentBrand->id ? 'selected' : '')}}> {{ $partsParentBrand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('parts_parent_brand_id') <span class="text-danger">{{ $errors->first('parts_parent_brand_id') }}</span>@enderror
                        </div>
                        <div class="row mt-3">
                            <label for="" class="col-md-4">Name</label>
                            <div class="col-md-8">
                                <input type="text" name="name" class="form-control" value="{{ isset($partsBrandCategory) ? $partsBrandCategory->name : '' }}" placeholder="Bike Motor Type Name" />
                            </div>
                            @error('name') <span class="text-danger">{{ $errors->first('name') }}</span>@enderror
                        </div>
                        <div class="row mt-3">
                            <label for="" class="col-md-4">Description</label>
                            <div class="col-md-8">
                                <textarea type="text" name="description" class="form-control ckeditor" placeholder="Bike Motor Type Other Info" id="" cols="30" rows="5">{{ isset($partsBrandCategory) ? $partsBrandCategory->description : '' }}</textarea>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label for="" class="col-md-4">Image</label>
                            <div class="col-md-8">
                                <input type="file" name="image" class="form-control" placeholder="Bike Motor Type Image" accept="">
                                @if(isset($partsBrandCategory))
                                    <img src="{{ asset($partsBrandCategory->image) }}" alt="" style="height: 80px">
                                @endif
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label for="" class="col-md-4">Status</label>
                            <div class="col-md-8">
                                <div class="material-switch">
                                    <input id="someSwitchOptionLight" name="status" type="checkbox" {{ isset($partsBrandCategory) && $partsBrandCategory->status == 0 ? '' : 'checked' }} />
                                    <label for="someSwitchOptionLight" class="label-light"></label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label for="" class="col-md-4"></label>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-success" value="{{ isset($partsBrandCategory) ? 'update' : 'Create' }} Bike Motor Type">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection