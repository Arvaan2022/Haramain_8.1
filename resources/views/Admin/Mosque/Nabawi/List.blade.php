@extends('Admin.Layout.app')

@section('title')
    {{ trans('admin.dashboard_name') }} | {{ trans('admin.masjid_an_nabawi') }}
@endsection

@section('Content')
    <div class="content-wrapper">
        @if (session('status'))
            <div class="alert alert-success text-white">
                {{ session('status') }}
            </div>
        @endif
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>{{ trans('admin.home')  }}</a></li>
                <li class="active"><a href="#"></a></li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                @foreach ($data as $key => $value)
                    <a href="#" class="small-box-footer">
                        <div class="col-lg-4 col-xs-6"><a href="#" class="small-box-footer">
                                <div class="small-box bg-green"><a href="{{ route('admin.nabawi.data.list',['id' => $value->sub_category_id]) }}" class="small-box-footer">
                                        <div class="inner">
                                            <h4>{{$value->sub_category_en}}</h4>
                                            <p></p>
                                        </div>
                                        <div class="icon">
                                            <i class="icon ion-ios-moon"></i>
                                        </div>
                                    </a><a href="{{ route('admin.nabawi.data.list',['id' => $value->sub_category_id])}}" class="small-box-footer">More info <i
                                            class="fa fa-arrow-circle-right"></i></a>
                                </div>
                        </div>
                    </a>
                @endforeach

            </div>
        </section>
        <!--Code Start-->

        <!--Code End-->
    </div><!-- end col-->

@endsection
