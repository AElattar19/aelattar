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
  <section id="service-details" class="service-details">
    <div class="container" data-aos="fade-up">

      <div class="row gy-4">

        <div class="col-lg-3">
          <div class="services-list">
            <a href="#" class="active">Storage</a>
            <a href="#">Logistics</a>
            <a href="#">Cargo</a>
            <a href="#">Trucking</a>
            <a href="#">Packaging</a>
            <a href="#">Warehousing</a>
          </div>

          <h4>Enim qui eos rerum in delectus</h4>
          <p>Nam voluptatem quasi numquam quas fugiat ex temporibus quo est. Quia aut quam quod facere ut non occaecati ut aut. Nesciunt mollitia illum tempore corrupti sed eum reiciendis. Maxime modi rerum.</p>
        </div>

        <div class="col-lg-9">
          <p> {!! nl2br($data->des) !!}</p>
        </div>

      </div>

    </div>
  </section><!-- End Service Details Section -->



</main><!-- End #main -->

  @endsection