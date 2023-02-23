@extends('Admin.Layout.app')

@section('title')
    {{ trans('admin.sub_mosque') }}
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
        <section class="content-header">
            <h1>
                Sub Mosque
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Sub Mosque</li>
            </ol>
        </section>


        @if (session('status'))
            <div class="alert alert-success text-white">
                {{ session('status') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                </div>
            </div>
        @endif

        <div class="content">
            <div class="box-header">
                <div class="box-title pull-right">
                    <a href="{{ route('admin.submosque.view') }}" type="button" class="btn-info btn" aria-haspopup="true"
                        aria-expanded="false" style="background-color:#549bb2;">
                        <i class="icon-dual icon bi bi-plus-lg"></i>{{ trans('admin.add_sub_mosque') }}</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <!-- Datatable Heading code -->
                    <table id="submosque-datatable"
                        class="table table-striped  dt-responsive nowrap dataTable no-footer dtr-inline collapsed">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Parent Category</th>
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
        $('#submosque-datatable').DataTable({
            processing: true,
            serverSide: true,
            "searching": true,
            ajax: '{{ route('admin.submosque.list.datatable') }}',
            columns: [{
                    data: 'sub_category_id',
                    name: 'sub_category_id',
                    sWidth: '10%'
                },
                {
                    data: 'sub_category_en',
                    name: 'sub_category_en',
                    sWidth: '25%'
                },
                {
                    data: 'category_id',
                    name: 'category_id',
                    sWidth: '25%'
                },
                {
                    data: 'status',
                    name: 'status',
                    sWidth: '20%'
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
