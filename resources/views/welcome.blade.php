<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ADHMN </title>
    <link rel="icon" type="image/x-icon" href="{{asset('landingPage')}}/img/fav.svg">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{asset('landingPage')}}/css/style.css">
</head>

<body>
<!-- header -->
<header>
    <div class="container">
        <img class="logo" src="{{asset('landingPage')}}/img/Logo.svg" alt="">
        <div class="dropdown">
            <img class="icon me-2" src="{{asset('landingPage')}}/img/language.svg" alt="">
            اللغة
            <div class="dropdown-content">
                <a href="#!" class="dropdownItem">
                    <img src="{{asset('landingPage')}}/img/flag.svg" alt="">
                    عربي
                </a>
                <a href="#!" class="dropdownItem">
                    <img src="{{asset('landingPage')}}/img/en_flag.svg" alt="">
                    English
                </a>
            </div>
        </div>
    </div>
</header>
<content class="container">
    <!-- main section -->
    <section class="mainSection">
        <h1> اطب الآن خدمات الصيانة لمنزلك التي تريدها سريعا وبكل سهولة </h1>
        <a href="#download" class="btn"> حمل التطبيق الآن </a>
    </section>
    <!-- aboutUs -->
    <section class="aboutUs">
        <div class="title">
            <h1> من نحن </h1>
            <h6>
                اضمن مجموعة أدوات صٌممت لكي تكون كل عمليات الصيانة المنزلية على بٌعد تطبيق في جوالك . اضمن فكر جديد
                وفنيين محترفين وخدمة عملاء يسعدهم تلقي استفساراتكم او طلباتكم . أضمن تتطلع دوما لتقديم خدمات الصيانة
                باحترافية وبشكل عصري .
            </h6>
        </div>
        <div class="aboutImage">
            <img src="{{asset('landingPage')}}/img/about.webp">
        </div>
    </section>
    <!-- services -->
    <section class="services">
        <!--  section Top -->
        <div class="sectionTop">
            <div class="title">
                <h1> خدماتنا </h1>
                <p>
                    في أضمن نقدم مجموعة خدمات متكاملة تلبي كل احتياجات عملائنا . نحرص في أضمن على الاستمرار بتقديم
                    المزيد من
                    الخدمات كل ما اُتيحت لنا الفرصة .
                </p>
            </div>
            <!-- siper conrtol -->
            <div class="swiperBtns">
                <div class="servicesSliderPrev swiper-button-prev"></div>
                <div class="servicesSliderNext swiper-button-next"></div>
            </div>
        </div>
        <!-- slider -->
        <div class="swiper servicesSlider">
            <div class="swiper-wrapper">
                <!-- slide -->
                <div class="swiper-slide">
                    <div class="service">
                        <img src="{{asset('landingPage')}}/img/1.svg" alt="">
                        <h4> الكهرباء </h4>
                    </div>
                </div>
                <!-- slide -->
                <div class="swiper-slide">
                    <div class="service">
                        <img src="{{asset('landingPage')}}/img/2.svg" alt="">
                        <h4> السباكة </h4>
                    </div>
                </div>
                <!-- slide -->
                <div class="swiper-slide">
                    <div class="service">
                        <img src="{{asset('landingPage')}}/img/3.svg" alt="">
                        <h4> تنظيف </h4>
                    </div>
                </div>
                <!-- slide -->
                <div class="swiper-slide">
                    <div class="service">
                        <img src="{{asset('landingPage')}}/img/4.svg" alt="">
                        <h4> التكييف </h4>
                    </div>
                </div>
                <!-- slide -->
                <div class="swiper-slide">
                    <div class="service">
                        <img src="{{asset('landingPage')}}/img/5.svg" alt="">
                        <h4> الاجهزة المنزلية </h4>
                    </div>
                </div>
                <!-- slide -->
                <div class="swiper-slide">
                    <div class="service">
                        <img src="{{asset('landingPage')}}/img/6.svg" alt="">
                        <h4> تنسيق الحدائق </h4>
                    </div>
                </div>
                <!-- slide -->
                <div class="swiper-slide">
                    <div class="service">
                        <img src="{{asset('landingPage')}}/img/7.svg" alt="">
                        <h4> تبريد </h4>
                    </div>
                </div>
                <!-- slide -->
                <div class="swiper-slide">
                    <div class="service">
                        <img src="{{asset('landingPage')}}/img/8.svg" alt="">
                        <h4> فك وتركيب </h4>
                    </div>
                </div>
                <!-- slide -->
                <div class="swiper-slide">
                    <div class="service">
                        <img src="{{asset('landingPage')}}/img/9.svg" alt="">
                        <h4> بلاط وارضيات </h4>
                    </div>
                </div>
                <!-- slide -->
                <div class="swiper-slide">
                    <div class="service">
                        <img src="{{asset('landingPage')}}/img/10.svg" alt="">
                        <h4> دهانات </h4>
                    </div>
                </div>
                <!-- slide -->
                <div class="swiper-slide">
                    <div class="service">
                        <img src="{{asset('landingPage')}}/img/11.svg" alt="">
                        <h4> جبس واسقف </h4>
                    </div>
                </div>
                <!-- slide -->
                <div class="swiper-slide">
                    <div class="service">
                        <img src="{{asset('landingPage')}}/img/12.svg" alt="">
                        <h4> مكافحة حشرات </h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- appImgs -->
    <section class="appImgs">
        <div class="sectionTitle">
            <h1> صور التطبيق </h1>
            <!-- siper conrtol -->
            <div class="swiperBtns">
                <div class="appSliderPrev swiper-button-prev"></div>
                <div class="appSliderNext swiper-button-next"></div>
            </div>
        </div>
        <!-- Swiper -->
        <div class="swiper phoneImgs">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="{{asset('landingPage')}}/img/1.webp" />
                </div>
                <div class="swiper-slide">
                    <img src="{{asset('landingPage')}}/img/2.webp" />
                </div>
                <div class="swiper-slide">
                    <img src="{{asset('landingPage')}}/img/3.webp" />
                </div>
                <div class="swiper-slide">
                    <img src="{{asset('landingPage')}}/img/4.webp" />
                </div>
                <div class="swiper-slide">
                    <img src="{{asset('landingPage')}}/img/5.webp" />
                </div>
                <div class="swiper-slide">
                    <img src="{{asset('landingPage')}}/img/6.webp" />
                </div>
                <div class="swiper-slide">
                    <img src="{{asset('landingPage')}}/img/7.webp" />
                </div>
                <div class="swiper-slide">
                    <img src="{{asset('landingPage')}}/img/8.webp" />
                </div>
                <div class="swiper-slide">
                    <img src="{{asset('landingPage')}}/img/9.webp" />
                </div>
                <div class="swiper-slide">
                    <img src="{{asset('landingPage')}}/img/10.webp" />
                </div>
                <div class="swiper-slide">
                    <img src="{{asset('landingPage')}}/img/11.webp" />
                </div>
                <div class="swiper-slide">
                    <img src="{{asset('landingPage')}}/img/12.webp" />
                </div>
                <div class="swiper-slide">
                    <img src="{{asset('landingPage')}}/img/13.webp" />
                </div>
            </div>
            <img src="{{asset('landingPage')}}/img/2.png" class="frame" alt="">
        </div>
    </section>

    <!-- download -->
    <section class="download" id="download">
        <div class="data">
            <h1> تطبيق الجوال </h1>
            <p> حمل التطبيق على جوالك واطلب بضغطة زر </p>
            <div class="links">
                <a href="#!">
                    <img src="{{asset('landingPage')}}/img/app-store.avif" alt="">
                </a>
                <a href="#!">
                    <img src="{{asset('landingPage')}}/img/google-play.avif" alt="">
                </a>
            </div>
        </div>
        <img class="mobileImg" src="{{asset('landingPage')}}/img/info.webp" alt="">
    </section>
    <!-- company -->
    <section class="aboutUs company">
        <div class="aboutImage">
            <img src="{{asset('landingPage')}}/img/company.webp">
        </div>
        <div class="title">
            <h1> أضمن للشركات </h1>
            <h6>
                نسعد في أضمن في تقديم خدماتنا للشركات وتقديم خدمات الصيانة بجميع انواعها بعقود سنوية او شهرية .لدينا
                خبرة في هذه الاعمال تولدت من عقودنا السابقة مع عملائنا الذين نفخر بالعمل معهم سوياً
            </h6>
        </div>

    </section>
    <!-- packages -->
    <section class="packages">
        <div class="packagesIcon">
            <img class="icon" src="{{asset('landingPage')}}/img/package.svg" alt="">
        </div>
        <div class="data">
            <h1> اشترك في الباقات و استمتع بخصومات اكبر ... </h1>
            <form action="">
                <div class="package">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="package" id="package1">
                        <label class="form-check-label" for="package1">
                            <img src="{{asset('landingPage')}}/img/bronze.svg" alt="">
                            <div class="info">
                                <h2> باقة 1 شهر </h2>
                                <p> احصب علي الخدمات بسعر رمزي بالاضافة الي خصومات وعروض مشتمرة لمدة شهر</p>
                            </div>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="package" id="package2">
                        <label class="form-check-label" for="package2">
                            <img src="{{asset('landingPage')}}/img/silver.svg" alt="">
                            <div class="info">
                                <h2> باقة 6 شهور </h2>
                                <p> احصب علي الخدمات بسعر رمزي بالاضافة الي خصومات وعروض مشتمرة لمدة 6 شهور</p>
                            </div>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="package" id="package3">
                        <label class="form-check-label" for="package3">
                            <img src="{{asset('landingPage')}}/img/gold.svg" alt="">
                            <div class="info">
                                <h2> باقة 1 سنة </h2>
                                <p> احصب علي الخدمات بسعر رمزي بالاضافة الي خصومات وعروض مشتمرة لمدة سنة</p>
                            </div>
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn"> اشترك </button>
            </form>
        </div>
    </section>
    <!-- references -->
    <section class="references">
        <!-- Section Title -->
        <div class="title ">
            <h1> عملائنا - مصدر فخرنا </h1>
            <p> نفخر في أضمن بعملاء مميزين تشرفت اضمن بتقديم خدماتها لهم على مدار العام اسماء تجارية مميزه في انشطة
                مختلفة كان لنا شرف التعامل معها وتقديم خدماتنا لهم </p>
        </div>

        <div class="swiper referencesSlider ">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="referenceLogo ">
                        <img src="{{asset('landingPage')}}/img/r1.webp" alt="">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="referenceLogo ">
                        <img src="{{asset('landingPage')}}/img/r2.webp" alt="">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="referenceLogo ">
                        <img src="{{asset('landingPage')}}/img/r3.webp" alt="">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="referenceLogo ">
                        <img src="{{asset('landingPage')}}/img/r4.webp" alt="">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="referenceLogo ">
                        <img src="{{asset('landingPage')}}/img/r5.webp" alt="">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="referenceLogo ">
                        <img src="{{asset('landingPage')}}/img/r6.webp" alt="">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="referenceLogo ">
                        <img src="{{asset('landingPage')}}/img/r7.webp" alt="">
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- contact us -->
    <section class="contactUs">
        <!-- contactInfo -->
        <div class="contactInfo">
            <!-- Section Title -->
            <div class="title">
                <h1> تواصل معنا </h1>
                <p> كن علي اتصال دائم بنا ... </p>
            </div>
            <!-- info -->
            <div class="info">
                <h6> العنوان </h6>
                <p> طريق الملك عبدالعزيز الفرعي، الصفاء - الخرج 16259 </p>
            </div>
            <!-- info -->
            <div class="info">
                <h6> البريد الالكتروني </h6>
                <a href="mailto:cs@adhmn.com">cs@adhmn.com</a>
            </div>
            <!-- info -->
            <div class="info">
                <h6> رقم الجوال </h6>
                <a href="tel:920007213"> 920007213 </a>
            </div>
        </div>
        <!-- form -->
        <form action="">
            <div class="inputGroup">
                <div class="inputField">
                    <label class="form-label"> الاسم كامل </label>
                    <input type="text" class="inputForm">
                </div>
                <div class="inputField">
                    <label class="form-label"> البريد الالكتروني </label>
                    <input type="email" class="inputForm">
                </div>
            </div>
            <div class="inputField">
                <label class="form-label"> اكتب رسالتك </label>
                <textarea class="inputForm" rows="8"></textarea>
            </div>
            <button type="submit" class="btn"> ارسال </button>
        </form>
    </section>
    <iframe class="googleMap"
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14558.730035181723!2d47.282808!3d24.182865!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xfbff0f6fdb71b92a!2z2KPYttmF2YYg2YTZhNi12YrYp9mG2Kk!5e0!3m2!1sen!2seg!4v1669242687537!5m2!1sen!2seg">
    </iframe>


