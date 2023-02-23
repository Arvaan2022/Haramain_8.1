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
                                <h3>{{ trans('admin.add_daily_salaah') }}</h3>
                            </div>
                        </div>
                        <div class="box-body">
                            <form action="{{ route('admin.nabawi.daily.salaah.data.store') }}" id="daily_salaah_form" class="form-horizontal"
                                method="post" enctype="multipart/form-data" novalidate="novalidate">
                                @csrf
                                <input type="hidden" name="nId" value="{{ $nId }}" id="nId">
                                <div class="form-body">
                                   <div class="form-group">
                                        <label class="control-label col-md-3">{{ trans('admin.select_imaam_req') }}
                                            <span class="required" aria-required="true"> </span>
                                        </label>
                                        <div class="col-md-6">
                                            <select class="form-control select2" name="imaam_id" id="imaam">
                                                <option value="">{{ trans('admin.select_imaam_req') }}</option>
                                                @foreach ($imaam as $ima)
                                                <option value="{{ $ima->imaam_id }}">{{ $ima->imaam_en }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Enter Date
                                        </label>
                                        <div class="col-md-6">
                                            <input type="date" class="form-control" id="datemask" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" name="date_    n
                                            of_salaah" value="" aria-required="true" aria-invalid="false">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">{{ trans('admin.upload_audio') }}
                                            <span class="required" aria-required="true"></span>
                                        </label>
                                        <div class="col-md-6">
                                            <input type="file" name="audio_file" id="upload" class="form-control" >
                                            {{-- onchange="readURL(this) --}}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">{{ trans('admin.audio_title') }}
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" id="audio_title" name="audio_title" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">{{ trans('admin.audio_auther') }}
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" id="audio_auther" name="audio_auther" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">{{ trans('admin.audio_artist') }}
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" id="audio_artist" name="audio_artist" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn  btn-success">{{ trans('admin.add') }}</button>
                                                <a href="{{ route('admin.nabawi.data.list',['id' => $nId]) }}" class="btn btn-default">{{ trans('admin.cancel') }}</a>
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
