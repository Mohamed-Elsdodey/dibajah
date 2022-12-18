<!--begin::Form-->

<form id="form" enctype="multipart/form-data" method="POST" action="{{route('areas.store')}}">
    @csrf
    <div class="row g-4">



        <div class="d-flex flex-column mb-7 fv-row col-sm-4">
            <!--begin::Label-->
            <label for="name_ar" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                <span class="required mr-1">الاسم باللغة العربية</span>
            </label>
            <!--end::Label-->
            <input id="name_ar" required type="text" class="form-control form-control-solid"  name="name_ar" value=""/>
        </div>

        <div class="d-flex flex-column mb-7 fv-row col-sm-4">
            <!--begin::Label-->
            <label for="name_en" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                <span class="required mr-1">الاسم باللغة الانجليزية</span>
            </label>
            <!--end::Label-->
            <input id="name_en" required type="text" class="form-control form-control-solid"  name="name_en" value=""/>
        </div>

        <div class="d-flex flex-column mb-7 fv-row col-sm-4">
            <!--begin::Label-->
            <label for="iso_code" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                <span class="required mr-1">  كود المنطقة</span>
            </label>
            <!--end::Label-->
            <input id="iso_code" required type="text" class="form-control form-control-solid"  name="iso_code" value=""/>
        </div>


        <div class="d-flex flex-column mb-7 fv-row col-sm-12">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                <span class="required mr-1">  الدولة</span>
            </label>
            <!--end::Label-->
            <select required id="serviceChange" class=" form-control   " name="country_id"
                    aria-label=".form-select-sm example">
                <option selected disabled>اختر الدولة</option>
                @foreach($countries as $country)
                    <option value="{{$country->id}}">{{$country->name_ar}}</option>
                @endforeach

            </select>
        </div>



    </div>
</form>

