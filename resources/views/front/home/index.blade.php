@extends('front.layouts.master',['banner' =>'yeas'])

@section('main')
<main id="main">


    <!-- ======= Featured Services Section ======= -->



    <!-- ======= Services Section ======= -->
    <section id="service" class="services pt-0">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <span>{{ __('front.Tracks') }}</span>
          <h2>{{ __('front.Tracks') }}</h2>

        </div>

        <div class="row gy-4">
          @foreach ($HomeTracks as $key => $data)
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($key+'1')*'200' }}">
              <div class="card">
                <div class="card-img">
                  <img src="{{ $data->getFirstMediaUrl('track') }}" alt="" class="img-fluid">
                </div>
                <h3><a href="{{ route('TracksHome',$data->slug) }}" class="stretched-link">{{ $data->title }}</a></h3>
              </div>
            </div><!-- End Card Item -->
          @endforeach

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Call To Action Section ======= -->
    <section id="call-to-action" class="call-to-action">
      <div class="container" data-aos="zoom-out">

        <div class="row justify-content-center">
          <div class="col-lg-8 text-center">
            <h3>Call To Action</h3>
            <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <a class="cta-btn" href="#">Call To Action</a>
          </div>
        </div>

      </div>
    </section><!-- End Call To Action Section -->
    <section id="service" class="services pt-0">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <span>{{ __('front.Category') }}</span>
          <h2>{{ __('front.Category') }}</h2>

        </div>

        <div class="row gy-4">

          @foreach ($HomeCategory as $key => $data)
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($key+'1')*'200' }}">
              <div class="card">
                <div class="card-img">
                  <img src="{{ $data->getFirstMediaUrl('category') }}" alt="" class="img-fluid">
                </div>
                <h3><a href="{{ route('CategoryHome',$data->slug) }}" class="stretched-link">{{ $data->title }}</a></h3>
              </div>
            </div><!-- End Card Item -->
          @endforeach

        </div>

      </div>
    </section><!-- End Services Section -->


    <section id="service" class="services pt-0">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <span>{{ __('front.Category') }}</span>
          <h2>{{ __('front.Category') }}</h2>

        </div>

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



    <!-- ======= Frequently Asked Questions Section ======= -->
      <section id="faq" class="services pt-0">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <span>Frequently Asked Questions</span>
          <h2>Frequently Asked Questions</h2>

        </div>

        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="200">
          <div class="col-lg-10">

            <div class="accordion accordion-flush" id="faqlist">

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                    <i class="bi bi-question-circle question-icon"></i>
                    Non consectetur a erat nam at lectus urna duis?
                  </button>
                </h3>
                <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                  </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                    <i class="bi bi-question-circle question-icon"></i>
                    Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque?
                  </button>
                </h3>
                <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                  </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                    <i class="bi bi-question-circle question-icon"></i>
                    Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi?
                  </button>
                </h3>
                <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                  </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-4">
                    <i class="bi bi-question-circle question-icon"></i>
                    Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?
                  </button>
                </h3>
                <div id="faq-content-4" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    <i class="bi bi-question-circle question-icon"></i>
                    Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                  </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-5">
                    <i class="bi bi-question-circle question-icon"></i>
                    Tempus quam pellentesque nec nam aliquam sem et tortor consequat?
                  </button>
                </h3>
                <div id="faq-content-5" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
                  </div>
                </div>
              </div><!-- # Faq item-->

            </div>

          </div>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

  </main><!-- End #main -->

  @endsection