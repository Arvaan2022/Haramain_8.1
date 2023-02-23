@extends('Admin.Layout.app')
@section('title')
    {{ trans('admin.dashboard') }}
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
        <section class="content-header">
            <h1>
                {{ trans('admin.dashboard') }}
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> {{ trans('admin.home') }}</a>
                </li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!--Code Start-->
        <section class="content">
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{ $admin }}</h3>

                            <p>Admins</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i><!-- <i class="ion ion-bag"></i> -->
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i> </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{ $subadmin }}</h3><!-- <sup style="font-size: 20px">%</sup></h3> -->

                            <p>Sub Admin</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i><!-- <i class="ion ion-stats-bars"></i> -->
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </section>
        <!--Code End-->
    </div><!-- end col-->
@endsection
