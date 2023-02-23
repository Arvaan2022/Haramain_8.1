@extends('Admin.Layout.app')

@section('title')
    Translation
@endsection
@push('CSS')
    <link href="{{ asset(CSS) }}/translation.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset(LIBS) }}/dropzone/dropzone.min.css" rel="stylesheet" type="text/css">
    <style>
        .menu-right {
            display: flex;
            align-items: flex-end;
            flex-direction: column;
            margin-block-end: 2rem;

        }
    </style>
@endpush
@section('Content')
    <div class="content-wrapper">
        @if (session('status'))
            <div class="alert alert-success text-white">
                {{ session('status') }}
            </div>
        @endif
        <div class="content">
            <div class="container-fluid">
                <div class="row page-title align-items-center ">
                    <div class="col-sm-4 col-xl-8 right-btn">
                        <h4 class="mb-1 mt-0">Translation List</h4>
                    </div>
                    <div class="col-sm-8 col-xl-8 menu-right">
                        <!-- This Code for breadcrumb -->
                        <div class="btn-group float-sm-right mt-3 mt-sm-0 ml-3 ">
                            <a href="{{ route('admin.Translation') }}" type="button" class="btn-info btn"
                                aria-haspopup="true" aria-expanded="false" style="background-color:#549bb2;">
                                <i class="icon-dual icon bi bi-plus-lg"></i>Add Translation</a>
                        </div>
                        <nav aria-label="breadcrumb" class="float-right mt-2">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a>Translation</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><strong>Translation List</strong>
                                </li>
                            </ol>
                        </nav>
                        <!-- breadcrum END -->
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <!-- If any errors then display here -->
                        @if ($errors->any())
                            <div class="row">
                                <div class="col-sm-6 col-sm-offset-3">
                                    {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                                </div>
                            </div>
                        @endif
                        <!-- Flash Message Display Here -->
                        <div style="margin-top: 10px" class="flash-message">
                            @if (Session::has('message'))
                                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
                                    {{ Session::get('message') }}</p>
                            @endif
                        </div>
                        <!-- Datatable Heading code -->
                        <table id="translation-datatable"
                            class="table table-striped  dt-responsive nowrap dataTable no-footer dtr-inline collapsed">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Text</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <!-- Datatable END -->
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
    </div>
    
@endsection
@push('JS')
    <script>
        $('#translation-datatable').DataTable({
            processing: true,
            serverSide: true,
            "searching": true,
            ajax: '{{ route('admin.Translation.List.Datatable') }}',
            columns: [{
                    data: 'id',
                    name: 'id',
                    sWidth: '10%'
                },
                {
                    data: 'group',
                    name: 'group',
                    sWidth: '35%'
                },
                {
                    data: 'text',
                    name: 'text',
                    sWidth: '35%'
                },

                {
                    data: 'action',
                    name: 'action',
                    $sWidth: '20%'
                },
            ]
        });
    </script>
@endpush
