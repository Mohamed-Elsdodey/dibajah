<!--begin::Form-->

<form id="form" enctype="multipart/form-data" method="POST" action="{{route('admins.store')}}">
    @csrf
    <div class="row g-4">

        <div class="form-group">
            <label for="name" class="form-control-label">الصورة</label>
            <input type="file" class="dropify" name="image" data-default-file="" accept="image/*"/>
            <span class="form-text text-muted text-center">مسموح فقط بالصيغ التالية : jpeg , jpg , png , gif , svg , webp , avif</span>
        </div>

        <div class="d-flex flex-column mb-7 fv-row col-sm-6">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                <span class="required mr-1">الاسم</span>
            </label>
            <!--end::Label-->
            <input required type="text" class="form-control form-control-solid" placeholder="اسم المسؤل" name="name" value=""/>
        </div>

        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-7 fv-row col-sm-6">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                <span class="required mr-1">البريد الالكتروني</span>
            </label>
            <!--end::Label-->
            <input required type="email" class="form-control form-control-solid" placeholder=" البريد الالكتروني" name="email" value=""/>
        </div>



        <div class="d-flex flex-column mb-7 fv-row col-sm-6">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                <span class="required mr-1"> كلمة المرور</span>
            </label>
            <!--end::Label-->
            <input type="password" class="form-control form-control-solid" placeholder=" كلمة المرور " name="password" value=""/>
        </div>

{{--        @if(checkPermission(38))--}}

{{--            <div class="d-flex flex-column mb-7 fv-row col-sm-6">--}}
{{--                <!--begin::Label-->--}}
{{--                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">--}}
{{--                    <span class="required mr-1">اختر الدور </span>--}}
{{--                </label>--}}
{{--                <!--end::Label-->--}}
{{--                <select class=" form-control " name="role_id" aria-label=".form-select-sm example">--}}
{{--                    <option selected disabled></option>--}}
{{--                    @foreach(\App\Models\Role::get() as $role)--}}
{{--                        <option value="{{$role->id}}">{{$role->name}}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--            </div>--}}
{{--        @endif--}}



        <div class="d-flex align-items-center justify-content-between flex-wrap col-md-6 my-4 ">
            <div class="form-check">
                <input class="form-check-input filterCoupon" data-type="owner" type="radio" name="is_active" id="exampleRadios1" value="1" >
                <label class="form-check-label" for="exampleRadios1">
                    مفعل
                </label>
            </div>


            <div class="form-check">
                <input class="form-check-input filterCoupon" type="radio" data-type="owner" name="is_active" id="exampleRadios1" value="0" >
                <label class="form-check-label" for="exampleRadios1">
                    غير مفعل
                </label>
            </div>


        </div>





    </div>
</form>
<script>
    $('.dropify').dropify();

</script>
