@section('content')

<div class="guestlayout">
  @extends('layouts/GuestLayout.guest');
</div>
<div class="super-container ">
  <div class="image-text-container d-flex ">
    <div class="home-text text-primary ">
      <div class="text-container">
        <b>
          <h1>Welcome to eClassroom</h1>
        </b>
        <b>
          <h2>The university of Dodoma</h1>
        </b>
        <b>
          <h3>E-learning Platform</h1>
        </b>
      </div>

    </div>
    <div class="home-image ">
      <div id="carouselExampleSlidesOnly" class="carousel slide " data-bs-ride="carousel">
        <div class="carousel-inner ">
          <div class="carousel-item active ">
            <img src="{{asset('images/cive2.jpg')}}" class="d-block" alt="...">
          </div>
          <div class="carousel-item w-100 h-50">
            <img src="{{asset('images/cive.jpg')}}" class="d-block " alt="...">
          </div>
          <div class="carousel-item w-100 h-50">
            <img src="{{asset('images/UDOM_College_of_Informatics.png')}}" class="d-block" alt="...">
          </div>

          <div class="carousel-item w-100 h-50">
            <img src="{{asset('images/cive4.jpg')}}" class="d-block w-100 h-50 img-fluid" alt="...">
          </div>

          <div class="carousel-item w-100 h-50">
            <img src="{{asset('images/cive5.jpg')}}" class="d-block w-100 h-50 img-fluid" alt="...">
          </div>

          <div class="carousel-item w-100 h-50">
            <img src="{{asset('images/cive5.jpg')}}" class="d-block w-100 h-50 img-fluid" alt="...">
          </div>
        </div>
      </div>

    </div>
  </div>


  <!-- cards of descriptions -->
  <div class="container-cards d-flex ">
    <div class="card  bg-white mb-3 card1" style="max-width: 18rem;">

      <div class="card-body  ">
        <h5 class="card-title text-primary"><i class="fas fa-chart-bar"></i></h5>
        <p class="card-text">Course monitoring and Progress Measuring</p>
      </div>
    </div>
    <div class="card  bg-white mb-3 card2" style="max-width: 18rem;">

      <div class="card-body ">
        <h5 class="card-title text-primary"><i class="fas fa-book"></i></h5>
        <p class="card-text">Content Availability and Consistency</p>
      </div>
    </div>
    <div class="card  bg-white mb-3 card3" style="max-width: 18rem;">

      <div class="card-body ">
        <h5 class="card-title text-primary"><i class="fas fa-laptop"> </i></h5>
        <p class="card-text">Virtual Classrooms</p>
      </div>
    </div>
    <div class="card  bg-white mb-3 card4" style="max-width: 18rem;">

      <div class="card-body ">
        <h5 class="card-title text-primary"><i class="fas fa-edit"></i></h5>
        <p class="card-text">Continuous Assessments</p>
      </div>
    </div>

    <div class="card  bg-white mb-3 card5" style="max-width: 18rem;">
      <div class="card-body">
        <h5 class="card-title text-primary"><i class="fas fa-message"> </i></h5>
        <p class="card-text ">Discussion Forums</p>
      </div>
    </div>

  </div>
</div>

@endsection