@extends('front.layouts.master',['banner' =>'no'])

@section('main')
<main id="main">
 
  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    <div class="page-header d-flex align-items-center" style="background-color: var(--color-secondary);">
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-9 text-center">
            <h2> نتيجة بحث  {{ $search }}</h2>
          </div>
        </div>
      </div>
    </div>
    <nav>
      <div class="container">
        <ol>
          <li><a href="{{ (route ('home')) }}">{{ __('front.Home') }}</a></li>
          <li>{{ $search }}</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->



  <!-- ======= Services Section ======= -->
  <section id="service" class="services pt-0">
    <div class="container" data-aos="fade-up">

      <div class="section-header"> </div>

      

{{--        
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($key+'1')*'200' }}">
          <div class="card">
            <div class="card-img">
              <img src="{{ $data->getFirstMediaUrl('article') }}" alt="" class="img-fluid">
            </div>
            <h3><a href="{{ route('ArticleDetalies',$data->slug) }}" class="stretched-link">{{ $data->title }}</a></h3>
          </div>
        </div><!-- End Card Item --> --}}
   
      
    @if ($type==1)
    <div class="row gy-4">
    @foreach ($results as $key => $data)
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
    @endif
    @if ($type==2)
    <div class="row gy-4 mt-2">
    @foreach ($results as $key => $data)
    <div class="col-lg-6 col-md-6 mb-15">
      <div class="card p-1">
        <a class="w-fit fw-bold c-main d-block fs-15 mb-15" href="{{ route('ArticleDetalies',$data->slug) }}">
          {{ $data->title }}</a>
        <div>28 أكتوبر 2023</div>
        <div class="fw-bold mt-15"><a href="https://elzero.org/category/assignments/javascript-bootcamp-assignments/" rel="category tag">JavaScript Bootcamp</a></div>
    </div>
  </div>
    @endforeach
  </div>
  @endif

     

    </div>
  </section><!-- End Services Section -->



</main><!-- End #main -->

  @endsection