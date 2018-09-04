<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="secondNav">
    <div class="container">
    <a class="navbar-brand" href="{{ route('index') }}">{{ config('app.name', 'Laravel') }}</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <li class="nav-item">
              <!-- TODO: create about page -->
            <a class="nav-link" href="https://github.com/kagron/NaperIndex">About</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>