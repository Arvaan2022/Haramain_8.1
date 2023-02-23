@extends('Admin.Layout.app')
@section('title')
    {{ trans('admin.mosque') }}
@endsection
@push('CSS')
    <style>
        .page {
            margin-block-start: 5rem;
        }
    </style>
@endpush
@section('Content')
    <div class="content-wrapper ">

        <section class="content-header">
            <h1>
              Mosque Edit
              <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Mosque Edit</li>
            </ol>
          </section>

        <div class="col-lg-6 col-lg-offset-3 col-xs-12 page">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('admin.mosque_edit') }}</h3>
                </div>
                <div class="box-body">
                    <form action="{{ route('admin.mosqueEdit.store', ['id' => $cate->category_id]) }}" method="POST"
                        id="from_category" class="form-horizontal" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-3">{{ trans('admin.mosque_name') }}
                                </label>
                                <div class="col-md-6">
                                    <input type="text" id="category_en" name="category_en"
                                        value="{{ $cate->category_en }}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">{{ trans('admin.mosque_arabic_name') }}
                                </label>
                                <div class="col-md-6 has-success">
                                    <input type="text" id="category_ar" name="category_ar"
                                        value="{{ $cate->category_ar }}" class="form-control" aria-invalid="false">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Mosque Images
                                </label>
                                <div class="form-group">
                                    <label class="control-label col-md-3">
                                    </label>
                                    <div class="col-md-6">
                                        <img src="#" width="300px" height="200px">
                                        <button class="btn btn-danger" type="button">Delete</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Change Image
                                    <span class="required" aria-required="true"> </span>
                                </label>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit"
                                        class="btn  btn-success">{{ trans('admin.update_mosque') }}</button>
                                    <a href="{{ route('admin.mosque.list') }}" class="btn btn-default">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
