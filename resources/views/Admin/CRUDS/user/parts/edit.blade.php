<!--begin::Form-->

<form id="form" enctype="multipart/form-data" method="POST" action="{{route('users.update',$user->id)}}">
    @csrf
    @method('PUT')
    <div class="row g-4">
        <div class="form-group">
            <label for="name" class="form-control-label">الصورة</label>
            <input type="file" class="dropify" name="image" data-default-file="{{get_file($user->image)}}" accept="image/*"/>
            <span class="form-text text-muted text-center">مسموح فقط بالصيغ التالية : jpeg , jpg , png , gif , svg , webp , avif</span>
        </div>

        <div class="d-flex flex-column mb-7 fv-row col-sm-6">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                <span class="required mr-1">الاسم الاول</span>
            </label>
            <!--end::Label-->
            <input required type="text" class="form-control form-control-solid"  name="first_name" value="{{$user->first_name}}"/>
        </div>

        <div class="d-flex flex-column mb-7 fv-row col-sm-6">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                <span class="required mr-1">الاسم الاخير</span>
            </label>
            <!--end::Label-->
            <input required type="text" class="form-control form-control-solid"  name="last_name" value="{{$user->last_name}}"/>
        </div>

        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-7 fv-row col-sm-6">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                <span class="required mr-1">البريد الالكتروني</span>
            </label>
            <!--end::Label-->
            <input required type="email" class="form-control form-control-solid" placeholder=" البريد الالكتروني" name="email" value="{{$user->email}}"/>
        </div>

        <div class="d-flex flex-column mb-7 fv-row col-sm-6">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                <span class="required mr-1"> الهاتف</span>
            </label>
            <!--end::Label-->
            <input required type="number" class="form-control form-control-solid"  name="phone" value="{{$user->phone}}"/>
        </div>



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
