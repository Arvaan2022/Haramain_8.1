@extends('Admin.Layout.app')

@section('title')
    {{ trans('admin.dashboard_name') }} | {{ trans('admin.gps_locations') }}
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

            <section class="content-header">
                <h1>
                    <!--  -->
                    GPS LOCATIONS
                    <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href=""><i class="fa fa-dashboard"></i>{{ trans('admin.home') }}</a></li>
                    <li class="active"><a href="#">GPS LOCATIONS</a></li>
                </ol>
            </section>
            <div class="container-fluid">
                <!--Code Start-->
                <section class="content">
                    <div class="row">
                        <a href="{{ route('admin.gps.dashboard', ['id' => '1']) }}" class="small-box-footer">
                        </a>
                        <div class="col-lg-4 col-xs-6"><a href="{{ route('admin.gps.dashboard', ['id' => '1']) }}"
                                class="small-box-footer">
                            </a>
                            <div class="small-box bg-green"><a href="{{ route('admin.gps.dashboard', ['id' => '1']) }}"
                                    class="small-box-footer">
                                    <div class="inner">
                                        <h4>Masjid Al Haram</h4>
                                        <p></p>
                                    </div>
                                    <div class="icon">
                                        <i class="icon ion-ios-moon"></i>
                                    </div>
                                </a><a href="{{ route('admin.gps.dashboard', ['id' => '1']) }}"
                                    class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <a href="{{ route('admin.gps.dashboard', ['id' => '2']) }}" class="small-box-footer">
                        </a>
                        <div class="col-lg-4 col-xs-6"><a href="{{ route('admin.gps.dashboard', ['id' => '2']) }}"
                                class="small-box-footer">
                            </a>
                            <div class="small-box bg-green"><a href="{{ route('admin.gps.dashboard', ['id' => '2']) }}"
                                    class="small-box-footer">
                                    <div class="inner">
                                        <h4>Masjid An Nabawi</h4>

                                        <p></p>
                                    </div>
                                    <div class="icon">
                                        <i class="icon ion-ios-moon"></i>
                                    </div>
                                </a><a href="{{ route('admin.gps.dashboard', ['id' => '2']) }}"
                                    class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <a href="{{ route('admin.gps.dashboard', ['id' => '3']) }}" class="small-box-footer">
                        </a>
                        <div class="col-lg-4 col-xs-6"><a href="{{ route('admin.gps.dashboard', ['id' => '3']) }}"
                                class="small-box-footer">
                            </a>
                            <div class="small-box bg-green"><a href="{{ route('admin.gps.dashboard', ['id' => '3']) }}"
                                    class="small-box-footer">
                                    <div class="inner">
                                        <h4>GPS Hajj (Mina) </h4>

                                        <p></p>
                                    </div>
                                    <div class="icon">
                                        <i class="icon ion-ios-moon"></i>
                                    </div>
                                </a><a href="{{ route('admin.gps.dashboard', ['id' => '3']) }}"
                                    class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>


                    </div>

                </section>

                <!--Code End-->

            </div><!-- end col-->
        </div>
    </div>
@endsection
