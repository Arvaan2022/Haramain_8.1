@extends('Admin.Layout.App')
@section('title', 'Year')
@push('CSS')
@endpush
@section('Content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Year Add
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Year</a></li>
                <li class="active">Add</li>
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
                                <h3>Year Add</h3>
                            </div>
                            <div class="box-body">
                                <form action="{{ route('admin.year.store') }}" id="year_form" class="form-horizontal"
                                    method="post" enctype="multipart/form-data" novalidate="novalidate">
                                    @csrf
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Select Mosque
                                                <span class="required" aria-required="true"> </span>
                                            </label>
                                            <div class="col-md-6">
                                                <select class="select2 form-control" name="category_id" id="category_id">
                                                    <option value="">Select-Mosque</option>
                                                    @foreach ($cate as $c)
                                                        <option value="{{ $c->category_id }}">{{ $c->category_en }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Select Sub Mosque
                                                <span class="required" aria-required="true"> </span>
                                            </label>
                                            <div class="col-md-6 sub_mosque">
                                                <select class="select2 form-control" name="sub_category_id"
                                                    id="sub_category_id" readonly="">
                                                    <option value="">Select-sub-Mosque</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Year Name(English)
                                            </label>
                                            <div class="col-md-6">
                                                <input type="text" id="year_en" name="year_en" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Year Name(Arabic)
                                            </label>
                                            <div class="col-md-6">
                                                <input type="text" id="year_ar" name="year_ar" class="form-control">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn  btn-success">Add Year</button>
                                                <a href="{{ route('admin.year.list') }}" class="btn btn-default">Cancel</a>
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
