@extends('Admin.Layout.App')
@section('title', 'Translation')
@push('CSS')
@endpush

@push('CSS')
    <link href="{{ asset(CSS) }}/translation.css" rel="stylesheet" type="text/css" />
    @section('Content')
        <div class="content-wrapper">
            <div class="content">
                <div class="container-fluid">
                    <div class="row page-title">
                        <div class="col-md-12">
                            <nav aria-label="breadcrumb" class="float-right mt-1">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Edit Translation</a></li>
                                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit <strong>Translation</strong>
                                    </li>
                                </ol>
                            </nav>
                            <h4 class="mb-1 mt-0">Edit Translation</h4>
                        </div>
                    </div>
                    @if ($errors->any())
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                                {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                            </div>
                        </div>
                    @endif
                    <div style="margin-top: 10px" class="flash-message">
                        @if (Session::has('message'))
                            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}
                            </p>
                        @endif
                    </div>

                    <form method="post" action="{{ route('admin.Translation.Update', $data->id) }}" name="translationForm"
                        id="translationForm" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="translationId" value="{{ $data->id }}">
                        <div class="row">
                            <div class="col-9">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name">Key:</label>
                                            <input type="text" class="form-control mb-2" readonly
                                                placeholder="Please Enter Key" name="key" id='key'
                                                value="{{ $data->group . '.' . $data->key }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="name">Text:</label>
                                            <textarea autofill="off" autocomplete="chrome-off" class="form-control" id="text" name="text"
                                                placeholder="Enter Your Text">{!! $data->text['en'] ?? '' !!}</textarea>
                                        </div>
                                    </div>
                                </div> <!-- end card-->

                            </div> <!-- end col 8-->
                            <div class="col-3">
                                <div class="card">
                                    <div class="card-body">

                                        <p><i class="bi bi-calender icon-dual icon-xs mr-2"></i> Updated on:</p>
                                        <input type="submit" name="publish" value="Add" class="btn btn-success"
                                            id='submitform'>
                                    </div><!-- end card-body -->
                                </div> <!-- end card-->
                                <!-- end card-body -->
                            </div> <!-- end card-->
                        </div> <!-- end col 4-->
                    </form>
                </div>

            </div>
        </div>
    @endsection
