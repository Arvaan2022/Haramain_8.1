@extends('Admin.Layout.App')
@section('title', 'Add Translation')
@push('CSS')
@endpush
@section('Content')
    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row page-title">
                    <div class="col-md-12">
                        <nav aria-label="breadcrumb" class="float-right mt-1">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Add Translation</a></li>
                                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add <strong>Translation</strong></li>
                            </ol>
                        </nav>
                        <h4 class="mb-1 mt-0">Add Translation</h4>
                    </div>
                </div>
                @if ($errors->any())
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                        </div>
                    </div>
                @endif
                <div style="margin-block-start: 10px" class="flash-message">
                    @if (Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}
                        </p>
                    @endif
                </div>
                <form method="post" action="{{ route('admin.Translation.Store') }}" name="translationForm"
                    id="translationForm" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Key:</label>
                                        <input type="text" class="form-control mb-2" placeholder="Please Enter Group"
                                            name="key" id='key'>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Text:</label>
                                        <textarea autofill="off" autocomplete="chrome-off" class="form-control" id="text" name="text"
                                            placeholder="Enter Your Text"></textarea>
                                    </div>
                                </div>
                            </div> <!-- end card-->

                        </div> <!-- end col 8-->
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">

                                    <p><i class="bi bi-calender icon-dual icon-xs mr-2"></i> Updated on:</p>
                                    <input type="submit" name="publish" value="Add" class="btn btn-success addBtn"
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
