@extends('Admin.layouts.inc.app')
@section('title')
    الإعدادات
@endsection
@section('css')
    <script src="https://cdn.ckeditor.com/4.19.0/full/ckeditor.js"></script>

    <!-- include summernote css/js -->
    <link href="summernote-bs5.css" rel="stylesheet">
    {{--    <link href="{{asset('dashboard/summernote/summernote-bs4.css')}}">--}}
    <style>
        .dropify-font-upload:before,
        .dropify-wrapper .dropify-message span.file-icon:before {
            content: "\f382";
            font-weight: 100;
            color: #000;
            font-size: 26px;
        }

        .dropify-wrapper .dropify-message p {
            text-align: center;
            font-size: 15px;
        }

    </style>

@endsection

@section('page-title')
    الإعدادات العامة
@endsection


@section('content')

    <div class="card">
        <div class="card-header ">
            <h5 class="card-title mb-0 flex-grow-1">الاعدادات</h5>


            <form id="form" enctype="multipart/form-data" method="POST" action="{{route('settings.store')}}">
                @csrf
                <div class="row my-4 g-4">

                    <div class="d-flex flex-column mb-7 fv-row col-sm-12">
                        <!--begin::Label-->
                        <label for="app_name" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required mr-1">  اسم التطبيق</span>
                        </label>
                        <!--end::Label-->
                        <input id="app_name" required type="text" class="form-control form-control-solid" name="app_name"
                               value="{{$settings->app_name}}"/>
                    </div>


                    <div class="col-md-12">

                        <div class="form-group">
                            <label for="name" class="form-control-label fs-6 fw-bold "> اللوجو </label>
                            <input type="file" class="dropify" name="header_logo"
                                   data-default-file="{{get_file($settings->header_logo)}}"
                                   accept="image/*"/>
                            <span class="form-text text-muted text-center">مسموح فقط بالصيغ التالية : jpeg , jpg , png , gif , svg , webp , avif</span>
                        </div>
                    </div>

                    <div class="col-md-12">

                        <div class="form-group">
                            <label for="name" class="form-control-label fs-6 fw-bold "> اللوجو الثاني </label>
                            <input type="file" class="dropify" name="footer_logo"
                                   data-default-file="{{get_file($settings->footer_logo)}}"
                                   accept="image/*"/>
                            <span class="form-text text-muted text-center">مسموح فقط بالصيغ التالية : jpeg , jpg , png , gif , svg , webp , avif</span>
                        </div>
                    </div>

                    <div class="col-md-12">

                        <div class="form-group">
                            <label for="name" class="form-control-label fs-6 fw-bold "> اللوجو ف العنوان</label>
                            <input type="file" class="dropify" name="favicon_logo"
                                   data-default-file="{{get_file($settings->favicon_logo)}}"
                                   accept="image/*"/>
                            <span class="form-text text-muted text-center">مسموح فقط بالصيغ التالية : jpeg , jpg , png , gif , svg , webp , avif</span>
                        </div>
                    </div>



                        <div class="my-4">
                            <button type="submit" class="btn btn-success"> تعديل</button>
                        </div>


                </div>
            </form>

        </div>
    </div>


@endsection

@section('js')
    <script>
        $('.dropify').dropify();

    </script>


    <script>
        $(document).on('submit', "form#form", function (e) {
            e.preventDefault();

            var formData = new FormData(this);

            var url = $('#form').attr('action');
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,

                complete: function () {
                },
                success: function (data) {

                    window.setTimeout(function () {

// $('#product-model').modal('hide')
                        if (data.code == 200) {
                            toastr.success(data.message)
                        } else {
                            toastr.error(data.message)
                        }
                    }, 1000);


                },
                error: function (data) {
                    if (data.status === 500) {
                        toastr.error('there is an error')
                    }

                    if (data.status === 422) {
                        var errors = $.parseJSON(data.responseText);

                        $.each(errors, function (key, value) {
                            if ($.isPlainObject(value)) {
                                $.each(value, function (key, value) {
                                    toastr.error(value)
                                });

                            } else {

                            }
                        });
                    }
                    if (data.status == 421) {
                        toastr.error(data.message)
                    }

                },//end error method

                cache: false,
                contentType: false,
                processData: false
            });
        });
    </script>

@endsection
