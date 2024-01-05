  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="{{ (route ('home')) }}" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="{{asset("front/assets/img/logo.png") }}" alt="">
        {{-- <img src="{{ $setting->logo->getUrl() }}" alt=""> --}}
        <h1>{{ $setting->title }}</h1>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="{{ (route ('home')) }}" class="active">{{ __('front.Home') }}</a></li>


          <li class="dropdown"><a href="#"><span>{{ __('front.Tracks') }}</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              @foreach ($MenuTracks as $data)

                <li @if ($data->Courses->isNotEmpty()) class="dropdown" @endif>
                  <a href="{{ route('TracksHome',$data->slug) }}">
                    <span>{{$data->title}}</span>  
                    @if ($data->Courses->isNotEmpty()) <i class="bi bi-chevron-down dropdown-indicator"></i> @endif
                  </a>
                  @if ($data->Courses->isNotEmpty())
                    <ul>
                      @foreach ($data->Courses as $CourseData)
                        <li><a href="{{ route('TracksHome', $CourseData->slug) }}">{{ $CourseData->title }}</a></li>
                      @endforeach
                    </ul>
                  @endif
                </li>
              @endforeach

            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>{{ __('front.Category') }}</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              @foreach ($MenuCategory as $data)
                <li><a href="{{ route('CategoryHome',$data->slug) }}">{{$data->title}}</a></li>
              @endforeach
            </ul>
          </li>
          <li><a href="{{ route('ContactUs') }}">{{ __('front.Contact') }}</a></li>
          <li><a class="get-a-quote" href="{{ route('ContactUs') }}">{{ __('front.Ask') }}</a></li>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <!-- End Header -->