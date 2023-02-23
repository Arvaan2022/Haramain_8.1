@extends('Admin.Layout.app')

@section('title')
    {{ trans('admin.prayer_manage') }}
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
                <section class="content-header">
                    <h1>
                        {{ trans('admin.prayer_manage') }}
                        <small>{{ trans('admin.control_panel') }}</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i>{{ trans('admin.home') }}</a>
                        </li>
                        <li class="active">{{ trans('admin.prayer_manage') }}</li>
                    </ol>
                </section>

                <!--Code Start-->
                <div class="col-lg-12 col-xs-12">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <div class="box-title">
                                <h3>Prayer Edit</h3>
                            </div>
                        </div>
                        <div class="box-body">
                            <form action="#" id="prayer_times" onsubmit="return false" class=" prayer_times"
                                method="post" enctype="multipart/form-data" novalidate="novalidate">

                                <div class="form-group col-md-3 col-sm-3">
                                    <label for="name">{{ trans('admin.select_mosque') }}</label>
                                    <div>
                                        <select name="category_id" id="category_id" class="form-control">
                                            <option value="">{{ trans('admin.select_mosque') }}</option>
                                            @foreach ($category as $c)
                                                <option value="{{ $c->category_id }}">{{ $c->category_en }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-3 col-sm-3">
                                    <label for="name">{{ trans('admin.select_year') }}</label>
                                    <div>
                                        <select name="year" id="year" class="form-control">
                                            <option value="">{{ trans('admin.select_year') }}</option>
                                            <option value="2017">2017</option>
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                            <option value="2027">2027</option>
                                            <option value="2028">2028</option>
                                            <option value="2029">2029</option>
                                            <option value="2030">2030</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- 
                                @php
                                $earliest_year = 2017;
                            @endphp
                            <option value="">--- Please Select Year---</option>
                            @foreach (range(date('Y'), $earliest_year) as $x)
                                <option value="{{ $x }}">{{ $x }}</option>
                            @endforeach --}}

                                <div class="form-group col-md-3 col-sm-3">
                                    <label for="name">{{ trans('admin.select_month') }}</label>
                                    <div>
                                        <select name="month" id="month" class="form-control">
                                            <option value="">{{ trans('admin.select_month') }}</option>
                                            <option value="Jan">Jan</option>
                                            <option value="Feb">Feb</option>
                                            <option value="Mar">Mar</option>
                                            <option value="Apr">Apr</option>
                                            <option value="May">May</option>
                                            <option value="Jun">Jun</option>
                                            <option value="Jul">Jul</option>
                                            <option value="Aug">Aug</option>
                                            <option value="Sep">Sep</option>
                                            <option value="Oct">Oct</option>
                                            <option value="Nov">Nov</option>
                                            <option value="Dec">Dec</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-3 col-sm-3 " style="margin-top:2.5rem ">
                                    <a href="{{ route('admin.prayer.dashboard') }}"
                                        class="btn btn-default">{{ trans('admin.cancel') }}</a>
                                </div>
                                {{-- <div class="form-group col-sm-offset-4 col-sm-4"> --}}
                                {{-- <button class="btn btn-success">{{ trans('admin.search') }}</button> --}}
                                {{-- <a href="{{ route('admin.prayer.dashboard') }}"
                                        class="btn btn-default">{{ trans('admin.cancel') }}</a> --}}
                                {{-- </div> --}}
                                <div class="form-group col-lg-12 col-md-12 prayer_time list-prayer">

                                </div>
                            </form>
                            <div class="card" id="datatable" style="display:none">
                                <div class="card-body">
                                    <!-- Datatable Heading code -->
                                    <table id="prayer-datatable" style="width:100%"
                                        class="table table-striped  dt-responsive nowrap dataTable no-footer dtr-inline collapsed">
                                        <thead>
                                            <tr>
                                                <th>Day</th>
                                                <th>Fajr</th>
                                                <th>Sunrise</th>
                                                <th>Duhar</th>
                                                <th>Asr</th>
                                                <th>Maghrib</th>
                                                <th>Isha</th>
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
                    </div>
                </div>
                <!--Code End-->

            </div><!-- end col-->
        </div>
    </div>


    {{-- modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                    <h3 class="modal-title cutom-title">Preyer Times</h3>
                </div>
                <div class="modal-body form">
                    <form class="form-horizontal" role="form" id="formEdit" method="POST"
                        action="{{ route('admin.prayerTime.add') }}">
                        @csrf
                        <input type="hidden" name="prayer_id">
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="textinput"></label>
                            <label class="col-sm-3 control-label" for="textinput"></label>
                            <label class="col-sm-3 control-label" for="textinput"></label>
                            <label class="col-sm-3 control-label" for="textinput"></label>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="textinput"></label>
                            <div class="col-sm-4">
                                <label class="col-sm-2 control-label" for="textinput">START</label>
                            </div>
                            <div class="col-sm-4">
                                <label class="col-sm-2 control-label" for="textinput">JAMA'AH</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="textinput">Fajr</label>
                            <div class="col-sm-4">
                                <input type="text" name="fajr" class="form-control">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="fajr_jamma">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="textinput">Sunrise</label>
                            <div class="col-sm-4">
                                <input type="text" name="sunrise" class="form-control">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="sunrise_jamma" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="textinput">Duhar</label>
                            <div class="col-sm-4">
                                <input type="text" name="dhuhar" value="" class="form-control">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="dhuhar_jamma" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="textinput">Asr</label>
                            <div class="col-sm-4">
                                <input type="text" name="asr" class="form-control">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="asr_jamma" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="textinput">Maghrib</label>
                            <div class="col-sm-4">
                                <input type="text" name="maghrib" class="form-control">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="maghrib_jamma" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="textinput">Isha</label>
                            <div class="col-sm-4">
                                <input type="text" name="isha" class="form-control">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="isha_jamma" class="form-control">
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
        $(document).ready(function() {
            var Table = $('#prayer-datatable').DataTable({
                processing: true,
                serverSide: true,
                "searching": true,
                ajax: {
                    url: '{{ route('admin.prayer.list.datatable') }}',
                    data: function(data) {
                        data.searchCat = $('#category_id').val();
                        data.searchMonth = $('#month').val();
                        data.searchYear = $('#year').val();
                    }
                },
                columns: [{
                        data: 'day'
                    },
                    {
                        data: 'fajr'
                    },
                    {
                        data: 'sunrise'
                    },
                    {
                        data: 'dhuhar'
                    },
                    {
                        data: 'asr'
                    },
                    {
                        data: 'maghrib'
                    },
                    {
                        data: 'isha'
                    },
                    {
                        data: 'action'
                    },
                ]
            });
            $('#category_id,#month,#year').change(function() {
                document.getElementById('datatable').style.display = 'block';
                Table.draw();
            });

            // $('#searchName').keyup(function() {
            //     empTable.draw();
            // });
        });

        function editbtn(e) {
            $('#formEdit')[0].reset();
            let prayerID = e.getAttribute('data-id');
            $.ajax({
                type: "get",
                url: "../prayer/prayerEdit/" + prayerID,
                dataType: "json",
                success: function(data) {
                    $('[name="prayer_id"]').val(prayerID);
                    $('[name="fajr"]').val(data.fajr);
                    $('[name="fajr_jamma"]').val(data.fajr_jamma);
                    $('[name="sunrise"]').val(data.sunrise);
                    $('[name="sunrise_jamma"]').val(data.sunrise_jamma);
                    $('[name="dhuhar"]').val(data.dhuhar);
                    $('[name="dhuhar_jamma"]').val(data.dhuhar_jamma);
                    $('[name="asr"]').val(data.asr);
                    $('[name="asr_jamma"]').val(data.asr_jamma);
                    $('[name="maghrib"]').val(data.maghrib);
                    $('[name="maghrib_jamma"]').val(data.maghrib_jamma);
                    $('[name="isha"]').val(data.isha);
                    $('[name="isha_jamma"]').val(data.isha_jamma);
                    $('#exampleModal').modal('show');
                }
            });
        }
    </script>
@endpush
