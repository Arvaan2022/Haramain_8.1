@extends('Admin.Layout.app')

@section('title')
    {{ trans('admin.dashboard_name') }} | {{ trans('admin.advertisment') }}
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
                        <h4 class="mb-1 mt-0">{{ trans('admin.advertisment') }}</h4>
                    </div>
                    <div class="col-sm-8 col-xl-8 menu-right">
                        <!-- This Code for breadcrumb -->
                        <nav aria-label="breadcrumb" class="float-right mt-2">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a>{{ trans('admin.home') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <strong>{{ trans('admin.advertisment') }}</strong>
                                </li>
                            </ol>
                        </nav>
                        <!-- breadcrum END -->
                    </div>
                </div>
                              
             <!--Code Start-->

                 <div class="row">
                          <div class="col-lg-12 col-xs-12">
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <div class="col-sm-12">
                                    <form action="{{ route('admin.advertisment.store') }}" id="advertisment_form" class="form-horizontal" method="post" enctype="multipart/form-data">
                                      <div class="form-body">
                                        <div class="data">
                                          <div class="form-group">
                                            <label class="control-label col-md-3">Title
                                            </label>
                                            <div class="col-md-6">
                                              <input type="text" id="name" name="name[]" placeholder="Title" class="form-control"> 
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-md-3">Redirect Link
                                            </label>
                                            <div class="col-md-6">
                                              <input type="text" id="redirectLink" name="redirectLink[]" placeholder="Redirirect Link" class="form-control"> 
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-md-3">Choose File
                                            </label>
                                            <div class="col-md-6">
                                              <input type="file" id="advertisment_url" name="advertisment_url[]" class="form-control"> 
                                            </div>
                                            <div class="col-md-1"> 
                                              <div class="plus-icon">
                                                <a href="javascript:void(0);" class="add_button" title="Add field"><img src="https://haramain360.com/admin_v1/assets/dist/img/add-icon.png"></a>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
            
                                      <div class="form-actions">
                                        <div class="row">
                                          <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn  btn-success">Add</button>
                                           </div>
                                        </div>
                                      </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 
             <!--Code End-->

            </div><!-- end col-->
        </div>
    </div>
    </div>
    </div>
@endsection