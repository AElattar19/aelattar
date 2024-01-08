<!DOCTYPE html>
<html lang="ar">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ $setting->title }}</title>
  <meta content="{{ $setting->md }}" name="description">
  <meta content="{{ $setting->mk }}" name="keywords">

  <!-- Favicons -->
  <link href="{{ $setting->getFirstMediaUrl('favicon') }}" rel="icon">
  <link href="{{asset("front/assets/img/apple-touch-icon.png") }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset("front/assets/vendor/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet">
  <link href="{{asset("front/assets/vendor/bootstrap-icons/bootstrap-icons.css") }}" rel="stylesheet">
  <link href="{{asset("front/assets/vendor/fontawesome-free/css/all.min.css") }}" rel="stylesheet">
  <link href="{{asset("front/assets/vendor/glightbox/css/glightbox.min.css") }}" rel="stylesheet">
  <link href="{{asset("front/assets/vendor/swiper/swiper-bundle.min.css") }}" rel="stylesheet">
  <link href="{{asset("front/assets/vendor/aos/aos.css") }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset("front/assets/css/main.css") }}" rel="stylesheet">

 
</head>

<body>
 
  @include('partials/_errors')

  <!-- ======= Header ======= -->
  @include('front.layouts.include.header')
  <!-- End Header -->
  @if($banner != 'no')
  <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">
      <div class="container">
        <div class="row gy-4 d-flex justify-content-between">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <h2 data-aos="fade-up">معا لتعلم البرمجة من الصفر حتى الاحتراف</h2>
            <p data-aos="fade-up" data-aos-delay="100">
              نسعى لتقديم مسارات شاملة لتطوير الويب وتعلم البرمجة باللغة العربية، وذلك من خلال تقديم شرحات تفصيلية تفاعلية وخطط دراسة مدعومة بالاختبارات والتحديات البرمجية، مما يساعد الجميع على فهم الكود وتطبيقه بسهولة.
            </p>

            <form action="#" class="form-search d-flex align-items-stretch mb-3" data-aos="fade-up" data-aos-delay="200">
              <input type="text" class="form-control" placeholder="{{ __('front.Contact_Holder') }}">
              <button type="submit" class="btn btn-primary">{{ __('front.Search') }}</button>
            </form>

            <div class="row gy-4" data-aos="fade-up" data-aos-delay="400">

              <div class="col-lg-3 col-6">
                <div class="stats-item text-center w-100 h-100">
                  <span data-purecounter-start="0" data-purecounter-end="{{ $TracksNum }}" data-purecounter-duration="1" class="purecounter"></span>
                  <p>{{ __('front.Tracks') }}</p>
                </div>
              </div><!-- End Stats Item -->

              <div class="col-lg-3 col-6">
                <div class="stats-item text-center w-100 h-100">
                  <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1" class="purecounter"></span>
                  <p>{{ __('front.Videos_Num') }}</p>
                </div>
              </div><!-- End Stats Item -->

              <div class="col-lg-3 col-6">
                <div class="stats-item text-center w-100 h-100">
                  <span data-purecounter-start="0" data-purecounter-end="{{ $CategoriesNum }}" data-purecounter-duration="1" class="purecounter"></span>
                  <p>{{ __('front.Catogery_num') }}</p>
                </div>
              </div><!-- End Stats Item -->

              <div class="col-lg-3 col-6">
                <div class="stats-item text-center w-100 h-100">
                  <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1" class="purecounter"></span>
                  <p>{{ __('front.Aticles_Num') }}</p>
                </div>
              </div><!-- End Stats Item -->

            </div>
          </div>

          <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
            <img src="{{asset("front/assets/img/development.webp") }}" class="img-fluid mb-3 mb-lg-0" alt="">
          </div>

        </div>
      </div>
    </section><!-- End Hero Section -->
  @endif

  @yield('main')

  <!-- ======= Footer ======= -->
  @include('front.layouts.include.footer')

  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{asset("front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
  <script src="{{asset("front/assets/vendor/purecounter/purecounter_vanilla.js") }}"></script>
  <script src="{{asset("front/assets/vendor/glightbox/js/glightbox.min.js") }}"></script>
  <script src="{{asset("front/assets/vendor/swiper/swiper-bundle.min.js") }}"></script>
  <script src="{{asset("front/assets/vendor/aos/aos.js") }}"></script>
  {{-- <script src="{{asset("front/assets/vendor/php-email-form/validate.js") }}"></script> --}}

  <!-- Template Main JS File -->
  <script src="{{asset("front/assets/js/main.js") }}"></script>

</body>

</html>