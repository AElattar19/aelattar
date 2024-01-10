<footer id="footer" class="footer">

    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-info">
          <a href="{{ (route ('home')) }}" class="logo d-flex align-items-center">
            <span>{{ $setting->title }}</span>
          </a>
          <div class="social-links d-flex mt-4">
            <a href="https://www.github.com/{{ $setting->github }}" class="twitter" target="_blank"><i class="bi bi-github"></i></a>
            <a href="https://www.facebook.com/{{ $setting->facebook }}" class="facebook" target="_blank" ><i class="bi bi-facebook"></i></a>
            <a href="https://www.youtube.com/{{ $setting->youtube }}" class="instagram" target="_blank"><i class="bi bi-youtube"></i></a>
            <a href="https://www.linkedin.com/{{ $setting->linkedin }}" class="linkedin" target="_blank"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Terms of service</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Web Design</a></li>
            <li><a href="#">Web Development</a></li>
            <li><a href="#">Product Management</a></li>
            <li><a href="#">Marketing</a></li>
            <li><a href="#">Graphic Design</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Contact Us</h4>
          <p>
            A108 Adam Street <br>
            New York, NY 535022<br>
            United States <br><br>
            <strong>Phone:</strong> +1 5589 55488 55<br>
            <strong>Email:</strong> info@example.com<br>
          </p>

        </div>

      </div>
    </div>

    <div class="container mt-4">
      <div class="copyright">
        &copy; جميع الحقوق <strong><span>2024 A.Elattar </span></strong>
      </div>

    </div>

  </footer>
  <!-- End Footer -->