@extends('Admin.Layout.app')

@section('title')
    {{ trans('admin.haramain_gallery') }} 
@endsection
@push('CSS')
    <link href="{{ asset(CSS) }}/translation.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset(LIBS) }}/dropzone/dropzone.min.css" rel="stylesheet" type="text/css">
    <style>
        .menu-right {
            display: flex;
            align-items: flex-end;
            flex-direction: column;
            margin-block-end: 2rem;
        
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
                    {{ trans('admin.haramain_gallery')  }}
                    <small>{{ trans('admin.control_panel') }}</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> {{ trans('admin.home') }}</a></li>
                    <li><a href="{{ route('admin.gallery.dashboard') }}"> {{ trans('admin.haramain_gallery') }}</a></li>
                    <li class="active">{{ trans('admin.add') }}</li>
                </ol>
            </section>

            <section class="content animated bounceInUp">
                <div class="row">
                  <div class="col-lg-6 col-lg-offset-3 col-xs-12">
                    <div class="box box-success">
                      <div class="box-header with-border">
                        <div class="box-title"><h3> {{ trans('admin.add') }}</h3></div>
                      </div>
                      <div class="box-body">
                        <form action="{{ route('admin.gallery.store') }}" id="gallery_form" class="form-horizontal" method="post" enctype="multipart/form-data" novalidate="novalidate">
                           @csrf
                            <div class="form-body">
                            <div class="data">
                              <div class="form-group">
                                <label class="control-label col-md-3">{{ trans('admin.category_name_english') }}
                                </label>
                                <div class="col-md-6">
                                  <input type="text" id="categoryEn" name="categoryEn" placeholder= "{{ trans('admin.category_name_english')}}" class="form-control"> 
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-md-3">{{ trans('admin.category_name_arabic') }} 
                                </label>
                                <div class="col-md-6">
                                  <input type="text" id="categoryArabic" name="categoryArabic" placeholder="{{ trans('admin.category_name_arabic') }}" class="form-control"> 
                                </div>
                              </div>
                              <input type="hidden" name="parentCategory" id="parentCategory" value="0" class="form-control">
                              <div class="form-group">
                                <label class="control-label col-md-3">{{ trans('admin.upload_type') }}
                                </label>
                                <div class="col-md-6">
                                  <input type="radio" id="pdf" name="type" value="PDF"> {{ trans('admin.pdf') }}  
                                  <input type="radio" id="image" name="type" value="IMAGE"> {{ trans('admin.image') }}
                                </div>
                              </div>
                            </div>
                          </div>
            
                              <div class="form-actions">
                                <div class="row">
                                  <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn  btn-success">{{ trans('admin.save') }}</button>
                                    <a href="{{ route('admin.gallery.dashboard') }}" class="btn btn-default">{{ trans('admin.cancel') }}</a>
                                  </div>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
            </section>
         

            </div><!-- end col-->
        </div>
    </div>
    
@endsection