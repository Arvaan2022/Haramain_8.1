@extends('Admin.Layout.app')

@section('title')
    {{ trans('admin.dashboard_name') }} | {{ trans('admin.masjid_an_nabawi') }}
@endsection
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

        <section class="content-header">
            <h1>
                <small>Gps Locations Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#"> Gps Locations</a></li>
                <li class="active">Add Edit</li>
            </ol>
        </section>
        <div class="content">
            <div class="container-fluid">
                <!--Code Start-->
                <div class="col-lg-12 col-xs-12">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <div class="box-title">
                                <h3>Gps Location Headings</h3>
                            </div>
                            <div class="pull-right"><a href="javascript:void(0)" class="btn btn-success pr_btn"
                                    data-toggle="modal" data-target="#exampleModal" type="button">Add Main Headings </a>
                            </div>
                        </div>

                        <div class="box-body">
                            <form action="#" id="add_headings" onsubmit="return false" class=" add_headings"
                                method="post" enctype="multipart/form-data">
                                <input type="hidden" name="cat_id" id="cat_id" value="{{ $cat_id }}">
                                <div class="form-group col-md-4 col-sm-4">
                                    <label for="name">Select Headings</label>
                                    <select name="gps_heading_id" id="gps_heading_id" class="form-control">
                                        <option value="">-Select Headings-</option>
                                        @foreach ($gpsHeadings as $hed)
                                            <option value="{{ $hed->gps_heading_id }}">{{ $hed->gps_heading_en }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div id="editDelete" class="form-group col-md-4 col-sm-4  main-heading "
                                    style="float: left;margin: 25px 0px;" hidden>
                                    <a href="#" class="btn btn-primary " type="button" data-toggle="modal"
                                        id="editHeading" data-target="#exampleModal">
                                        Edit
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-danger deleteBtnMain" type="button"
                                        id="deleteHeading">Delete
                                    </a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card" id="tbl" hidden>
                <div class="box-header with-border">
                    <div class="pull-right">
                        <a href="#" class="btn btn-primary" type="button" data-toggle="modal" id="subHeading"
                            data-target="#exampleModal2">
                            Add Sub Headings
                        </a>
                    </div>
                </div>
                <div class="card-body mt-3">
                    <table id="gpsSubHeading-datatable"
                        class="table table-striped  dt-responsive nowrap dataTable no-footer dtr-inline collapsed">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Place</th>
                                <th>Arabic Name Of Place</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <!-- Datatable END -->
                </div> <!-- end card body-->
            </div>

        </div>

    </div><!-- end col-->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                    <h3 class="modal-title cutom-title">Add Headings</h3>
                </div>
                <div class="modal-body form">
                    <form class="form-horizontal" role="form" id="formadd" method="POST"
                        action="{{ route('admin.gpsHeading.add') }}">
                        @csrf
                        <input type="hidden" name="category_id" value="{{ $cat_id }}">
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="textinput">Gps Heading English</label>
                            <div class="col-sm-8">
                                <input type="text" name="gps_heading_en" class="form-control">
                            </div>
                        </div>
                        <input type="hidden" name="gps_heading_id" class="form-control">

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="textinput">Gps Heading Arabic</label>
                            <div class="col-sm-8">
                                <input type="text" name="gps_heading_ar" class="form-control">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal2 -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                    <h3 class="modal-title cutom-title">Add Sub Headings </h3>
                </div>
                <div class="modal-body form">
                    <form class="form-horizontal" method="post" role="form" id="subForm"
                        action="{{ route('admin.gpsSubHeading.add') }}">
                        @csrf
                        <input type="hidden" name="gps_sub_heading_id">
                        <input type="hidden" name="gps_heading_id">
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="textinput">Place</label>
                            <div class="col-sm-8">
                                <input type="text" name="gps_place_en" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="textinput">Arabic Place Name</label>
                            <div class="col-sm-8">
                                <input type="text" name="gps_place_ar" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="textinput">Latitude</label>
                            <div class="col-sm-8">
                                <input type="text" name="latitude" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="textinput">Longitude</label>
                            <div class="col-sm-8">
                                <input type="text" name="longitude" class="form-control">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>

                </form>
            </div>
        </div>
    </div>
@endsection
@push('JS')
    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery('select[name="gps_heading_id"]').on('change', function() {
                var headingID = jQuery(this).val();
                if (headingID != "") {
                    $('[name="gps_heading_id"]').val(headingID);
                    $("#tbl").attr('hidden', false);
                    $('#editDelete').removeAttr('hidden');
                    $("#deleteHeading").click(function() {
                        swal({
                                title: "Are you sure?",
                                text: "You will not be able to recover this Item!",
                                icon: "warning",
                                buttons: true,
                                dangerMode: true,
                            })
                            .then((willDelete) => {
                                if (willDelete) {
                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
                                                .attr('content')
                                        }
                                    });
                                    $.ajax({
                                        url: "../gpsHeading/deleteHeading/" + headingID,
                                        type: "POST",
                                        success: function(data) {
                                            swal("Done!",
                                                "It was succesfully deleted!",
                                                "success");
                                            location.reload();
                                        },
                                        error: function(xhr, ajaxOptions, thrownError) {
                                            swal("Error deleting!",
                                                "Please try again", "error");
                                        }
                                    });
                                }
                            });
                    });
                    $("#editHeading").click(function(e) {
                        e.preventDefault();
                        $('#formadd')[0].reset();
                        $.ajax({
                            type: "get",
                            url: "../gpsHeading/geteditHeading/" + headingID,
                            dataType: "json",
                            success: function(data) {
                                console.log(data);
                                $('[name="gps_heading_id"]').val(data
                                    .gps_heading_id);
                                $('[name="gps_heading_en"]').val(data
                                    .gps_heading_en);
                                $('[name="gps_heading_ar"]').val(data
                                    .gps_heading_ar);
                                $('#exampleModal').modal('show');
                            }
                        });
                    });

                    let table = $('#gpsSubHeading-datatable').DataTable();
                    table.destroy();
                    $('select[name="gps_heading_id"]').show();
                    jQuery.ajax({
                        url: "../gpsHeading/getSubHeading/" + headingID,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#gpsSubHeading-datatable').DataTable({
                                processing: true,
                                serverSide: true,
                                "searching": true,
                                ajax: "../getSubHeading/list/" + headingID,
                                columns: [{
                                        data: 'gps_sub_heading_id',
                                        name: 'gps_sub_heading_id',
                                        sWidth: '10%'
                                    },
                                    {
                                        data: 'gps_place_en',
                                        name: 'gps_place_en',
                                        sWidth: '15%'
                                    },
                                    {
                                        data: 'gps_place_ar',
                                        name: 'gps_place_ar',
                                        sWidth: '20%'
                                    },
                                    {
                                        data: 'latitude',
                                        name: 'latitude',
                                        sWidth: '15%'
                                    },
                                    {
                                        data: 'longitude',
                                        name: 'longitude',
                                        sWidth: '15%'
                                    },
                                    {
                                        data: 'action',
                                        name: 'action',
                                        sWidth: '25%'
                                    },

                                ]
                            });
                        }

                    });
                } else {
                    $('#editDelete').attr('hidden', true);
                    $("#tbl").attr('hidden', true);
                }

            });
        });


        function editsubbtn(e) {
            $('#subForm')[0].reset();
            let subHadingID = e.getAttribute('data-id');
            let gps_heading_id = $('[name="gps_heading_id"]').val();
            $.ajax({
                type: "get",
                url: "../gpsSubHeading/subEditHeading/" + subHadingID,
                dataType: "json",
                success: function(data) {
                    $('[name="gps_heading_id"]').val(gps_heading_id);
                    $('[name="gps_sub_heading_id"]').val(subHadingID);
                    $('[name="gps_place_en"]').val(data.gps_place_en);
                    $('[name="gps_place_ar"]').val(data.gps_place_ar);
                    $('[name="latitude"]').val(data.latitude);
                    $('[name="longitude"]').val(data.longitude);
                    $('#exampleModal2').modal('show');
                }
            });
        }

        function deletesubbtn(e) {
            let subHadingID = e.getAttribute('data-id');
            swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this Item!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
                                    .attr('content')
                            }
                        });
                        $.ajax({
                            url: "../gpsSubHeading/deletesubHeading/" + subHadingID,
                            type: "POST",
                            success: function(data) {
                                swal("Done!",
                                    "It was succesfully deleted!",
                                    "success");
                                location.reload();
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                swal("Error deleting!",
                                    "Please try again", "error");
                            }
                        });
                    }
                });
        }
    </script>
@endpush
