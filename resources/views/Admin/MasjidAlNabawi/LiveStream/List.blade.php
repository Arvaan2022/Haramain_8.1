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

            </div>
            <input type="hidden"  name="catId" value="{{ $catId }}" id="catId">
            <input type="hidden" name="subCatId" value="{{ $subCatId }}" id="subCatId">
            <div class="card">
                <div class="card-body">
                    <table id="audiodata-datatable"
                        class="table table-striped  dt-responsive nowrap dataTable no-footer dtr-inline collapsed">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Audio Url</th>
                                <th>Video Url</th>
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
        $('#audiodata-datatable').DataTable({
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
                    data: 'audio_url',
                    name: 'audio_url',
                    sWidth: '25%'
                },
                {
                    data: 'video_url',
                    name: 'video_url',
                    sWidth: '25%'
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