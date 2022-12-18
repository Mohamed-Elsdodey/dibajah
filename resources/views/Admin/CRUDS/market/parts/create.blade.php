<!--begin::Form-->

<form id="form" enctype="multipart/form-data" method="POST" action="{{route('markets.store')}}">
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
            <input required type="text" class="form-control form-control-solid"  name="name" value=""/>
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
                <span class="required mr-1"> الهاتف</span>
            </label>
            <!--end::Label-->
            <input required type="number" class="form-control form-control-solid"  name="phone" value=""/>
        </div>



        <div class="d-flex flex-column mb-7 fv-row col-sm-6">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                <span class="required mr-1"> كلمة المرور</span>
            </label>
            <!--end::Label-->
            <input type="password" class="form-control form-control-solid" placeholder=" كلمة المرور " name="password" value=""/>
        </div>



<h3>الاقسام</h3>
        <div class="row my-4">
            @foreach($categories as $category)

                <span class="form-check col-md-4  ">
                  <input class="form-check-input " type="checkbox" name="categories[]"  value="{{$category->id}}" id="flexCheckDefault{{$category->id}}">
                  <label class="form-check-label mx-1" for="flexCheckDefault{{$category->id}}">
                   {{$category->title_ar}}
                  </label>
                </span>
            @endforeach
        </div>





    </div>
</form>
<script>
    $('.dropify').dropify();

</script>
