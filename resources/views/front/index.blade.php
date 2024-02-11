@extends('layouts.app')
@include('layouts.slider')
@section('content')
     <!-- ======= About Section ======= -->
     <section id="about">
        <div class="container" data-aos="fade-up">
  
          <header class="section-header">
            <h3>About Us</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
              dolore magna aliqua.</p>
          </header>
  
          <div class="row about-container">
  
            <div class="col-lg-6 content order-lg-1 order-2">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                ea commodo consequat.
              </p>
  
              <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                <div class="icon"><i class="bi bi-card-checklist"></i></div>
                <h4 class="title"><a href="">Eiusmod Tempor</a></h4>
                <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum
                  soluta nobis est eligendi</p>
              </div>
  
              <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                <div class="icon"><i class="bi bi-brightness-high"></i></div>
                <h4 class="title"><a href="">Magni Dolores</a></h4>
                <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                  mollit anim id est laborum</p>
              </div>
  
              <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                <div class="icon"><i class="bi bi-calendar4-week"></i></div>
                <h4 class="title"><a href="">Dolor Sitema</a></h4>
                <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                  commodo consequat tarad limino ata</p>
              </div>
  
            </div>
  
            <div class="col-lg-6 background order-lg-2" data-aos="zoom-in">
              <img src="{{ asset('front') }}/img/about-img.svg" class="img-fluid" alt="">
            </div>
          </div>
  
          <div class="row about-extra">
            <div class="col-lg-6" data-aos="fade-right">
              <img src="{{ asset('front') }}/img/about-extra-1.svg" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 pt-5 pt-lg-0" data-aos="fade-left">
              <h4>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h4>
              <p>
                Ipsum in aspernatur ut possimus sint. Quia omnis est occaecati possimus ea. Quas molestiae perspiciatis
                occaecati qui rerum. Deleniti quod porro sed quisquam saepe. Numquam mollitia recusandae non ad at et a.
              </p>
              <p>
                Ad vitae recusandae odit possimus. Quaerat cum ipsum corrupti. Odit qui asperiores ea corporis deserunt
                veritatis quidem expedita perferendis. Qui rerum eligendi ex doloribus quia sit. Porro rerum eum eum.
              </p>
            </div>
          </div>
  
          <div class="row about-extra">
            <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left">
              <img src="{{ asset('front') }}/img/about-extra-2.svg" class="img-fluid" alt="">
            </div>
  
            <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-right">
              <h4>Neque saepe temporibus repellat ea ipsum et. Id vel et quia tempora facere reprehenderit.</h4>
              <p>
                Delectus alias ut incidunt delectus nam placeat in consequatur. Sed cupiditate quia ea quis. Voluptas nemo
                qui aut distinctio. Cumque fugit earum est quam officiis numquam. Ducimus corporis autem at blanditiis
                beatae incidunt sunt.
              </p>
              <p>
                Voluptas saepe natus quidem blanditiis. Non sunt impedit voluptas mollitia beatae. Qui esse molestias.
                Laudantium libero nisi vitae debitis. Dolorem cupiditate est perferendis iusto.
              </p>
              <p>
                Eum quia in. Magni quas ipsum a. Quis ex voluptatem inventore sint quia modi. Numquam est aut fuga
                mollitia exercitationem nam accusantium provident quia.
              </p>
            </div>
  
          </div>
  
        </div>
      </section><!-- End About Section -->
  
      <!-- ======= Services Section ======= -->
      <!--<section id="services" class="section-bg">
        <div class="container" data-aos="fade-up">
  
          <header class="section-header">
            <h3>Services</h3>
            <p>Laudem latine persequeris id sed, ex fabulas delectus quo. No vel partiendo abhorreant vituperatoribus.</p>
          </header>
  
          <div class="row justify-content-center">
  
            <div class="col-md-6 col-lg-5" data-aos="zoom-in" data-aos-delay="100">
              <div class="box">
                <div class="icon"><i class="bi bi-briefcase" style="color: #ff689b;"></i></div>
                <h4 class="title"><a href="">Lorem Ipsum</a></h4>
                <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint
                  occaecati cupiditate non provident</p>
              </div>
            </div>
            <div class="col-md-6 col-lg-5" data-aos="zoom-in" data-aos-delay="200">
              <div class="box">
                <div class="icon"><i class="bi bi-card-checklist" style="color: #e9bf06;"></i></div>
                <h4 class="title"><a href="">Dolor Sitema</a></h4>
                <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                  commodo consequat tarad limino ata</p>
              </div>
            </div>
  
            <div class="col-md-6 col-lg-5" data-aos="zoom-in" data-aos-delay="100">
              <div class="box">
                <div class="icon"><i class="bi bi-bar-chart" style="color: #3fcdc7;"></i></div>
                <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
                <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                  fugiat nulla pariatur</p>
              </div>
            </div>
            <div class="col-md-6 col-lg-5" data-aos="zoom-in" data-aos-delay="200">
              <div class="box">
                <div class="icon"><i class="bi bi-binoculars" style="color:#41cf2e;"></i></div>
                <h4 class="title"><a href="">Magni Dolores</a></h4>
                <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                  mollit anim id est laborum</p>
              </div>
            </div>
  
            <div class="col-md-6 col-lg-5" data-aos="zoom-in" data-aos-delay="100">
              <div class="box">
                <div class="icon"><i class="bi bi-brightness-high" style="color: #d6ff22;"></i></div>
                <h4 class="title"><a href="">Nemo Enim</a></h4>
                <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
                  praesentium voluptatum deleniti atque</p>
              </div>
            </div>
            <div class="col-md-6 col-lg-5" data-aos="zoom-in" data-aos-delay="200">
              <div class="box">
                <div class="icon"><i class="bi bi-calendar4-week" style="color: #4680ff;"></i></div>
                <h4 class="title"><a href="">Eiusmod Tempor</a></h4>
                <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum
                  soluta nobis est eligendi</p>
              </div>
            </div>
  
          </div>
  
        </div>
      </section>-->
      <!-- End Services Section -->
  
  
      <!-- ======= Contact Section ======= -->
      <section id="contact">
        <div class="container-fluid" data-aos="fade-up">
  
          <div class="section-header">
            <h3>Contact Us</h3>
          </div>
  
          <div class="row">
  
            <div class="col-lg-6">
              <div class="map mb-4 mb-lg-0">
                <iframe
                  src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
                  frameborder="0" style="border:0; width: 100%; height: 340px;" allowfullscreen></iframe>
              </div>
            </div>
  
            <div class="col-lg-6">
              <div class="row">
                <div class="col-md-5 info">
                  <i class="bi bi-geo-alt"></i>
                  <p>A108 Adam Street, NY 535022</p>
                </div>
                <div class="col-md-4 info">
                  <i class="bi bi-envelope"></i>
                  <p>info@example.com</p>
                </div>
                <div class="col-md-3 info">
                  <i class="bi bi-phone"></i>
                  <p>+1 5589 55488 55</p>
                </div>
              </div>
  
              <div class="form">
                <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                  <div class="row">
                    <div class="form-group col-lg-6">
                      <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                    </div>
                    <div class="form-group col-lg-6 mt-3 mt-lg-0">
                      <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                    </div>
                  </div>
                  <div class="form-group mt-3">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                  </div>
                  <div class="form-group mt-3">
                    <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                  </div>
                  <div class="my-3">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your message has been sent. Thank you!</div>
                  </div>
                  <div class="text-center"><button type="submit" title="Send Message">Send Message</button></div>
                </form>
              </div>
            </div>
  
          </div>
  
        </div>
      </section><!-- End Contact Section -->
  
@endsection