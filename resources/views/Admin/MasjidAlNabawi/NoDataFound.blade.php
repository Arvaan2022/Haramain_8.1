@extends('Admin.Layout.app')

@section('title')
    {{ trans('admin.dashboard_name') }} | {{ trans('admin.masjid_al_nabawi') }}
@endsection

@section('Content')
    <div class="content-wrapper">
        @if (session('status'))
            <div class="alert alert-success text-white">
                {{ session('status') }}
            </div>
        @endif
        <section class="content-header">
            <h1>
                <small>{{ trans('admin.control_panel') }}</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>{{ trans('admin.home') }}</a></li>
                <li class="active"><a href="#"></a></li>
            </ol>
        </section>
        <section class="content">
            <div class="row" style="text-align:center">
                 <h2>No Data Found !!<h2>
            </div>
        </section>
    </div><!-- end col-->
@endsection
