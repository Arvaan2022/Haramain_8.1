@extends('Admin.Layout.App')
@section('title',  trans('admin.masjid_an_nabawi'))
@section('Content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                {{ trans('admin.masjid_an_nabawi') }}
                <small>{{ trans('admin.control_panel') }}</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> {{ trans('admin.home') }}</a></li>
                <li class="active">{{ trans('admin.masjid_an_nabawi') }}</li>
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
                                <h3>{{ trans('admin.add_live_stream_khutbah') }}</h3>
                            </div>
                        </div>
                        <div class="box-body">
                            <form action="{{ route('admin.nabawi.livestream.data.update') }}" id="category_form" class="form-horizontal"
                                method="post" enctype="multipart/form-data" novalidate="novalidate">
                                @csrf
                                <input type="hidden" name="audio_id" value="{{ $data->audio_id }}" id="audio_id">
                                <input type="hidden" name="nId" value="{{ $data->sub_category_id }}" id="nId">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">{{ trans('admin.audio_url') }}
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" id="audio_url" name="audio_url" value="{{ $data->audio_url }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">{{ trans('admin.video_url') }}
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" id="video_url" name="video_url" value="{{ $data->video_url }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn  btn-success">{{ trans('admin.add') }}</button>
                                                <a href="{{ route('admin.nabawi.data.list',['id' => $data->sub_category_id]) }}" class="btn btn-default">{{ trans('admin.cancel') }}</a>
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
