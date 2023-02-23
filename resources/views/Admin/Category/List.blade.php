@extends('Admin.Layout.app')

@section('title')
    {{ trans('admin.main_mosque') }}
@endsection
@push('CSS')
    <link href="{{ asset(CSS) }}/translation.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset(LIBS) }}/dropzone/dropzone.min.css" rel="stylesheet" type="text/css">
    <style>
        .menu {
            margin-block-end: 3rem;
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
            <div class=" menu">
                <section class="content-header">
                    <h1>
                        Main Mosque
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Mosque</li>
                    </ol>
                </section>
            </div>
            <div class="card">
                <div class="card-body">
                    <table id="mosque-datatable"
                        class="table table-striped  dt-responsive nowrap dataTable no-footer dtr-inline collapsed">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Status</th>
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
@endsection
@push('JS')
    <script>
        $('#mosque-datatable').DataTable({
            processing: true,
            serverSide: true,
            "searching": true,
            ajax: '{{ route('admin.mosque.list.datatable') }}',
            columns: [{
                    data: 'category_id',
                    name: 'category_id',
                    sWidth: '10%'
                },
                {
                    data: 'category_en',
                    name: 'category_en',
                    sWidth: '25%'
                },
                {
                    data: 'cat_image',
                    name: 'cat_image',
                    sWidth: '30%'
                },
                {
                    data: 'status',
                    name: 'status',
                    sWidth: '15%'
                },

                {
                    data: 'action',
                    name: 'action',
                    sWidth: '20%'
                },
            ]
        });
    </script>
@endpush