</content>
<!-- footer -->
<footer>
    <div class="container">
        <div class="data">
            كل الحقوق محفوظة
            <a class="company" href="#!" target="_blank"> ADHMN </a>
            &copy;
            <script>
                document.write(new Date().getFullYear())
            </script>
        </div>

        <div class="imgLinks">
            <a href="https://about.adhmn.com/storage/KSYhutrMPHAFjQaOpGHuOsEtm4d48GDFbbT9VqOP.pdf" target="_blank">
                <img src="{{asset('landingPage')}}/img/vat.svg" alt="">
            </a>
            <a href="https://maroof.sa/154707" target="_blank">
                <img src="{{asset('landingPage')}}/img/maroof.png" alt="">
            </a>
        </div>

        <ul class="social">
            <li>
                <a href="#!" target="_blank">
                    <img class="icon" src="{{asset('landingPage')}}/img/face.svg" alt="">
                </a>
            </li>
            <li>
                <a href="#!" target="_blank">
                    <img class="icon" src="{{asset('landingPage')}}/img/insta.svg" alt="">
                </a>
            </li>
            <li>
                <a href="#!" target="_blank">
                    <img class="icon" src="{{asset('landingPage')}}/img/twitter.svg" alt="">
                </a>
            </li>
            <li>
                <a href="#!" target="_blank">
                    <img class="icon" src="{{asset('landingPage')}}/img/whatsapp.svg" alt="">
                </a>
            </li>
        </ul>
    </div>
