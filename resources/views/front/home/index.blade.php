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
            <h3>تواصل معنا</h3>
            <p> من فضلك لا تتردد أبدا في الاتصال بنا. سواء للسؤال او الاستفسار او اي استفسار يدور في ذهنهم.</p>
            <a class="cta-btn" href="{{ route('ContactUs') }}">تواصل معنا</a>
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
          <span>فيديوهات مختارة</span>
          <h2>فيديوهات مختارة</h2>

        </div>

        <div class="row gy-4">

          @foreach ($LessonHome as $key => $data)
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($key+'1')*'200' }}">
              <div class="card">
                <div class="card-img">
                  <img src="{{ $data->ytimg }}" alt="" class="img-fluid">
                </div>
                <h3><a href="{{ $data->link }}" class="stretched-link" target="_blanc">{{ $data->title }}</a></h3>
              </div>
            </div><!-- End Card Item -->
          @endforeach

        </div>

      </div>
    </section><!-- End Services Section -->



    <!-- ======= Frequently Asked Questions Section ======= -->
      <section id="faq" class="services pt-0">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <span>أكثر الشروحات مشاهدة</span>
          <h2>أكثر الشروحات مشاهدة</h2>

        </div>

        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="200">
          <div class="row col-lg-12">

            @foreach ($ArticleHome as $key => $data)
   
            <div class="col-lg-6 col-md-6">
              <h4 data-aos="zoom-in" data-aos-once="true">
                <a href="{{ route('ArticleDetalies',$data->slug) }}">
                  {{ $data->title }}
              </a>
              </h4>
              <span class="title-underline-hr mt-1 mb-4"></span>
            </div>

            @endforeach

          </div>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

  </main><!-- End #main -->

  @endsection