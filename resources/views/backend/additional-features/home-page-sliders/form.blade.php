@extends('backend.master')

@section('title', 'Home Page Slider')

@section('body')
    <div class="row mt-5">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h3>{{ isset($homePageSlider) ? 'update' : 'Create' }} Home Page Slider </h3>
                    <a href="{{ route('admin.home-page-sliders.index') }}" class="btn btn-success btn-sm position-absolute me-5" style="right: 0"><i class="fa fa-sliders"></i></a>
                </div>
                <div class="card-body">
                    <form action="{{ isset($homePageSlider) ? route('admin.home-page-sliders.update', $homePageSlider->id) : route('admin.home-page-sliders.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(isset($homePageSlider))
                            @method('put')
                        @endif
                        <div class="row mt-3">
                            <label for="" class="col-md-4">Slider File Type</label>
                            <div class="col-md-8 form-group">
                                <select name="slider_file_type" required id="" class="form-control select2">
                                    <option value="" disabled selected>Select File Type</option>
                                    <option value="image" {{ isset($homePageSlider) && $homePageSlider->slider_file_type == 'image' ? 'selected' : '' }}>Image</option>
                                    <option value="video" {{ isset($homePageSlider) && $homePageSlider->slider_file_type == 'video' ? 'selected' : '' }}>Video</option>
                                </select>
                            </div>
                            @error('slider_file_type') <span class="text-danger">{{ $errors->first('slider_file_type') }}</span>@enderror
                        </div>
                        <div class="row mt-3">
                            <label for="" class="col-md-4">File</label>
                            <div class="col-md-8">
                                <input type="file" name="file" class="form-control" />
                                @if(isset($homePageSlider))
                                    <div class="mt-2">
                                        <a href="{{ asset($homePageSlider->file) }}" class="btn btn-sm btn-warning" download="">Download Now</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label for="" class="col-md-4">File Url</label>
                            <div class="col-md-8">
                                <textarea name="file_url" class="form-control ckeditor" placeholder="Site Description">{{ isset($siteSettings) ? $siteSettings->file_url : old('file_url') }}</textarea>
                                @if(isset($homePageSlider))
                                    <div class="mt-2">
                                        <a href="{{ asset($homePageSlider->file_url) }}" class="btn btn-sm btn-warning" download="">Download Now</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label for="" class="col-md-4">Status</label>
                            <div class="col-md-8">
                                <div class="material-switch">
                                    <input id="someSwitchOptionLight" name="status" type="checkbox" {{ isset($homePageSlider) && $homePageSlider->status == 0 ? '' : 'checked' }} />
                                    <label for="someSwitchOptionLight" class="label-light"></label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label for="" class="col-md-4"></label>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-success" value="{{ isset($homePageSlider) ? 'update' : 'Create' }} Home Page Slider ">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
