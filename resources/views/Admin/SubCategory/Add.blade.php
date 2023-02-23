@extends('Admin.Layout.App')
@section('title', 'Sub Mosque')
@section('Content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Sub Mosque Add
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Sub Mosque Add</li>
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
                                <h3>Sub Mosque Add</h3>
                            </div>
                        </div>
                        <div class="box-body">
                            <form action="{{ route('admin.submosque.store') }}" id="category_form" class="form-horizontal"
                                method="post" enctype="multipart/form-data" novalidate="novalidate">
                                @csrf
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Mosque Name
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" id="sub_category_en" name="sub_category_en"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Mosque Urdu Name
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" id="sub_category_urdu" name="sub_category_urdu"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Mosque Arabic Name
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" id="sub_category_ar" name="sub_category_ar"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Mosque Category
                                        </label>
                                        <div class="col-md-6">
                                            <select name="category_id" id="category_id" class="form-control">
                                                <option value="">-Select Category-</option>
                                                @foreach ($cate as $c)
                                                    <option value="{{ $c->category_id }}">{{ $c->category_en }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn  btn-success">Add Mosque</button>
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
