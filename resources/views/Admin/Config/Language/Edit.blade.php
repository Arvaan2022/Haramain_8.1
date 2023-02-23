@extends('Admin.Layout.App')
@section('title', 'Sub Mosque')
@push('CSS')
@endpush
@section('Content')
    <div class="content-wrapper" style="min-height: 836px;">
        <section class="content-header">
            <h1>
                Language Edit
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Language</a></li>
                <li class="active">Language Edit</li>
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
                                <h3>Language Edit</h3>
                            </div>
                        </div>
                        <div class="box-body">
                            <form action="{{ route('admin.language.update', ['id' => $langs->language_id]) }}"
                                id="category_form" class="form-horizontal" method="post" enctype="multipart/form-data"
                                novalidate="novalidate">
                                @csrf
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Language Name (English)
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" id="language_en" name="language_en"
                                                value="{{ $langs->language_en }}" data-required="1" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Language Name (Arabic)
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" id="language_ar" name="language_ar"
                                                value="{{ $langs->language_ar }}" data-required="1" class="form-control">
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
                                                        {{ $c->category_id == $langs->category_id ? 'selected' : '' }}>
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
                                            <select class="form-control select2" name="sub_category_id"
                                                id="sub_category_id">
                                            </select>
                                        </div>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label class="control-label col-md-3">Status</label>
                                        <div class="radio-list col-md-6">
                                            <label class="radio-inline">
                                                <input type="radio" name="status" checked value="1"> Active </label>
                                            <label class="radio-inline">
                                                <input type="radio" id="status" name="status" value="0"> Deactive
                                            </label>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn  btn-success">Edit Language</button>
                                            <a href="{{ route('admin.language.list') }}" class="btn btn-default">Cancel</a>
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
    @if (isset($langs->category_id))
        <script>
            jQuery.ajax({
                url: "../imaam/getsubcategories/" + {{ $langs->category_id }},
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
                    jQuery('select[name="sub_category_id"]').val({{ $langs->sub_category_id }});
                }
            });
        </script>
    @endif
@endpush
