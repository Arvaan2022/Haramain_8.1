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
                    <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">{{ trans('admin.haramain_gallery') }}</li>
                </ol>


            </section>
            <div class="box-header">
                <div class="box-title pull-right">
                  <a href="{{ route('admin.gallery.add') }}" class=" btn btn-success">{{ trans('admin.add') }}   <i class="fa fa-plus"></i> </a>
                </div>
            </div>

             <!--Code Start-->
             <section class="content">
                <div class="row">
                    @foreach ($data as $key => $value)
                        <a href="#" class="small-box-footer">
                            <div class="col-lg-4 col-xs-6"><a href="#" class="small-box-footer">
                                    <div class="small-box bg-green"><a href="{{ route('admin.gallery.data.add',['id' =>  $value->gallery_category_id]) }}" class="small-box-footer">
                                            <div class="inner">
                                                <h4>{{ $value->gallery_category_en }}</h4>
                                                <p></p>
                                            </div>
                                            <div class="icon">
                                                <i class="icon ion-ios-moon"></i>
                                            </div>
                                        </a><a href="{{ route('admin.gallery.data.add',['id' =>  $value->gallery_category_id]) }}" class="small-box-footer">{{ trans('admin.more_info') }} <i
                                                class="fa fa-arrow-circle-right"></i></a>
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

@endsection
