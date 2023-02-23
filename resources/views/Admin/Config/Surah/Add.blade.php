@extends('Admin.Layout.App')
@section('title', 'Sub Mosque')
@section('Content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Surah Add
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Surah</a></li>
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
                                <h3>Surah Add</h3>
                            </div>
                        </div>
                        <div class="box-body">
                            <form action="{{ route('admin.surah.store') }}" id="imaam_form" class="form-horizontal"
                                method="post" enctype="multipart/form-data" novalidate="novalidate">
                                @csrf
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Surah Name
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" id="surah_name" name="surah_name" class="form-control">
                                        </div>
                                    </div>
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
                                            <select class="select2 form-control" name="sub_category_id" id="sub_category_id"
                                                readonly="">
                                                <option value="">Select-sub-Mosque</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Select Imaam
                                            <span class="required" aria-required="true"> </span>
                                        </label>
                                        <div class="col-md-6 imaam_list">
                                            <select class="select2 form-control" name="imaam_id" id="imaam_change"
                                                readonly="">
                                                <option value="">Select-Imaam</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn  btn-success">Add Surah</button>
                                            <a href="{{ route('admin.surah.list') }}" class="btn btn-default">Cancel</a>
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
