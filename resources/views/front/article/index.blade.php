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
          <li>{{ __('front.Category') }}</li>
          <li><a href="{{ (route ('CategoryHome',$data->Category->slug) ) }}">{{$data->Category->title}}</a></li>
          <li>{{$data->title}}</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->



  <!-- ======= Services Section ======= -->
  <section id="pricing" class="pricing">
    <div class="container" data-aos="fade-up">

      <div class="row gy-4">

        <div class="col-lg-3 pricing-item featured ml-1">
          <div class="section-header">
            <h2>ذات صلة</h2>
          </div>
            @foreach ($ArticleHome as $key => $Article)

              {{-- <div class="col-lg-12 col-md-6">
                <h4 data-aos="zoom-in" data-aos-once="true">
                  <a href="{{ route('ArticleDetalies',$Article->slug) }}">
                    {{ $Article->title }}
                </a>
                </h4>
                <span class="title-underline-hr mt-1 mb-4"></span>
              </div> --}}

              <div class="col-lg-12 col-md-6 mb-15">
                <div class="card p-1">
                  <a class="w-fit fw-bold c-main d-block fs-15 mb-15" href="{{ route('ArticleDetalies',$Article->slug) }}">
                    {{ $Article->title }}</a>
              </div>
            </div>

            @endforeach
        </div>

        <div class="col-lg-8 pricing-item featured Article">
          <nav>{{ $data->created_at }}</nav>
          <p> {!! nl2br($data->des) !!}</p>
        </div>

      </div>

    </div>
  </section><!-- End Service Details Section -->



</main><!-- End #main -->

  @endsection