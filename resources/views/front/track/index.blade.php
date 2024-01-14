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
           @if ($data->parent !=0)
          <li><a href="{{ (route ('home')) }}">{{$data->parents->title}}</a></li>
          @endif
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

        @foreach ($data->Lessons as $key => $lesson)
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="card">
            <div class="card-img">
              <img src="{{ $lesson->ytimg }}" alt="" class="img-fluid">
            </div>
            <h3><a href="{{ $lesson->link }}" class="stretched-link" target="_blanc">{{ $lesson->title }}</a></h3>
          </div>
        </div><!-- End Card Item -->
      @endforeach

      </div>

    </div>
  </section><!-- End Services Section -->



</main><!-- End #main -->


@endsection