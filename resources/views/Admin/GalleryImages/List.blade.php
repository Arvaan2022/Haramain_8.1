@extends('Admin.Layout.app')

@section('title')
    {{ trans('admin.haramain_gallery') }}
@endsection
@push('CSS')
    <link href="{{ asset(CSS) }}/translation.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset(LIBS) }}/dropzone/dropzone.min.css" rel="stylesheet" type="text/css">
    <style>
        .gallary {
            margin: auto;
            width: 100%;
            padding: 4.6rem;
        }

        .photos img {
            width: 37rem;
            height: auto;
            aspect-ratio: 4/3;
            object-fit: fill;
            border: 1px solid black;
        }
    </style>
@endpush
@section('Content')
    <div class="content-wrapper">
        @if (session('status'))
            <div class="alert alert-success text-white">
                {{ session('status') }}
            </div>
        @endif

        <div class="content">
            <div class="container-fluid">
                <section class="content-header">
                    <h1>
                        {{ $galleryCategroy }}
                        <small>{{ trans('admin.control_panel') }}</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i>
                                {{ trans('admin.home') }}</a></li>
                        <li><a href="{{ route('admin.gallery.dashboard') }}"> {{ trans('admin.haramain_gallery') }}</a></li>
                        <li class="active">{{ trans('admin.add') }}</li>
                    </ol>
                </section>

                @if ($errors->any())
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                    </div>
                </div>
               @endif

                <section class="content animated bounceInUp">
                    <div class="row">
                        <div class="col-lg-6 col-lg-offset-3 col-xs-12">
                            <div class="box box-success">
                                <div class="box-header with-border">
                                    {{-- <div class="box-title"><h3></h3></div> --}}
                                </div>
                                <div class="box-body">
                                    <form action="{{ route('admin.gallery.data.store') }}" id="gallery_form"
                                        class="form-horizontal" method="post" enctype="multipart/form-data"
                                        novalidate="novalidate">
                                        @csrf
                                        <input type="hidden" name="gallery_categroy_id" value="{{ $galleryCategoryId }}">
                                        <input type="hidden" name="upload_type" value="{{ $upload }}">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">
                                                {{ $upload == 'IMAGE' ? 'Upload Image' : 'Upload Pdf' }}
                                                <span class="required" aria-required="true"></span>
                                            </label>
                                            <div class="col-md-6">
                                                @if ($upload == 'PDF')
                                                     <input type="file" name="file"  accept="application/pdf" id="upload" class="form-control">
                                                @endif

                                                @if ($upload == 'IMAGE')
                                                     <input type="file" name="file" multiple="multiple" accept="image/jpg, image/jpeg, image/png" id="upload" class="form-control">
                                                @endif
                                            </div>
                                        </div>
                                        {{-- <div class="form-body">
                            <div class="data">
                                <div>
                                   <input type="file" name="file" >
                                </div>
                            </div>
                          </div> --}}


                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit"
                                                        class="btn  btn-success">{{ trans('admin.save') }}</button>
                                                    <a href="{{ route('admin.gallery.dashboard') }}"
                                                        class="btn btn-default">{{ trans('admin.cancel') }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <section class="gallary ">
                        <div class="photos ">
                            @foreach ($data as $img)
                                <img src="{{ asset(GALLERY) . '/' . $img->image_url }}" alt="noimage">
                            @endforeach
                        </div>
                    </section>
                </section>


            </div><!-- end col-->
        </div>
    </div>
@endsection
