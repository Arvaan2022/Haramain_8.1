@extends('Admin.Layout.App')
@section('title', 'Sub Mosque')
@push('CSS')
@endpush
@section('Content')
    <div class="content-wrapper" style="min-height: 836px;">
        <section class="content-header">
            <h1>
                Language Add
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Language</a></li>
                <li class="active">Add</li>
            </ol>
        </section>
        <section class="content animated bounceInUp">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-xs-12">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <div class="box-title">
                                <h3>Language Add</h3>
                            </div>
                        </div>
                        <div class="box-body">
                            <form action="{{ route('admin.language.store') }}" id="language_form" class="form-horizontal"
                                method="post" enctype="multipart/form-data" novalidate="novalidate">
                                @csrf
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Language Name(English)
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" id="language_en" name="language_en" data-required="1"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Language Name(Arabic)
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" id="language_ar" name="language_ar" data-required="1"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Select Mosque
                                            <span class="required" aria-required="true"> </span>
                                        </label>
                                        <div class="col-md-6">
                                            <select class=" form-control" name="category_id" id="category_id">
                                                <option value="">Select-Mosque</option>
                                                @foreach ($cate as $c)
                                                    <option value="{{ $c->category_id }}">{{ $c->category_en }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">Select Sub Mosque
                                            <span class="required" aria-required="true"> </span>
                                        </label>
                                        <div class="col-md-6 sub_mosque">
                                            <select class=" form-control" name="sub_category_id" id="sub_category_id"
                                                readonly="">
                                                <option value="">Select-sub-Mosque</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="add_years">
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn  btn-success">Add Language</button>
                                            <a href="{{ route('admin.language.list') }}" class="btn btn-default">Cancel</a>
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
