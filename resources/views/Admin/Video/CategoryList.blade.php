@extends('Admin.Layout.app')

@section('title')
    {{ trans('admin.dashboard_name') }} | {{ trans('admin.haramain_videos') }}
@endsection
@section('Content')
    <div class="content-wrapper">

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
                              
             <!--Code Start-->
             
              <form action="{{ route('admin.video.category.store') }}" id="" class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="form-body">
                  @csrf
                  <div class="form-body">
                    <div class="form-group">
                        <label class="control-label col-md-3">Category Name in English
                        </label>
                        </label>
                        <div class="col-md-6">
                            <input type="text" id="txtCategory" name="txtCategory"
                                class="form-control" placeholder="Category Name in English">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Category Name in Arabic
                        </label>
                        <div class="col-md-6">
                            <input type="text" id="txtCategoryArabic" name="txtCategoryArabic"
                                class="form-control" placeholder="Category Name in Arabic">
                        </div>
                    </div>
                <div class="form-actions">
                  <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                      <button type="submit" class="btn  btn-success">Save</button>
                      <a href="{{ route('admin.video.dashboard') }}" class="btn btn-default">Cancel</a>
                    </div>
                  </div>
                </div>
              </form>
            </div>
              <section class="content">
                <div class="row">
                    @foreach ($data as $key => $value)
                        <a href="#" class="small-box-footer">
                            <div class="col-lg-4 col-xs-6"><a href="#" class="small-box-footer">
                                    <div class="small-box bg-green"><a href="{{ route('admin.video.subcategory.list',['id' => $value->id]) }}" class="small-box-footer">
                                            <div class="inner">
                                                <h4>{{ $value->name}} ({{ $value->name_arabic}})</h4>
                                                <p></p>
                                            </div>
                                            <div class="icon">
                                                <i class="icon ion-ios-moon"></i>
                                            </div>
                                        </a>
                                        <a href="{{ route('admin.video.subcategory.list',['id' => $value->id]) }}" class="small-box-footer">More info <i
                                                class="fa fa-arrow-circle-right"></i></a>
                                        <a href="{{ route('admin.video.category.edit',['id' => $value->id])}}" class="small-box-footer">Edit<i class="fa fa-arrow-circle-right"></i></a>

                                    </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </section>
              
             <!--Code End-->

            </div><!-- end col-->
        </div>
    </div>
  </div>
@endsection