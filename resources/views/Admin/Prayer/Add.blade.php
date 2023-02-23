@extends('Admin.Layout.App')
@section('title', trans('admin.prayer_manage') )
@push('CSS')
@endpush
@section('Content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                {{ trans('admin.prayer_manage') }}
                <small>{{ trans('admin.control_panel') }}</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('admin.prayer.dashboard')}}">{{ trans('admin.prayer_manage') }}</a></li>
                <li class="active">{{ trans('admin.add') }}</li>
            </ol>
        </section>
        @if ($errors->any())
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                </div>
            </div>
        @endif
        <section class="content animated bounceInUp">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-xs-12">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <div class="box-title">
                                <h3>{{ trans('admin.prayer_add') }}</h3>
                            </div>
                        </div>
                        <div class="box-body">
                            <form action="{{ route('admin.prayer.store') }}" id="prayer_form" class="form-horizontal"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">

                                    <div class="form-group">
                                        <label class="control-label col-md-3">	
                                            {{ trans('admin.select_mosque') }}
                                        </label>
                                        <div class="col-md-6 sub_mosque">
                                            <select class="select2 form-control" name="category_id" id="category_id">
                                                <option value="">{{ trans('admin.select_mosque') }}</option>
                                                @foreach ($category as $c)
                                                    <option value="{{ $c->category_id }}">{{ $c->category_en }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">
                                            {{ trans('admin.select_month') }}
                                        </label>
                                        <div class="col-md-6 has-success">
                                            <select class="select2 form-control" name="month" id="month" aria-required="true" aria-invalid="false">
                                               <option value="">{{ trans('admin.select_month') }}</option>
                                               <option value="Jan">Jan</option>
                                               <option value="Feb">Feb</option>
                                               <option value="Mar">Mar</option>
                                               <option value="Apr">Apr</option>
                                               <option value="May">May</option>
                                               <option value="Jun">Jun</option>
                                               <option value="Jul">Jul</option>
                                               <option value="Aug">Aug</option>
                                               <option value="Sep">Sep</option>
                                               <option value="Oct">Oct</option>
                                               <option value="Nov">Nov</option>
                                               <option value="Dec">Dec</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3"> 
                                             {{ trans('admin.select_year') }} 
                                        </label>
                                        <div class="col-md-6 has-success">
                                            <select class="select2 form-control" name="year" id="year" aria-required="true" aria-invalid="false">
                                            <option value=""> {{ trans('admin.select_year') }}</option>
                                               <option value="2017">2017</option>
                                               <option value="2018">2018</option>
                                               <option value="2019">2019</option>
                                               <option value="2020">2020</option>
                                               <option value="2021">2021</option>
                                               <option value="2022">2022</option>
                                               <option value="2023">2023</option>
                                               <option value="2024">2024</option>
                                               <option value="2025">2025</option>
                                               <option value="2026">2026</option>
                                               <option value="2027">2027</option>
                                               <option value="2028">2028</option>
                                               <option value="2029">2029</option>
                                               <option value="2030">2030</option>
                                               <option value="2031">2031</option>
                                               <option value="2032">2032</option>
                                               <option value="2033">2033</option>
                                               <option value="2034">2034</option>
                                               <option value="2035">2035</option>
                                               <option value="2036">2036</option>
                                               <option value="2037">2037</option>
                                               <option value="2038">2038</option>
                                               <option value="2039">2039</option>
                                               <option value="2040">2040</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3"> 
                                            {{ trans('admin.select_file') }}
                                        </label>
                                        <div class="col-md-6">
                                            <input type="file" name="file" id="file" class="form-control">
                                        </div>
                                    </div>


    
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn  btn-success">{{ trans('admin.add_prayer') }}</button>
                                                <a href="{{ route('admin.prayer.dashboard') }}" class="btn btn-default">{{ trans('admin.cancel') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('JS')
    <script src="{{ asset(JS) }}/subcatedropdown.js"></script>
@endpush
