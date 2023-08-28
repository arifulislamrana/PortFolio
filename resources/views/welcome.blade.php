<!DOCTYPE html>
<html lang="en">
  <head>
    <title>{{config('app.name')}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="/themes/front/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="/themes/front/css/animate.css">

    <link rel="stylesheet" href="/themes/front/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/themes/front/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/themes/front/css/magnific-popup.css">

    <link rel="stylesheet" href="/themes/front/css/aos.css">

    <link rel="stylesheet" href="/themes/front/css/ionicons.min.css">

    <link rel="stylesheet" href="/themes/front/css/flaticon.css">
    <link rel="stylesheet" href="/themes/front/css/icomoon.css">
    <link rel="stylesheet" href="/themes/front/css/style.css">
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">


    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light site-navbar-target" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="{{route('home')}}"> {{config('app.name')}}</a>
	      <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav nav ml-auto">
	          <li class="nav-item"><a href="#home-section" class="nav-link"><span>Home</span></a></li>
	          <li class="nav-item"><a href="#about-section" class="nav-link"><span>About</span></a></li>
	          <li class="nav-item"><a href="#resume-section" class="nav-link"><span>Resume</span></a></li>
	          <li class="nav-item"><a href="#services-section" class="nav-link"><span>Services</span></a></li>
	          <li class="nav-item"><a href="#skills-section" class="nav-link"><span>Skills</span></a></li>
	          <li class="nav-item"><a href="#projects-section" class="nav-link"><span>Projects</span></a></li>
	          <li class="nav-item"><a href="#blog-section" class="nav-link"><span>My Blog</span></a></li>
	          <li class="nav-item"><a href="#contact-section" class="nav-link"><span>Contact</span></a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
	  <section id="home-section" class="hero">
		  <div class="home-slider  owl-carousel">
	      @foreach ($homeSliders as $slider)
		  <div class="slider-item">
			<div class="overlay"></div>
			<div class="container">
				<div class="row d-flex no-gutters slider-text align-items-end justify-content-end" data-scrollax-parent="true">
					<div class="one-third js-fullheight order-md-last img" style="background-image:url({{str_replace('\\', '/', $slider->image)}});">
						<div class="overlay"></div>
					</div>
					<div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
						<div class="text">
							<span class="subheading">Hello!</span>
						<h1 class="mb-4 mt-3">{{ $slider->intro }}</h1>
						<h2 class="mb-4">{{ $slider->designation }}</h2>
						<p><a href="#" class="btn btn-primary py-3 px-4">Hire me</a> <a href="#" class="btn btn-white btn-outline-white py-3 px-4">My works</a></p>
					</div>
					</div>
				</div>
			</div>
		  </div>
		  @endforeach
	    </div>
    </section>

    <section class="ftco-about img ftco-section ftco-no-pb" id="about-section">
    	<div class="container">
    		<div class="row d-flex">
    			<div class="col-md-6 col-lg-5 d-flex">
    				<div class="img-about img d-flex align-items-stretch">
    					<div class="overlay"></div>
	    				<div class="img d-flex align-self-stretch align-items-center" style="background-image:url({{str_replace('\\', '/', $about->image)}});">
	    				</div>
    				</div>
    			</div>
    			<div class="col-md-6 col-lg-7 pl-lg-5 pb-5">
    				<div class="row justify-content-start pb-3">
		          <div class="col-md-12 heading-section ftco-animate">
		          	<h1 class="big">About</h1>
		            <h2 class="mb-4">About Me</h2>
		            <p>"Kindness is a language that the deaf can hear and the blind can see." - Mark Twain</p>
		            <ul class="about-info mt-4 px-md-0 px-2">
		            	<li class="d-flex"><span>Name:</span> <span>{{ $about->name }}</span></li>
		            	<li class="d-flex"><span>Date of birth:</span> <span>{{ $about->dob }}</span></li>
		            	<li class="d-flex"><span>Address:</span> <span>{{ $about->address }}</span></li>
		            	<li class="d-flex"><span>Zip code:</span> <span>{{ $about->zip }}</span></li>
		            	<li class="d-flex"><span>Email:</span> <span>{{ $about->email }}</span></li>
		            	<li class="d-flex"><span>Phone: </span> <span>{{ $about->phone }}</span></li>
		            </ul>
		          </div>
		        </div>
	          <div class="counter-wrap ftco-animate d-flex mt-md-3">
              <div class="text">
              	<p class="mb-4">
	                <span class="number" data-number="{{ count($projects) }}">0</span>
	                <span>Project complete</span>
                </p>
                <p><a href="#" class="btn btn-primary py-3 px-3">Download CV</a></p>
              </div>
	          </div>
	        </div>
        </div>
    	</div>
    </section>

    <section class="ftco-section ftco-no-pb" id="resume-section">
    	<div class="container">
    		<div class="row justify-content-center pb-5">
          <div class="col-md-10 heading-section text-center ftco-animate">
          	<h1 class="big big-2">Resume</h1>
            <h2 class="mb-4">Resume</h2>
            <p>"Success is not final, failure is not fatal: It is the courage to continue that counts." - Winston Churchill.</p>
          </div>
        </div>
    		<div class="row">
    			@foreach ($resumes as $resume)
				<div style="display: flex;
				align-items: stretch;" class="col-md-6">
    				<div style="flex: 1;" class="resume-wrap ftco-animate">
    					<span class="date">{{date("Y", strtotime($resume->starting))}}-{{date("Y", strtotime($resume->ending))}}</span>
    					<h2>{{$resume->degree_name}}</h2>
    					<a href="{{$resume->institute_src}}"> <span class="position">{{$resume->institute}}</span> </a>
    					<p class="mt-4">{{ $resume->description }}</p>
    				</div>
    			</div>
				@endforeach
    		</div>
    		<div class="row justify-content-center mt-5">
    			<div class="col-md-6 text-center ftco-animate">
    				<p><a href="#" class="btn btn-primary py-4 px-5">Download CV</a></p>
    			</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-section" id="services-section">
    	<div class="container">
    		<div class="row justify-content-center py-5 mt-5">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<h1 class="big big-2">Services</h1>
            <h2 class="mb-4">Services</h2>
            <p>"The best way to find yourself is to lose yourself in the service of others." - Mahatma Gandhi</p>
          </div>
        </div>
    		<div class="row">
					<div class="col-md-4 text-center d-flex ftco-animate">
						<a href="#" class="services-1">
							<span class="icon">
								<i class="flaticon-analysis"></i>
							</span>
							<div class="desc">
								<h3 class="mb-5">Web Design</h3>
							</div>
						</a>
					</div>
					@foreach ($services as $service)
					<div class="col-md-4 text-center d-flex ftco-animate">
						<a href="#" class="services-1">
							<span class="icon">
								<i class="{{ $service->icon }}"></i>
							</span>
							<div class="desc">
								<h3 class="mb-5">{{ $service->name }}</h3>
							</div>
						</a>
					</div>
					@endforeach
				</div>
    	</div>
    </section>


		<section class="ftco-section" id="skills-section">
			<div class="container">
				<div class="row justify-content-center pb-5">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<h1 class="big big-2">Skills</h1>
            <h2 class="mb-4">My Skills</h2>
            <p>"Skills are the currency of the future. Continuously invest in learning and honing your skills to stay relevant in an ever-evolving world."</p>
          </div>
        </div>
				<div class="row">
					@foreach ($skills as $skill)
					<div class="col-md-6 animate-box">
						<div class="progress-wrap ftco-animate">
							<h3>{{ $skill->name }}</h3>
							<div class="progress">
							 	<div class="progress-bar color-1" role="progressbar" aria-valuenow="90"
							  	aria-valuemin="0" aria-valuemax="100" style="width:{{$skill->percentage}}%">
							    <span>{{ $skill->percentage }}%</span>
							  	</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</section>


    <section class="ftco-section ftco-project" id="projects-section">
    	<div class="container">
    		<div class="row justify-content-center pb-5">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<h1 class="big big-2">Projects</h1>
            <h2 class="mb-4">My Projects</h2>
            <p>"Projects are the bridge between ideas and reality. They showcase not only what you create, but your ability to innovate, collaborate, and bring concepts to life."</p>
          </div>
        </div>
    		<div class="row">
    			@for ($i = 0; $i < count($projects); $i++)
				  <div class="col-md-6">
    				<div class="project img ftco-animate d-flex justify-content-center align-items-center" style="background-image: url({{str_replace('\\', '/', $projects[$i]->image)}});">
    					<div class="overlay"></div>
	    				<div class="text text-center p-4">
	    					<h3><a href="#">{{ $projects[$i]->name }}</a></h3>
	    					<span>{{ $projects[$i]->title }}</span>
	    				</div>
    				</div>
  				</div>
				  @endfor
    		</div>
    	</div>
    </section>


    <section class="ftco-section" id="blog-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h1 class="big big-2">Blog</h1>
            <h2 class="mb-4">My Blog</h2>
            <p>"Blogs are a canvas of thoughts, a platform to share insights, and a doorway to engage with a wider world. Each post is a brushstroke of knowledge painted on the canvas of the digital realm."</p>
          </div>
        </div>
        <div class="row d-flex">
          @foreach ($blogs as $blog)
		  <div class="col-md-4 d-flex ftco-animate">
			<div class="blog-entry justify-content-end">
			<a href="{{ route('blog', ['id' => $blog->id]) }}" class="block-20" style="background-image: url({{str_replace('\\', '/', $blog->image)}});">
			</a>
			<div class="text mt-3 float-right d-block">
				<div class="d-flex align-items-center mb-3 meta">
				  <p class="mb-0">
					  <span class="mr-2">{{$blog->created_at}}</span>
					  <a href="#" class="mr-2">Admin</a>
					  <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
				  </p>
			  </div>
			  <h3 class="heading"><a href="{{ route('blog', ['id' => $blog->id]) }}">{{ $blog->title }}</a></h3>
			  <p>{{ substr(strip_tags($blog->body), 0, 50) }}...</p>
			</div>
		  </div>
		</div>
		  @endforeach
        </div>
      </div>
    </section>

    <section class="ftco-section contact-section ftco-no-pb" id="contact-section">
      <div class="container">
      	<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h1 class="big big-2">Contact</h1>
            <h2 class="mb-4">Contact Me</h2>
            <p>"Let's connect and build bridges of communication. Reach out, and let's collaborate to turn ideas into reality."</p>
          </div>
        </div>

        <div class="row d-flex contact-info mb-5">
          <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          	<div class="align-self-stretch box p-4 text-center">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-map-signs"></span>
          		</div>
          		<h3 class="mb-4">Address</h3>
	            <p>{{ $about->address }}</p>
	          </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          	<div class="align-self-stretch box p-4 text-center">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-phone2"></span>
          		</div>
          		<h3 class="mb-4">Contact Number</h3>
	            <p><a href="tel://1234567920">{{ $about->phone }}</a></p>
	          </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          	<div class="align-self-stretch box p-4 text-center">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-paper-plane"></span>
          		</div>
          		<h3 class="mb-4">Email Address</h3>
	            <p><a href="mailto:info@yoursite.com">{{ $about->email }}</a></p>
	          </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          	<div class="align-self-stretch box p-4 text-center">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-globe"></span>
          		</div>
          		<h3 class="mb-4">Website</h3>
	            <p><a href="#">yoursite.com</a></p>
	          </div>
          </div>
        </div>
		@if(count($errors) > 0 )
		<div class="alert alert-danger alert-dismissible fade show col-md-12" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
		  </button>
		  <ul class="p-0 m-0" style="list-style: none;">
			  @foreach($errors->all() as $error)
			  <li>{{$error}}</li>
			  @endforeach
		  </ul>
		</div>
	  @endif
	  @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{ session()->get('message') }}
            </div>
            @endif
        <div class="row no-gutters block-9">
          <div class="col-md-6 order-md-last d-flex">
            <form action="{{ route('contact') }}" method="POST" class="bg-light p-4 p-md-5 contact-form">
				@csrf
              <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Your Name" required>
              </div>
              <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Your Email" required>
              </div>
              <div class="form-group">
                <input type="text" name="subject" class="form-control" placeholder="Subject" required>
              </div>
              <div class="form-group">
                <textarea name="message" id="" cols="30" rows="7" class="form-control" placeholder="Message" required></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
              </div>
            </form>

          </div>

          <div class="col-md-6 d-flex">
          	<div class="img" style="background-image: url({{str_replace('\\', '/', $about->image)}});"></div>
          </div>
        </div>
      </div>
    </section>


    <footer class="ftco-footer ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">About</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Links</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Home</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>About</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Services</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Projects</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Services</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Web Design</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Web Development</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Business Strategy</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Data Analysis</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Graphic Design</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">{{ $about->address }}</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">{{ $about->phone }}</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">{{ $about->email }}</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="/themes/front/js/jquery.min.js"></script>
  <script src="/themes/front/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="/themes/front/js/popper.min.js"></script>
  <script src="/themes/front/js/bootstrap.min.js"></script>
  <script src="/themes/front/js/jquery.easing.1.3.js"></script>
  <script src="/themes/front/js/jquery.waypoints.min.js"></script>
  <script src="/themes/front/js/jquery.stellar.min.js"></script>
  <script src="/themes/front/js/owl.carousel.min.js"></script>
  <script src="/themes/front/js/jquery.magnific-popup.min.js"></script>
  <script src="/themes/front/js/aos.js"></script>
  <script src="/themes/front/js/jquery.animateNumber.min.js"></script>
  <script src="/themes/front/js/scrollax.min.js"></script>

  <script src="/themes/front/js/main.js"></script>

  </body>
</html>