</footer>
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<!-- Initialize Swiper -->
<script>
    //Categories Slider
    var referencesSlider = new Swiper(".referencesSlider", {
        centeredSlides: true,
        loop: true,
        slidesPerView: "auto",
        spaceBetween: 5,
        speed: 1000,
        autoplay: {
            delay: 1500,
            disableOnInteraction: false,
        },
    });

    var phoneImgs = new Swiper(".phoneImgs", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        spaceBetween: 60,
        speed: 1000,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        loop: true,
        slidesPerView: "auto",
        coverflowEffect: {
            rotate: 5,
            stretch: 10,
            depth: 200,
            modifier: 1.2,
            slideShadows: true,
        },
        navigation: {
            nextEl: ".appSliderNext",
            prevEl: ".appSliderPrev",
        },
    });
    // services slider
    var servicesSlider = new Swiper(".servicesSlider", {
        navigation: {
            nextEl: ".servicesSliderNext",
            prevEl: ".servicesSliderPrev",
        },
        pagination: {
            el: ".servicesSlidePagination",
            type: "fraction",
        },
        loop: true,
        spaceBetween: 12,
        speed: 1000,
        autoplay: {
            delay: 2000,
            disableOnInteraction: false,
        },
        // slidesPerView: "auto",
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            340: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 3,
            },
            991: {
                slidesPerView: 4,
            },
        },
    });
    $(".servicesSlider").hover(
        function () {
            this.swiper.autoplay.stop();
        },
        function () {
            this.swiper.autoplay.start();
        }
    );


</script>
</body>

</html>
