<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.html">Ceysaid</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
        aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item @if($currentRouteName == 'home')  active @endif"><a href="{{route('home')}}" class="nav-link">Home</a></li>
          <!-- <li class="nav-item"><a href="single-tour.html" class="nav-link">Tour</a></li> -->
          <li class="nav-item @if($currentRouteName == 'countries')  active @endif"><a href="{{route('countries')}}" class="nav-link">Destination</a></li>
          <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
          <li class="nav-item cta @if($currentRouteName == 'tour')  active @endif"><a href="#" class="nav-link">Book Now</a></li>
        </ul>
      </div>
    </div>
  </nav>