<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width=device-width, intial-scale=1.0">
  <title>{{ optional($setting)->title ?? 'Our College' }}</title>
  <link rel="stylesheet" href="{{ URL::to('frontend/css/style.css') }}">
  <link rel="stylesheet" href="{{ URL::to('frontend/css/custom.css') }}">
  <link rel="shortcut icon"
    href="{{ optional($setting)->favicon ? asset('uploads/settings/' . $setting->favicon) : URL::to('frontend/images/favicon.png') }}">
</head>
<body>
  <section class="main" style="background-image: url({{ URL::to('frontend/images/hero-bg.png') }});">
    <nav>
      <a href="#" class="logo">
        <img
          src="{{ optional($setting)->logo ? asset('uploads/settings/' . $setting->logo) : URL::to('assets/img/logo.png') }}"
          width="320px" />
      </a>
      <input class="menu-btn" type="checkbox" id="menu-btn" />
      <label class="menu-icon" for="menu-btn">
        <span class="nav-icon"></span>
      </label>
      <ul class="menu" style="border-radius: 5px;">
        <li><a href="#">About</a></li>
        <li><a href="#notice">Notice Board</a></li>
        <li><a href="#courses">Courses</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a class="active" href="{{ route('login') }}"
            style="width:auto; border-radius: 5px; cursor: pointer;">Login</a></li>
      </ul>
    </nav>
    <div class="home-content">
      <div class="home-text">
        <h3 style="color: white; letter-spacing: 3px;">Welcome to {{ optional($setting)->title ?? 'Our College' }}</h3>
        <h1 style="color: white;"> Student Portal</h1>
        <p style="color: white;">The purpose of Schools is to prepare students with promise
          to enhance their intellectual, physical, social, emotional, spiritual,
          and artistic growth so that they may realize their power for good
          as citizens</p>
        <a href="#contact" class="main-login" style="border-radius: 5px;">Apply Now</a>
      </div>
      <div class="home-img" style="width: 500px;">
        <img src="{{ URL::to('frontend/images/hero.png') }}" width="500px" style="text-shadow: 20px 22px;" />
        <marquee width="100%" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
          <a href="#" style="color: white;">Addmission open of 13th August 2021, Stream BCA, BBA, Bio-Tech and Computer
            Science.</a>
        </marquee>
        <marquee width="100%" direction="right" onmouseover="this.stop();" onmouseout="this.start();">
          <a href="#" style="color: white;">Addmission open of 13th August 2021, Stream BCA, BBA, Bio-Tech and Computer
            Science.</a>
        </marquee>
      </div>
    </div>
    <div class="arrow"></div>
    <span class="scroll">Scroll</span>
  </section>
  <section class="services" id="courses">
    <!--heading----------->
    <div class="services-heading">
      <h2>OUR PROFESSIONAL COURSES</h2>
      <p>Lorem ipsum dolor sit amet, consectetur ad asese do eiusmod tempor incididunt utarla oreetdolo magna aliqua</p>
    </div>
    <!--box-container----------------->
    <div class="box-container">
      <!--box-1-------->
      <div class="box">
        <img src="{{ URL::to('frontend/images/icon5.png') }}">
        <font>Batchlor of Computer Application</font>
        <p>Lorem ipsum dolor sit amet, consectetur ad asese do eiusmod tempor incididunt utarla oreetdolo magna aliqua
        </p>
        <!--btn--------->
        <a href="#">Apply Now</a>
      </div>
      <!--box-2-------->
      <div class="box">
        <img src="{{ URL::to('frontend/images/icon5.png') }}">
        <font>Batchlor of Business Administration</font>
        <p>Lorem ipsum dolor sit amet, consectetur ad asese do eiusmod tempor incididunt utarla oreetdolo magna aliqua.
        </p>
        <!--btn--------->
        <a href="#">Apply Now</a>
      </div>
      <!--box-3-------->
      <div class="box">
        <img src="{{ URL::to('frontend/images/icon5.png') }}">
        <font>Bio-Technology</font>
        <p>Lorem ipsum dolor sit amet, consectetur ad asese do eiusmod tempor incididunt utarla oreetdolo magna aliqua
        </p>
        <!--btn--------->
        <a href="#">Apply Now</a>
      </div>
      <!--box-4-------->
      <div class="box">
        <img src="{{ URL::to('frontend/images/icon5.png') }}">
        <font>Computer Science</font>
        <p>Lorem ipsum dolor sit amet, consectetur ad asese do eiusmod tempor incididunt utarla oreetdolo magna aliqua.
        </p>
        <!--btn--------->
        <a href="#">Apply Now</a>
      </div>
      <!--box-1-------->

    </div>
  </section>
  <section class="notice-section" id="notice">
    <div class="notice-wrapper">
        <h2 class="notice-title">Latest Notices</h2>

        <div class="notice-ticker">
            <ul>
                @foreach ($notices as $notice)
                    <li>
                        <a href="{{ asset('uploads/notices/' . $notice->file) }}" download>
                            📄 {{ $notice->title }}
                        </a>
                        <span class="notice-date">{{ $notice->created_at->format('d M, Y') }}</span>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="notice-list">
            @foreach ($notices as $notice)
                <div class="notice-card">
                    <div>
                        <h4>{{ $notice->title }}</h4>
                        <span>{{ $notice->created_at->format('d M, Y') }}</span>
                    </div>
                    <a href="{{ asset('uploads/notices/' . $notice->file) }}" download class="notice-download-btn">
                        Download PDF
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
  <section class="cta-section" id="contact">
    <div class="cta-container">

      <!-- Left Image -->
      <div class="cta-image">
        <img src="{{ URL::to('assets/img/login.jpg') }}" alt="University Playground">
      </div>

      <!-- Right Form -->
      <div class="cta-form">
        <h2>Get in Touch</h2>
        <p>Have questions about courses, admission, or campus life? We are here to help.</p>

        <form action="#" method="POST" class="cta-form-wrapper">
          @csrf
          <div class="form-group">
            <input type="text" name="name" placeholder="Your Name" required />
          </div>

          <div class="form-group">
            <input type="text" name="phone" placeholder="Phone Number" required />
          </div>

          <div class="form-group">
            <input type="email" name="email" placeholder="Email Address" required />
          </div>

          <div class="form-group">
            <textarea name="message" placeholder="Your Message" rows="4" required></textarea>
          </div>

          <button type="submit" class="cta-submit-btn">Send Message</button>
        </form>
      </div>
    </div>
  </section>
  <footer>
    <p style="color: white;">Copyright &#169; - 2025 {{ optional($setting)->title ?? 'Our College' }}</a> </p>
  </footer>
</body>
</html>