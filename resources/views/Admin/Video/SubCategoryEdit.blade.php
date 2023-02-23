
@extends('Admin.Layout.app')

@section('title')
    {{ trans('admin.dashboard_name') }} | {{ trans('admin.haramain_videos') }}
@endsection
@push('CSS')
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
        @if ($errors->any())
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
            </div>
        </div>
    @endif
        <div class="content">
            <div class="container-fluid">
                
                <section class="content-header">
                    <h1>
                        {{ $name }}
                        <small>{{ trans('admin.control_panel') }}</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="{{ route('admin.video.dashboard') }}">Video Dashboard</a></li>
                        <li class="active">{{ trans('admin.haramain_videos') }}</li>
                    </ol>
                     
                  
                </section>
                              
             <!--Code Start-->
             <section class="content">
                <div class="box-body">
                  <form action="{{ route('admin.video.subcategory.update') }}" id="video_update" class="form-horizontal" method="post" enctype="multipart/form-data">
                   @csrf
                   <input type="hidden" name="id" value="{{ $data->id }}">
                   <input type="hidden" name="subCatId" value="{{ $data->subcategory_id }}">
                    <div class="form-body">
                      <div class="data">
                        <div class="form-group">
                          <label class="control-label col-md-3">Name in English
                          </label>
                          <div class="col-md-6">
                            <input type="text" id="subCatName" name="subCatName" placeholder="Category Name in English" 
                             class="form-control" value="{{ $data->name }}" > 
                          </div>
                        </div>
                      </div>
                      <div class="data">
                        <div class="form-group">
                          <label class="control-label col-md-3">Name in Arabic
                          </label>
                          <div class="col-md-6">
                            <input type="text" id="subCatArabic" name="subCatArabic" placeholder="Category Name in Arabic" 
                            class="form-control" value="{{ $data->name_arabic }}"> 
                          </div>
                        </div>
                      </div>
                      <div class="data">
                        <div class="form-group">
                          <label class="control-label col-md-3">Link
                          </label>
                          <div class="col-md-6">
                            <input type="text" id="subCatLink" name="subCatLink" value="{{ $data->link }}" placeholder="Redirect Link" class="form-control"> 
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-actions">
                      <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                          <button type="submit" class="btn  btn-success">Save</button>
                          <a href="{{ route('admin.video.subcategory.list',['id' => $mId]) }}" class="btn btn-default">Cancel</a>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                       
            </section>
             <!--Code End-->

            </div><!-- end col-->
        </div>
    </div>
   
@endsection
 