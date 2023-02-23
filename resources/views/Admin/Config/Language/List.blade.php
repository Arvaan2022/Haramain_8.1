@extends('Admin.Layout.app')
@section('title')
    {{ trans('admin.language_manage') }}
@endsection
@section('Content')
    <div class="content-wrapper">
        <!-- If any errors then display here -->
        @if ($errors->any())
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                </div>
            </div>
        @endif
        <!-- Flash Message Display Here -->
        @if (session('status'))
            <div class="alert alert-success text-white">
                {{ session('status') }}
            </div>
        @endif
        <div class="content">
            <div class="container-fluid">
                <section class="content-header">
                    <h1>
                        Language Manage
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Language </li>
                    </ol>
                </section>

                <div class="box-header">
                    <div class="box-title pull-right">
                        <a href="{{ route('admin.language.view') }}" type="button" class="btn-info btn"
                            aria-haspopup="true" aria-expanded="false" style="background-color:#549bb2;">
                            <i class="icon-dual icon bi bi-plus-lg"></i>{{ trans('admin.add_language') }}</a>
                    </div>
                    <!-- breadcrum END -->
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <!-- Datatable Heading code -->
                    <table id="language-datatable"
                        class="table table-striped  dt-responsive nowrap dataTable no-footer dtr-inline collapsed">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Language Name</th>
                                <th>Sub Mosque</th>
                                <th>Main Mosque</th>
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
        $('#language-datatable').DataTable({
            processing: true,
            serverSide: true,
            "searching": true,
            ajax: '{{ route('admin.language.list.datatable') }}',
            columns: [{
                    data: 'language_id',
                    name: 'language_id',
                    sWidth: '10%'
                },
                {
                    data: 'language_en',
                    name: 'language_en',
                    sWidth: '25%'
                },
                {
                    data: 'sub_category_id',
                    name: 'sub_category_id',
                    sWidth: '25%'
                },
                {
                    data: 'category_id',
                    name: 'category_id',
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
