@extends('Admin.Layout.App')
@section('title', 'Sub Mosque')
@push('CSS')
@endpush
@section('Content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Sub Mosque Edit
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Sub Mosque Edit</li>
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
                            <h3 class="box-title">Sub Mosque Edit</h3>
                        </div>
                        <div class="box-body">
                            <form action="{{ route('admin.submosqueEdit.store', ['id' => $subcate->sub_category_id]) }}"
                                id="form_sample_1" class="form-horizontal" method="post" enctype="multipart/form-data"
                                novalidate="novalidate">
                                @csrf
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Mosque Name
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" name="sub_category_en"
                                                value="{{ $subcate->category->category_en }}" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Sub Mosque Name
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" id="sub_category_en" name="sub_category_en"
                                                value="{{ $subcate->sub_category_en }} " class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Sub Mosque Arabic Name
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" id="sub_category_ar" name="sub_category_ar"
                                                value="{{ $subcate->sub_category_ar }} " class="form-control">
                                        </div>
                                    </div>

                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn  btn-success">Update Mosque</button>
                                            <a href="{{ route('admin.submosque.list') }}" class="btn btn-default">Cancel</a>
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
