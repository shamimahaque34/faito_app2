@extends('backend.master')

@section('title', 'Site Settings')

@section('body')
    <div class="row mt-5">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h3>Site Settings</h3>
                </div>
                <div class="card-body">
                    <form action="{{ isset($siteSettings) ? route('admin.site-settings.update', $siteSettings->id) : route('admin.site-settings.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(isset($siteSettings))
                            @method('put')
                        @endif
                        <div class="row mt-5">
                            <div class="col-md-4">
                                <label for="" class="">Name</label>
                                <div class="">
                                    <input type="text" name="name" class="form-control" value="{{ isset($siteSettings) ? $siteSettings->name : old('name') }}" placeholder="Name" />
                                    @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="">Title</label>
                                <div class="">
                                    <input type="text" name="title" class="form-control" value="{{ isset($siteSettings) ? $siteSettings->title : old('title') }}" placeholder="Site Title" />
                                    @error('title') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="">Helpline Number</label>
                                <div>
                                    <input type="text" name="helpline_number" class="form-control" value="{{ isset($siteSettings) ? $siteSettings->helpline_number : old('helpline_number') }}" placeholder="Helpline Number" />
                                    @error('helpline_number') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <label for="">Description</label>
                            <div id="">
                                <textarea name="description" class="form-control ckeditor" id="editor" placeholder="Site Description">{{ isset($siteSettings) ? $siteSettings->description : old('description') }}</textarea>
                                @error('description') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="row mt-5">
                            <label for="">Default SEO Header</label>
                            <div id="">
                                <textarea name="default_seo_header" class="form-control ckeditor" id="editor" placeholder="Default SEO Header">{{ isset($siteSettings) ? $siteSettings->default_seo_header : old('default_seo_header') }}</textarea>
                                @error('default_seo_header') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="row mt-5">
                            <label for="">Default SEO Footer</label>
                            <div id="">
                                <textarea name="default_seo_footer" class="form-control ckeditor" id="editor" placeholder="Default SEO Footer">{{ isset($siteSettings) ? $siteSettings->default_seo_footer : old('default_seo_footer') }}</textarea>
                                @error('default_seo_footer') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-md-4">
                                <label for="">Menu Logo</label>
                                <div>
                                    <input type="file" name="menu_logo" class="form-control" accept="image/*" />
                                    @if(isset($siteSettings) && $siteSettings->menu_logo)
                                        <img src="{{ asset($siteSettings->menu_logo) }}" alt="Menu Logo" style="height: 40px; margin-top: 10px;" />
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="">Footer Logo</label>
                                <div>
                                    <input type="file" name="footer_logo" class="form-control" accept="image/*" />
                                    @if(isset($siteSettings) && $siteSettings->footer_logo)
                                        <img src="{{ asset($siteSettings->footer_logo) }}" alt="Footer Logo" style="height: 40px; margin-top: 10px;" />
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="">Favicon</label>
                                <div>
                                    <input type="file" name="favicon" class="form-control" accept="image/*" />
                                    @if(isset($siteSettings) && $siteSettings->favicon)
                                        <img src="{{ asset($siteSettings->favicon) }}" alt="Favicon" style="height: 40px; margin-top: 10px;" />
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-md-3">
                                <label for="">Instagram Link</label>
                                <div>
                                    <input type="text" name="insta_link" class="form-control" value="{{ isset($siteSettings) ? $siteSettings->insta_link : old('insta_link') }}" placeholder="Instagram Link" />
                                    @error('insta_link') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="">Facebook Link</label>
                                <div>
                                    <input type="text" name="fb_link" class="form-control" value="{{ isset($siteSettings) ? $siteSettings->fb_link : old('fb_link') }}" placeholder="Facebook Link" />
                                    @error('fb_link') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="">Youtube Link</label>
                                <div>
                                    <input type="text" name="youtube_link" class="form-control" value="{{ isset($siteSettings) ? $siteSettings->youtube_link : old('youtube_link') }}" placeholder="Youtube Link" />
                                    @error('youtube_link') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="">Tiktok Link</label>
                                <div>
                                    <input type="text" name="tiktok_link" class="form-control" value="{{ isset($siteSettings) ? $siteSettings->tiktok_link : old('tiktok_link') }}" placeholder="Tiktok Link" />
                                    @error('tiktok_link') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <label for="" class="col-md-4"></label>
                            <div class="col-md-6">
                                <input type="submit" class="btn btn-success" value="{{ isset($siteSettings) ? 'Update' : 'Create' }} Site Setting">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
