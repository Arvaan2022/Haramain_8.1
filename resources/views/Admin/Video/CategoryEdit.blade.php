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
                        {{ trans('admin.haramain_videos')  }}
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
                  <form action="{{ route('admin.video.category.update') }}" id="quran_form" class="form-horizontal" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id" value="{{ $data->id }}">
                    <div class="form-body">
                      <div class="data">
                        <div class="form-group">
                          <label class="control-label col-md-3">Category Name in English
                          </label>
                          <div class="col-md-6">
                            <input type="text" id="name" name="name" placeholder="Category Name in English" value="{{ $data->name }}" 
                            class="form-control"> 
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-body">
                      <div class="data">
                        <div class="form-group">
                          <label class="control-label col-md-3">Category Name in Arabic
                          </label>
                          <div class="col-md-6">
                            <input type="text" id="name_arabic" name="name_arabic" placeholder="Category Name in Arabic" 
                            value="{{ $data->name_arabic}}" class="form-control" > 
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-actions">
                      <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                          <button type="submit" class="btn  btn-success">Save</button>
                          <a href="{{ route('admin.video.category',['id' => $cat_id]) }}" class="btn btn-default">Cancel</a>
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