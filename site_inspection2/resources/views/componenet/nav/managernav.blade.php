<html>

<head>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="{{ asset('bootstrap-3.1.1/css/bootstrap.min.css') }}">
</head>

<nav role="navigation" class="colorlib-nav">
  <div class="top-menu" style="padding: 20px 70px 0px 20px;">
    <div class="col-md-4">
      <div id="colorlib-logo"><a href="/">Site Inspection</a></div>
    </div>
    <div style="display: flex;float: right;flex-direction: row-reverse;align-items: center;align-content: center;">
      <ul style="width: fit-content;">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false" style="padding: 10px;display: flex;align-items: center;align-content: center;flex-direction: row;gap: 6px;">
            <img class="img-profile rounded-circle" src="images/profile.png" style="height: 2rem;width: 2rem;border-radius: 50% !important;">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Manager</span>

          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="/auth/logout">Logout</a>
          </div>
        </li>
      </ul>

    </div>
  </div>

</nav>


<section id="home" class="video-hero" style="height:100px;" data-section="home">
  <div class="overlay"></div>
</section>

</html>