
@extends('layouts.app')

@section('content')

<div class="container">
  <section id="carousel">
      <div class="carousel slide" data-bs-ride="carousel" id="carousel-1">
          <div class="carousel-inner">
              <div class="carousel-item">
                  <div class="bg-light border rounded border-light pulse animated hero-nature carousel-hero jumbotron py-5 px-4">
                      <h1 style="color: black;" class="hero-title">Innovation</h1>
                      <p style="color: black;" class="hero-subtitle">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
                      <!-- <p><a class="btn btn-primary hero-button plat" role="button" href="#">Learn more</a></p> -->
                  </div>
              </div>
              <div class="carousel-item">
                  <div class="bg-light border rounded border-light pulse animated hero-photography carousel-hero jumbotron py-5 px-4 ">
                      <h1 class="hero-title">Digital Skills</h1>
                      <p class="hero-subtitle">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
                      <!-- <p><a class="btn btn-primary hero-button plat" role="button" href="#">Learn more</a></p> -->
                  </div>
              </div>
              <div class="carousel-item active">
                  <div class="bg-light border rounded border-light pulse animated hero-technology carousel-hero jumbotron py-5 px-4">
                      <h1 class="hero-title">Technology</h1>
                      <p class="hero-subtitle">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
                      <!-- <p><a class="btn btn-primary hero-button plat" role="button" href="#">Learn more</a></p> -->
                  </div>
              </div>
          </div>
          <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a></div>
          <ol class="carousel-indicators">
              <li data-bs-target="#carousel-1" data-bs-slide-to="0"  class="active"></li>
              <li data-bs-target="#carousel-1" data-bs-slide-to="1"></li>
              <li data-bs-target="#carousel-1" data-bs-slide-to="2"></li>
          </ol>
      </div>
  </section>
</div>
<div class="container">
  <div class="row">
      <div class="col-md-6">
          <section>
              <div class="pt-5">
                  <div class="photo-card">
                      <div class="photo-background" style="background-image:url(&quot;assets/img/hod.jpeg&quot;);"></div>
                      <div class="photo-details">
                          <h1>HOD</h1>
                          <h1>Lorem ipsum</h1>
                          <p>consectetur adipiscing elit. Cras sodales elementum mi non hendrerit. Proin tempor facilisis felis nec ultrices. Duis nec ultrices neque. Proin semper ultricies turpis, vel faucibus velit sodales vitae. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.&nbsp; </p>
                          <div class="photo-tags">
                              <!-- <ul>
                                  <li>Item 1<a href="#">ver mais</a></li>
                                  <li>Item 1<a href="#">Comprar </a></li>
                              </ul> -->
                          </div>
                      </div>
                  </div>
              </div>
          </section>
      </div>
      <div class="col-md-6">
        <div class="newsletter8 py-5">
          <div class="">
            <div class="row">
              <!-- column  -->
              <div class="">
                <div class="d-block d-md-flex border-bottom pb-3 text-uppercase">
                  <h6 class="no-shrink font-weight-medium align-self-center m-b-0">News & Projects</h6>
                </div>
                <div class="row blog-row mt-4 mb-3">
                  <div class="col-md-4">
                    <a href="#"><img src="assets/img/project1.jpeg" alt="wrapkit" class="img-fluid" /></a>
                  </div>
                  <div class="col-md-8">
                    <h5><a href="#" class="text-decoration-none">The Universe is all of time and space and its contents.</a></h5>
                    <p>by <a href="#" class="text-decoration-none">Mark Freeman</a> / 23 May 2017</p>
                  </div>
                </div>
                <div class="row blog-row my-3">
                  <div class="col-md-4">
                    <a href="#"><img src="assets/img/project2.jpeg" alt="wrapkit" class="img-fluid" /></a>
                  </div>
                  <div class="col-md-8">
                    <h5><a href="#" class="text-decoration-none">Pellentesque mollis eros quis massa interdum porta et vel.</a></h5>
                    <p>by <a href="#" class="text-decoration-none">Mark Freeman</a> / 23 May 2017</p>
                  </div>
                </div>
                <div class="row blog-row my-3">
                  <div class="col-md-4">
                    <a href="#"><img src="assets/img/project3.jpeg" alt="wrapkit" class="img-fluid" /></a>
                  </div>
                  <div class="col-md-8">
                    <h5><a href="#" class="text-decoration-none">Pellentesque mollis eros quis massa interdum porta et vel.</a></h5>
                    <p>by <a href="#" class="text-decoration-none">Mark Freeman</a> / 23 May 2017</p>
                  </div>
                </div>
              </div>
              <!-- column  -->
            </div>
          </div>
        </div>
        </div>
      
  </div>
</div>
    
@endsection

