@extends('Admin.layouts.inc.app')
@section('title')
    الرئيسية
@endsection
@section('css')
@endsection
@section('content')

    <div class="row">
        <div class="col-lg-4 col-sm-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="avatar-sm flex-shrink-0">
                        <span
                            class="avatar-title bg-soft-primary text-primary rounded-2 fs-2">
                            <i data-feather="users" class="text-primary"></i>
                        </span>
                        </div>
                        <div class="flex-grow-1 overflow-hidden ms-3">

                                <p class="text-uppercase fw-medium text-muted text-truncate mb-3"> مجموع العملاء </p>
                                <div class="d-flex align-items-center mb-3">
                                    <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                                            data-target="{{\App\Models\User::count()}}">0</span>
                                    </h4>
                                </div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div>
        </div><!-- end col -->
        <div class="col-lg-4 col-sm-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="avatar-sm flex-shrink-0">
                            <span
                                class="avatar-title bg-soft-warning text-warning rounded-2 fs-2">
                                <i class="bx bx-user-pin text-warning"></i>
                            </span>
                        </div>
                        <div class="flex-grow-1 ms-3">

                                <p class="text-uppercase fw-medium text-muted mb-3"> مجموع التجار </p>
                                <div class="d-flex align-items-center mb-3">
                                    <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                                            data-target="{{\App\Models\Market::count()}}">0</span>
                                    </h4>
                                </div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div>
        </div><!-- end col -->


        <div class="col-lg-4 col-sm-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="avatar-sm flex-shrink-0">
                        <span
                            class="avatar-title bg-soft-success text-success rounded-2 fs-2">
                            <i class=" ri-file-list-3-line text-success"></i>
                        </span>
                        </div>
                        <div class="flex-grow-1 overflow-hidden ms-3">

                                <p class="text-uppercase fw-medium text-muted text-truncate mb-3">  مجموع المشرفين</p>
                                <div class="d-flex align-items-center mb-3">
                                    <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                                            data-target="{{\App\Models\Admin::count()}}">0</span>
                                    </h4>
                                </div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div>
        </div><!-- end col -->
        <div class="col-lg-4 col-sm-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="avatar-sm flex-shrink-0">
                            <span
                                class="avatar-title bg-soft-secondary text-secondary rounded-2 fs-2">
                                <i class=" ri-file-list-line text-secondary"></i>
                            </span>
                        </div>
                        <div class="flex-grow-1 ms-3">

                                <p class="text-uppercase fw-medium text-muted mb-3">  مجموع الاقسام </p>
                                <div class="d-flex align-items-center mb-3">
                                    <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                                            data-target="{{\App\Models\Category::count()}}">0</span>
                                    </h4>
                                </div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div>
        </div><!-- end col -->
        <div class="col-lg-4 col-sm-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-soft-dark text-dark rounded-2 fs-2">
                                                        <i class=" las la-clipboard-list text-dark"></i>
                                                    </span>
                        </div>
                        <div class="flex-grow-1 overflow-hidden ms-3">
                            <p class="text-uppercase fw-medium text-muted text-truncate mb-3"> مجموع  الدول
                                 </p>
                            <div class="d-flex align-items-center mb-3">
                                <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                                        data-target="{{\App\Models\Country::count()}}">0</span>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div>
        </div><!-- end col -->
        <div class="col-lg-4 col-sm-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-soft-warning text-warning rounded-2 fs-2">
                                <i class=" ri-shopping-cart-line text-warning"></i>
                            </span>
                        </div>
                        <div class="flex-grow-1 overflow-hidden ms-3">
                            <p class="text-uppercase fw-medium text-muted text-truncate mb-3"> مجموع المناطق </p>
                            <div class="d-flex align-items-center mb-3">
                                <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                                        data-target="{{\App\Models\Area::count()}}">0</span></h4>
                            </div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div>
        </div><!-- end col -->

        <div class="col-lg-4 col-sm-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-soft-warning text-warning rounded-2 fs-2">
                                <i class=" ri-shopping-cart-line text-warning"></i>
                            </span>
                        </div>
                        <div class="flex-grow-1 overflow-hidden ms-3">
                            <p class="text-uppercase fw-medium text-muted text-truncate mb-3"> مجموع المدن </p>
                            <div class="d-flex align-items-center mb-3">
                                <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                                        data-target="{{\App\Models\City::count()}}">0</span></h4>
                            </div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div>
        </div><!-- end col -->

        <div class="col-lg-4 col-sm-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-soft-warning text-warning rounded-2 fs-2">
                                <i class=" ri-shopping-cart-line text-warning"></i>
                            </span>
                        </div>
                        <div class="flex-grow-1 overflow-hidden ms-3">
                            <p class="text-uppercase fw-medium text-muted text-truncate mb-3"> مجموع طلبات التواصل </p>
                            <div class="d-flex align-items-center mb-3">
                                <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                                        data-target="{{\App\Models\Contact::count()}}">0</span></h4>
                            </div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div>
        </div><!-- end col -->

        <div class="col-lg-4 col-sm-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-soft-warning text-warning rounded-2 fs-2">
                                <i class=" ri-shopping-cart-line text-warning"></i>
                            </span>
                        </div>
                        <div class="flex-grow-1 overflow-hidden ms-3">
                            <p class="text-uppercase fw-medium text-muted text-truncate mb-3"> مجموع  المنتجات </p>
                            <div class="d-flex align-items-center mb-3">
                                <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                                        data-target="{{\App\Models\Products::count()}}">0</span></h4>
                            </div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div>
        </div><!-- end col -->
    </div><!-- end row -->


{{--    <div class="card card-height-100">--}}
{{--        <div class="card-header align-items-center d-flex">--}}
{{--            <h4 class="card-title mb-0 flex-grow-1"> حالة الطلب </h4>--}}
{{--        </div><!-- end card header -->--}}
{{--        <div class="card-body">--}}
{{--            <div class="table-responsive table-card">--}}
{{--                <table class="table align-middle table-borderless table-centered table-nowrap mb-0">--}}
{{--                    <tbody>--}}
{{--                    <tr>--}}
{{--                        <td class="text-success"> جديد</td>--}}
{{--                        <td class="text-end fw-bold">100 </td>--}}
{{--                    </tr><!-- end -->--}}
{{--                    <tr>--}}
{{--                        <td class="text-warning"> مفتوح</td>--}}
{{--                        <td class="text-end fw-bold">100 </td>--}}
{{--                    </tr><!-- end -->--}}
{{--                    <tr>--}}
{{--                        <td class="text-danger"> ملغي</td>--}}
{{--                        <td class="text-end fw-bold">100 </td>--}}
{{--                    </tr><!-- end -->--}}
{{--                    <tr>--}}
{{--                        <td class="text-secondary"> مكتمل</td>--}}
{{--                        <td class="text-end fw-bold">100 </td>--}}
{{--                    </tr><!-- end -->--}}


{{--                    </tbody><!-- end tbody -->--}}
{{--                </table><!-- end table -->--}}
{{--            </div><!-- end -->--}}
{{--        </div><!-- end cardbody -->--}}
{{--    </div><!-- end card -->--}}

@endsection


@section('js')

@endsection
