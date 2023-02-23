@extends('Admin.Layout.app')

@section('title')
    {{ trans('admin.masjid_al_haram') }}
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
                        {{ trans('admin.masjid_al_haram') }}
                        <small>{{ trans('admin.control_panel') }}</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i>{{ trans('admin.home') }}</a></li>
                        <li class="active">{{ trans('admin.masjid_al_haram') }}</li>
                    </ol>
                </section>
                <div class="box-header">
                    <div class="box-title pull-right">
                        <a href="{{ route('admin.nabawi.daily.salaah.data.add',['id' => $subCatId]) }}" type="button" class="btn btn-success" aria-haspopup="true"
                            aria-expanded="false">{{ trans('admin.add') }}  <i class="fa fa-plus"></i></a>
                    </div>
                </div>

            </div>
            <input type="hidden"  name="catId" value="{{ $catId }}" id="catId">
            <input type="hidden" name="subCatId" value="{{ $subCatId }}" id="subCatId">
            <div class="card">
                <div class="card-body">
                    <table id="dailysalaah-datatable"
                        class="table table-striped  dt-responsive nowrap dataTable no-footer dtr-inline collapsed">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Imaam Name</th>
                                <th>Date</th>
                                <th>Audio Title</th>
                                <th>Audio Auther</th>
                                <th>Audio Artist</th>
                                <th>Audio File</th>
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
        $('#dailysalaah-datatable').DataTable({
            processing: true,
            serverSide: true,
            "searching": true,
            ajax: "{{ route('admin.nabawi.data.list.datatable',['id' => $subCatId]) }}",
             columns: [{
                    data: 'audio_id',
                    name: 'audio_id',
                    sWidth: '10%'
                },
                {
                    data: 'audio_id',
                    name: 'audio_id',
                    sWidth: '10%'
                },
                {
                    data: 'audio_id',
                    name: 'audio_id',
                    sWidth: '10%'
                },
                {
                    data: 'audio_id',
                    name: 'audio_id',
                    sWidth: '10%'
                },
                {
                    data: 'audio_id',
                    name: 'audio_id',
                    sWidth: '20%'
                },
                {
                    data: 'audio_id',
                    name: 'audio_id',
                    sWidth: '20%'
                },
                {
                    data: 'audio_id',
                    name: 'audio_id',
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
