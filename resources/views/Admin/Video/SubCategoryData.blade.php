@extends('Admin.Layout.app')

@section('title')
    {{ trans('admin.dashboard_name') }} | {{ trans('admin.haramain_videos') }}
@endsection
@push('CSS')
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
        @if ($errors->any())
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
            </div>
        </div>
    @endif
        <div class="content">
            <div class="container-fluid">
                
                <section class="content-header">
                    <h1>
                        {{ $name }}
                        <small>{{ trans('admin.control_panel') }}</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="{{ route('admin.video.dashboard') }}">Video Dashboard</a></li>
                        <li class="active">{{ trans('admin.haramain_videos') }}</li>
                    </ol>
                     
                  
                </section>
                              
             <!--Code Start-->
             <section class="content">
                <div class="box-body">
                  <form action="{{ route('admin.video.subcategory.store') }}" id="quran_form" class="form-horizontal" method="post" enctype="multipart/form-data">
                   @csrf
                   <input type="hidden" name="subCatId" value="{{ $id }}">
                    <div class="form-body">
                      <div class="data">
                        <div class="form-group">
                          <label class="control-label col-md-3">Name in English
                          </label>
                          <div class="col-md-6">
                            <input type="text" id="subCatName" name="subCatName" placeholder="Category Name in English" 
                             class="form-control" > 
                          </div>
                        </div>
                      </div>
                      <div class="data">
                        <div class="form-group">
                          <label class="control-label col-md-3">Name in Arabic
                          </label>
                          <div class="col-md-6">
                            <input type="text" id="subCatArabic" name="subCatArabic" placeholder="Category Name in Arabic" 
                            class="form-control" > 
                          </div>
                        </div>
                      </div>
                      <div class="data">
                        <div class="form-group">
                          <label class="control-label col-md-3">Link
                          </label>
                          <div class="col-md-6">
                            <input type="text" id="subCatLink" name="subCatLink" placeholder="Redirect Link" class="form-control"> 
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-actions">
                      <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                          <button type="submit" class="btn  btn-success">Save</button>
                          <a href="{{ route('admin.video.category',['id' => $mId]) }}" class="btn btn-default">Cancel</a>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                       
            </section>

          <section>
            <div class="card">
              <div class="card-body">
                  <!-- Datatable Heading code -->
                  <table id="video-datatable"
                      class="table table-striped  dt-responsive nowrap dataTable no-footer dtr-inline collapsed">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>Name In Arabic</th>
                              <th>Redirect Link</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                      </tbody>
                  </table>
                  <!-- Datatable END -->
              </div> <!-- end card body-->
             </div>
          </section>
               
             <!--Code End-->

            </div><!-- end col-->
        </div>
    </div>
   
@endsection
@push('JS')
    <script>
        $('#video-datatable').DataTable({
            processing: true,
            serverSide: true,
            "searching": true,
            ajax: "{{ route('admin.video.subcategorylist.datatable',['id' => $id]) }}",
            columns: [{
                    data: 'id',
                    name: 'id',
                    sWidth: '10%'
                },
                {
                    data: 'name',
                    name: 'name',
                    sWidth: '25%'
                },
                {
                    data: 'name_arabic',
                    name: 'name_arabic',
                    sWidth: '25%'
                },
                {
                    data: 'link',
                    name: 'link',
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