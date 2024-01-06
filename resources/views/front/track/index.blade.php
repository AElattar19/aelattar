@extends('front.layouts.master',['banner' =>'no'])

@section('main')
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    <div class="page-header d-flex align-items-center" style="background-color: var(--color-secondary);">
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-9 text-center">
            <h2>{{$data->title}}</h2>
          </div>
        </div>
      </div>
    </div>
    <nav>
      <div class="container">
        <ol>
          <li><a href="{{ (route ('home')) }}">{{ __('front.Home') }}</a></li>
          <li>{{ __('front.Tracks') }}</li>
          <li>{{$data->title}}</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->



  <!-- ======= Services Section ======= -->
  <section id="service" class="services pt-0">
    <div class="container" data-aos="fade-up">

      <div class="section-header"> </div>

      <div class="row gy-4">

        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="card">
            <div class="card-img">
              <img src="{{asset("front/assets/img/storage-service.jpg") }}" alt="" class="img-fluid">
            </div>
            <h3><a href="service-details.html" class="stretched-link">أهم النصائح لتحسين أداء موقعك عند إستدعاء المكتبات</a></h3>
          </div>
        </div><!-- End Card Item -->

        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="card">
            <div class="card-img">
              <img src="{{asset("front/assets/img/logistics-service.jpg") }}" alt="" class="img-fluid">
            </div>
            <h3><a href="service-details.html" class="stretched-link">أهم النصائح لتحسين أداء موقعك عند إستدعاء المكتبات</a></h3>
          </div>
        </div><!-- End Card Item -->

        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="card">
            <div class="card-img">
              <img src="{{asset("front/assets/img/cargo-service.jpg") }}" alt="" class="img-fluid">
            </div>
            <h3><a href="service-details.html" class="stretched-link">أهم النصائح لتحسين أداء موقعك عند إستدعاء المكتبات</a></h3>
          </div>
        </div><!-- End Card Item -->

        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
          <div class="card">
            <div class="card-img">
              <img src="{{asset("front/assets/img/trucking-service.jpg") }}" alt="" class="img-fluid">
            </div>
            <h3><a href="service-details.html" class="stretched-link">أهم النصائح لتحسين أداء موقعك عند إستدعاء المكتبات</a></h3>
          </div>
        </div><!-- End Card Item -->

        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
          <div class="card">
            <div class="card-img">
              <img src="{{asset("front/assets/img/packaging-service.jpg") }}" alt="" class="img-fluid">
            </div>
            <h3><a href="service-details.html" class="stretched-link">أهم النصائح لتحسين أداء موقعك عند إستدعاء المكتبات</a></h3>
          </div>
        </div><!-- End Card Item -->

        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="600">
          <div class="card">
            <div class="card-img">
              <img src="{{asset("front/assets/img/warehousing-service.jpg") }}" alt="" class="img-fluid">
            </div>
            <h3><a href="service-details.html" class="stretched-link">أهم النصائح لتحسين أداء موقعك عند إستدعاء المكتبات</a></h3>
          </div>
        </div><!-- End Card Item -->

        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="700">
          <div class="card">
            <div class="card-img">
              <img src="{{asset("front/assets/img/warehousing-service.jpg") }}" alt="" class="img-fluid">
            </div>
            <h3><a href="service-details.html" class="stretched-link">أهم النصائح لتحسين أداء موقعك عند إستدعاء المكتبات</a></h3>
          </div>
        </div><!-- End Card Item -->

        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="800">
          <div class="card">
            <div class="card-img">
              <img src="{{asset("front/assets/img/warehousing-service.jpg") }}" alt="" class="img-fluid">
            </div>
            <h3><a href="service-details.html" class="stretched-link">أهم النصائح لتحسين أداء موقعك عند إستدعاء المكتبات</a></h3>
          </div>
        </div><!-- End Card Item -->

      </div>

    </div>
  </section><!-- End Services Section -->



</main><!-- End #main -->

  @endsection