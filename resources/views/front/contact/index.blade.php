@extends('front.layouts.master',['banner' =>'no'])

@section('main')
<main id="main">
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    <div class="page-header d-flex align-items-center" style="background-color: var(--color-secondary);">
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 text-center">
            <h2>تواصل معنا</h2>
          </div>
        </div>
      </div>
    </div>
    <nav>
      <div class="container">
        <ol>
          <li><a href="{{ (route ('home')) }}">{{ __('front.Home') }}</a></li>
          <li>تواصل معنا</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->

  @include('partials/_session')

  <!-- ======= Services Section ======= -->
  <section id="get-a-quote" class="get-a-quote">
    <div class="container" data-aos="fade-up">

      <div class="row g-0">
        <div class="col-lg-5 quote-bg" style="background-image: url({{asset("front/assets/img/cta-bg.jpg") }});"></div>

        <div class="col-lg-7">
          <form action="{{ route('ContactUsStore' )}}" method="post" class="php-email-form">
            @csrf
            <div class="row gy-4">

              <div class="col-lg-12">
                <h4>من فضلك لا تتردد أبدا في الاتصال بنا. سواء للسؤال او الاستفسار او اي استفسار يدور في ذهنهم.</h4>
              </div>

              <div class="col-md-6">
                <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="الأسم" required>
              </div>

              <div class="col-md-6 ">
                <input type="email" class="form-control" value="{{old('name')}}" name="email" placeholder="البريد الالكتروني" required>
              </div>
              
              <div class="col-md-6 ">
                <input type="text" class="form-control" value="{{old('country')}}" name="country" placeholder="الدولة" required>
              </div>

              <div class="col-md-6">
                <input type="text" class="form-control" value="{{old('phone')}}" name="phone" placeholder="الجوال" required>
              </div>

              <div class="col-md-12">
                <textarea class="form-control" value="{{old('description')}}" name="description" rows="6" placeholder="من فضلك اكتب رسالتك...." required></textarea>
              </div>

              <div class="col-md-12 text-center">
                <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
                              <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                      </div>  
                  </div>
              </div>

                <button type="submit">إرسال</button>
              

            </div>
          </form>
        </div><!-- End Quote Form -->

      </div>

    </div>
  </section><!-- End Get a Quote Section -->


</main><!-- End #main -->

  @endsection