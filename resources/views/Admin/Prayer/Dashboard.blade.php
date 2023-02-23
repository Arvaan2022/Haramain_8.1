@extends('Admin.Layout.app')

@section('title')
    {{ trans('admin.prayer_manage') }} 
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
                    {{ trans('admin.prayer_manage')  }}
                    <small>{{ trans('admin.control_panel') }}</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i>{{ trans('admin.home') }}</a></li>
                    <li class="active">{{ trans('admin.prayer_manage') }}</li>
                </ol>
                 
              
            </section>
                              
             <!--Code Start-->
             <div class="row">
                <div class="col-lg-12  col-xs-12">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <div class="box-title">
                                <a href="{{ route('admin.prayer.add') }}" class="btn btn-success">{{ trans('admin.prayer_add') }}</a>
                            </div>
                            <a href="{{ route('admin.prayer.view') }}" class="pull-right btn-success btn">{{ trans('admin.prayer_edit') }}</a>
                        </div>
                </div>
            </div>
        </div>
        <!--Code End-->

            </div><!-- end col-->
        </div>
    </div>
    
@endsection