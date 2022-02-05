<nav class="navbar">
    <div class="container flex">
        <a href="{{ route('home') }}" class="site-brand">
            CEY<span>S<span>A<span>I<span>D</span></span></span></span>
        </a>

        <button type="button" id="navbar-show-btn" class="flex">
            <i class="fas fa-bars"></i>
        </button>
        <div id="navbar-collapse">
            <button type="button" id="navbar-close-btn" class="flex">
                <i class="fas fa-times"></i>
            </button>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('countries') }}" class="nav-link">Countries</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('tours') }}" class="nav-link">Tours</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('about-us') }}" class="nav-link">About</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('contact-us') }}" class="nav-link">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
