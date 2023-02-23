@extends('Admin.Layout.app')

@section('title')
    {{ trans('admin.competition') }}
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
           <!-- If any errors then display here -->
           @if ($errors->any())
           <div class="row">
               <div class="col-sm-6 col-sm-offset-3">
                   {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
               </div>
           </div>
       @endif

   <!-- Datatable Heading code -->
        <div class="content">
            <div class="container-fluid">
                <div class="row page-title align-items-center ">
                    <div class="col-sm-4 col-xl-8 right-btn">
                        <h4 class="mb-1 mt-0">{{ trans('admin.competition') }}</h4>
                    </div>
                    <div class="col-sm-8 col-xl-8 menu-right">
                        <!-- This Code for breadcrumb -->
                        <nav aria-label="breadcrumb" class="float-right mt-2">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a>{{ trans('admin.home') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <strong>{{ trans('admin.competition') }}</strong>
                                </li>
                            </ol>
                        </nav>
                        <!-- breadcrum END -->
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                    <table id="competition-datatable"
                        class="table table-striped  dt-responsive nowrap dataTable no-footer dtr-inline collapsed">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Country</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Telephone</th>
                                <th>Comments</th>
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
        $('#competition-datatable').DataTable({
            processing: true,
            serverSide: true,
            "searching": true,
            ajax: '{{ route('admin.competition.list.datatable') }}',
            columns: [{
                    data: 'id',
                    name: 'id',
                    sWidth: '5%'
                },
                {
                    data: 'name',
                    name: 'name',
                    sWidth: '10%'
                },
                {
                    data: 'country',
                    name: 'country',
                    sWidth: '10%'
                },
                {
                    data: 'email',
                    name: 'email',
                    sWidth: '15%'
                },
                {
                    data: 'address',
                    name: 'address',
                    sWidth: '15%'
                },
                {
                    data: 'telephone',
                    name: 'telephone',
                    sWidth: '10%'
                },
                {
                    data: 'comments',
                    name: 'comments',
                },
                {
                    data: 'action',
                    name: 'action',
                    sWidth: '10%'
                },

            ]
        });
    </script>
@endpush
