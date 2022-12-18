<form action="{{route('admins.update',$admin->id)}}" method="post" id="EditForm">
    @csrf
    @method("PUT")

    <div class="row g-4">
        <div class="form-group">
            <label for="name" class="form-control-label">الصورة</label>
            <input type="file" class="dropify" name="image" data-default-file="{{get_file($admin->image)}}" accept="image/*"/>
            <span class="form-text text-muted text-center">مسموح فقط بالصيغ التالية : jpeg , jpg , png , gif , svg , webp , avif</span>
        </div>
        <div class="d-flex flex-column mb-7 fv-row col-sm-6">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                <span class="required mr-1">الاسم</span>
            </label>
            <!--end::Label-->
            <input type="text" required class="form-control form-control-solid" placeholder="اسم المسؤل"  name="name" value="{{$admin->name}}"/>
        </div>

        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-7 fv-row col-sm-6">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                <span class="required mr-1">البريد الالكتروني</span>
            </label>
            <!--end::Label-->
            <input type="email" required class="form-control form-control-solid"  placeholder=" البريد الالكتروني" name="email" value="{{$admin->email}}"/>
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
{{--                        <option @foreach(\App\Models\AdminRole::where('admin_id',$admin->id)->get() as $row) @if($role->id==$row->role_id) selected @endif @endforeach value="{{$role->id}}">{{$role->name}}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--            </div>--}}
{{--        @endif--}}



        <div class="d-flex flex-column mb-7 fv-row col-sm-6">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                <span class="required mr-1"> كلمة المرور</span>
            </label>
            <!--end::Label-->
            <input type="password" class="form-control form-control-solid" placeholder=" كلمة المرور " name="password" value=""/>
        </div>





    </div>
</form>
<script>
    $('.dropify').dropify();

</script>
