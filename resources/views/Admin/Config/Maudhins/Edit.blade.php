@extends('Admin.Layout.App')
@section('title', 'Sub Mosque')
@push('CSS')
@endpush
@section('Content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Muadhins Edit
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#"> Muadhins</a></li>
                <li class="active">Edit</li>
            </ol>
        </section>
        @if ($errors->any())
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                </div>
            </div>
        @endif
        <section class="content animated bounceInUp">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-xs-12">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <div class="box-title">
                                <h3>Muadhins Edit</h3>
                            </div>
                        </div>
                        <div class="box-body">
                            <form action="{{ route('admin.maudhins.update', ['id' => $maudhins->maudhins_id]) }}"
                                id="muadhins_form" class="form-horizontal" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Muadhins Name
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" id="maudhins_en" name="maudhins_en" class="form-control"
                                                value="{{ $maudhins->maudhins_en }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Muadhins Arbic Name
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" id="maudhins_ar" name="maudhins_ar" class="form-control"
                                                value="{{ $maudhins->maudhins_ar }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Select Mosque
                                            <span class="required" aria-required="true"> </span>
                                        </label>
                                        <div class="col-md-6">
                                            <select class="select2 form-control" name="category_id" id="category_id">
                                                <option value="">Select-Mosque</option>
                                                @foreach ($cate as $c)
                                                    <option value="{{ $c->category_id }}"
                                                        {{ $c->category_id == $maudhins->category_id ? 'selected' : '' }}>
                                                        {{ $c->category_en }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Select Sub Mosque
                                            <span class="required" aria-required="true"> </span>
                                        </label>
                                        <div class="col-md-6 sub_mosque">
                                            <select class="select2 form-control" name="sub_category_id" id="sub_category_id"
                                                readonly="">
                                                <option value="">Select-sub-Mosque</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn  btn-success">Edit Muadhins</button>
                                            <a href="#" class="btn btn-default">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection
@push('JS')
    <script src="{{ asset(JS) }}/subcatedropdown.js"></script>
    @if (isset($maudhins->category_id))
        <script>
            jQuery.ajax({
                url: "../imaam/getsubcategories/" + {{ $maudhins->category_id }},
                type: "GET",
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    jQuery('select[name="sub_category_id"]').empty();
                    jQuery.each(data, function(key, value) {
                        $('select[name="sub_category_id"]').append(
                            '<option value="' + key + '">' + value +
                            '</option>');
                    });
                    jQuery('select[name="sub_category_id"]').val({{ $maudhins->sub_category_id }});

                }
            });
        </script>
    @endif
@endpush
