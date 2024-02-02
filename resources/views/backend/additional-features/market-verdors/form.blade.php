@extends('backend.master')

@section('title', 'Market Vendor')

@section('body')
    <div class="row mt-5">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h3>{{ isset($marketVerdor) ? 'update' : 'Create' }} Market Vendor </h3>
                    <a href="{{ route('admin.market-verdors.index') }}" class="btn btn-success btn-sm position-absolute me-5" style="right: 0"><i class="fa fa-sliders"></i></a>
                </div>
                <div class="card-body">
                    <form action="{{ isset($marketVerdor) ? route('admin.market-verdors.update', $marketVerdor->id) : route('admin.market-verdors.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(isset($marketVerdor))
                            @method('put')
                        @endif
                        <div class="row mt-3">
                            <label for="" class="col-md-4">Name</label>
                            <div class="col-md-8">
                                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ isset($marketVerdor) ? $marketVerdor->name : '' }}" />

                            </div>
                        </div>
                        <div class="row mt-3">
                            <label for="" class="col-md-4">Logo</label>
                            <div class="col-md-8">
                                <input type="file" name="logo" class="form-control" accept="image/*" />
                                @if(isset($marketVerdor))
                                    <img src="{{ asset($marketVerdor->logo) }}" alt="" style="height: 80px" />
                                @endif
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label for="" class="col-md-4">Status</label>
                            <div class="col-md-8">
                                <div class="material-switch">
                                    <input id="someSwitchOptionLight" name="status" type="checkbox" {{ isset($marketVerdor) && $marketVerdor->status == 0 ? '' : 'checked' }} />
                                    <label for="someSwitchOptionLight" class="label-light"></label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label for="" class="col-md-4"></label>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-success" value="{{ isset($marketVerdor) ? 'update' : 'Create' }} Market Vendor ">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
