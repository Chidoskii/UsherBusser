<?php
require_once("./php/config.php");

$config = configsTMDB();
$upcoming = getUpcomingFilms();
$playing = getNowPlaying();
$base = $config['images']['secure_base_url'] . $config['images']['poster_sizes'][4];
$rateColor = "rgb(240, 240, 240)";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="UsherBusser is an web application for movie theatre employees and movie enthusiasts!">
  <meta
      name="keywords"
      content="Usher Busser, Theater Usher, Regal Cinemas, Regal, Movie Theater"
    />
  <meta name="twitter:image" content="./mani/ub-192x192.png" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="theme-color" content="#222" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Fuggles&family=Pixelify+Sans&family=Poppins&family=Monomaniac+One&family=Roboto:wght@400;700&family=Sedgwick+Ave+Display&family=Acme&family=Croissant+One&display=swap"
    rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
  <link rel="icon" type="image/x-icon" href="../../imgs/favicon2.ico" />
  <link rel="stylesheet" href="./styles/style.css" />
  <link rel="stylesheet" href="./styles/reel.css">
  <link rel="stylesheet" href="./styles/mobile.css" />
  <link rel="manifest" href="./mani/manifest.json" />
  <script src="./scripts/validate.js"></script>
  <title>Home | UsherBusser</title>
</head>

<body>
  <nav class="navbar fixed-top bg-dark navbar-dark navcan">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#"><img src="./imgs/ub-logo.png" alt="" height="50px" /> USHER
          BUSSER</a>
      </div>

      <div class="topnav-links">
      <?php
        if(empty($_SESSION["logged_in"]) || $_SESSION["logged_in"] == false){
          echo '<div class="creds">
                  <ul class="navbar-nav tl-links">
                    <li class="nav-item login">
                      <a class="nav-link" href="./pages/login.php">LOG IN</a>
                    </li>
                    <li class="nav-item signup">
                      <a class="nav-link" href="./pages/login.php">SIGN UP</a>
                    </li>
                  </ul>
                </div>';
        } 
        else {
          echo '<li class="nav-item dropdown user-drop">
                  <a class="nav-link " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img alt="user" src="./imgs/user-circle.png" class="user-logo"/>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="./php/logout.php">LOGOUT </a></li>
                  </ul>
                </li>';
        }
        ?>

        <form class="d-flex search-form" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
          <button class="btn btn-outline-secondary search-btn" type="submit">
            Search
          </button>
        </form>
      </div>
    </div>
  </nav>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark navcan2">
    <div class="container-fluid sub-can">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item subnav">
            <a class="nav-link" href="#">HOME</a>
          </li>
          <li class="nav-item subnav">
            <a class="nav-link" href="./pages/showtimes.php">MOVIES</a>
          </li>
          <li class="nav-item subnav">
            <a class="nav-link" href="./pages/uher_sched.php">SCHEDULE</a>
          </li>
          <li class="nav-item subnav">
            <a class="nav-link" href="./pages/duties.php">DUTIES</a>
          </li>
          <li class="nav-item subnav">
            <a class="nav-link" href="./pages/timecard.php">TIME CARD</a>
          </li>
          <li class="nav-item subnav">
            <a class="nav-link" href="./pages/reviews.php">REVIEWS</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class=" home-content">
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
  </div>
      <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="6000">
          <img src="./imgs/nowp.webp" class="d-block w-100" alt="" />
          <div class="carousel-caption d-none d-md-block">
            <h5>First slide label</h5>
            <p>Some representative placeholder content for the first slide.</p>
          </div>
        </div>
        <div class="carousel-item img-top" data-bs-interval="4000">
          <img src="./imgs/usher.jpg" class="d-block w-100" alt="" />
          <div class="carousel-caption d-none d-md-block">
            <h5>Second slide label</h5>
            <p>Some representative placeholder content for the first slide.</p>
          </div>
        </div>
        <div class="carousel-item img-top" data-bs-interval="4000">
          <img src="./imgs/pulp.webp" class="d-block w-100" alt="" />
          <div class="carousel-caption d-none d-md-block">
            <h5>Third slide label</h5>
            <p>Some representative placeholder content for the first slide.</p>
          </div>
        </div>
        <div class="carousel-item" data-bs-interval="5000">
          <img src="./imgs/RTlarger.jpg" class="d-block w-100" alt="" />
          <div class="carousel-caption d-none d-md-block">
            <h5>Fourth slide label</h5>
            <p>Some representative placeholder content for the first slide.</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <div class="page-content container-lg">
      <div class="reel-container">
      <h2 class="section-title">Now Playing</h2>
      <br>
        <div class="slider-wrapper">
          <button id="new-prev-slide" class="nr-slide-button material-symbols-rounded">
          <img src="./imgs/reel/chev-left.png" alt="..." class="chevy" />
          </button>
          <ul class="new-r-image-list">
            <?php
              foreach ($playing as $key => $movie) {
                if ($key == "results") {
                  foreach ($movie as $key => $value) {
                    $id = $value['id'];
                    $temp = $value['original_title'];
                    $title = '"'. $temp . '"';
                    $release = $value['release_date'];
                    $img = $base . $value['poster_path'];
                    $rating = number_format($value['vote_average'],1);

                    if ($rating > 7.4) {
                      $rateColor = "#93FFCD";
                    }
                    if ($rating < 7.5) {
                      $rateColor = "#FFE38E";
                    }
                    if ($rating < 5.6) {
                      $rateColor = "#FFBBB9";
                    }
                    if ($rating == 0) {
                      $rateColor = "rgb(240, 240, 240)";
                    }
  
                    if ($img == $base) {
                      $img = $filler;
                    }
                    
                    $card = <<<CONTENT
                    <div class="film-info-can">  
                      <img class="image-item" src="$img" alt="img-1" />
                      <div class="film-details">
                        <div class="film-desc-deets">
                          <a class="film-title-link" href="./pages/critiques.php?mid=$id" rel="noopener noreferrer">
                            <p class="img-reel-film-title">$title</p>
                          </a>
                          <p class="img-reel-film-genre">Realesed: $release</p>
                        </div>
                        <div class="film-ratings-deets">
                          <p class="img-reel-ratings-title">Rating</p>
                          <div class="img-reel-rating-can">
                            <p class="img-reel-ratings" style="background-color:$rateColor;">$rating</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    CONTENT;
                  echo $card;
                  }
                }
              }
            ?>          
          </ul>
          <button id="new-next-slide" class="nr-slide-button material-symbols-rounded">
            <img src="./imgs/reel/chev-right.png" alt="..." class="chevy" />
          </button>
        </div>
        <div class="nr-slider-scrollbar">
          <div class="scrollbar-track">
            <div class="nr-scrollbar-thumb"></div>
          </div>
        </div>
      </div>
      <br>
      <br>
      <div class="reel-container">
      <h2 class="section-title">Upcoming</h2>
      <br>
        <div class="slider-wrapper">
          <button id="prev-slide" class="slide-button material-symbols-rounded">
          <img src="./imgs/reel/chev-left.png" alt="..." class="chevy" />
          </button>
          <ul class="image-list">
            <?php
              foreach ($upcoming as $key => $movie) {
                if ($key == "results") {
                  foreach ($movie as $key => $value) {
                    $id = $value['id'];
                    $temp = $value['original_title'];
                    $title = '"'. $temp . '"';
                    $release = $value['release_date'];
                    $img = $base . $value['poster_path'];
                    $rating = number_format($value['vote_average'],1);

                    if ($rating > 7.4) {
                      $rateColor = "#93FFCD";
                    }
                    if ($rating < 7.5) {
                      $rateColor = "#FFE38E";
                    }
                    if ($rating < 5.6) {
                      $rateColor = "#FFBBB9";
                    }
                    if ($rating == 0) {
                      $rateColor = "rgb(240, 240, 240)";
                    }
  
                    if ($img == $base) {
                      $img = $filler;
                    }
                    
                    $card = <<<CONTENT
                    <div class="film-info-can">  
                      <img class="image-item" src="$img" alt="img-1" />
                      <div class="film-details">
                        <div class="film-desc-deets">
                          <a class="film-title-link" href="./pages/critiques.php?mid=$id" rel="noopener noreferrer">
                            <p class="img-reel-film-title">$title</p>
                          </a>
                          <p class="img-reel-film-genre">$release</p>
                        </div>
                        <div class="film-ratings-deets">
                          <p class="img-reel-ratings-title">Rating</p>
                          <div class="img-reel-rating-can">
                            <p class="img-reel-ratings" style="background-color:$rateColor;">$rating</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    CONTENT;
                  echo $card;
                  }
                }
              }
            ?>          
          </ul>
          <button id="next-slide" class="slide-button material-symbols-rounded">
            <img src="./imgs/reel/chev-right.png" alt="..." class="chevy" />
          </button>
        </div>
        <div class="slider-scrollbar">
          <div class="scrollbar-track">
            <div class="scrollbar-thumb"></div>
          </div>
        </div>
      </div>
      <br>
      <br />
      <h1 class="section-title">Theater Ushers</h1>
      <div class="row">
        <div class="col-sm-6">
          <div class="card h-100" style="width: 20rem">
            <img src="./imgs/volunteers.jpeg" class="card-img-top" alt="" />
            <div class="card-body">
              <h5 class="card-title">View Schedule</h5>
              <p class="card-text">
                Click the link to view the current Usher Schedule.
              </p>
              <a href="./pages/uher_sched.php" class="btn btn-dark">VIEW SCHEDULE</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card h-100" style="width: 20rem">
            <img src="./imgs/sched_edit.jpg" class="card-img-top" alt="" />
            <div class="card-body">
              <h5 class="card-title">Edit Schedule</h5>
              <p class="card-text">
                Click the link to add an entry to the Usher Schedule.
              </p>
              <a href="./pages/uher_sched.php#ushyschedy" class="btn btn-dark">ADD ENTRY</a>
            </div>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="card h-100" style="width: 20rem">
            <img src="./imgs/rest.jpg" class="card-img-top" alt="" />
            <div class="card-body">
              <h5 class="card-title">Restroom Checks</h5>
              <p class="card-text">
                Make sure the restrooms are clean and operating properly.
              </p>
              <a href="./pages/duties.php" class="btn btn-dark">VIEW</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card h-100" style="width: 20rem">
            <img src="./imgs/custodian.jpg" class="card-img-top" alt="" />
            <div class="card-body">
              <h5 class="card-title">Usher Duties</h5>
              <p class="card-text">
                Keep track of your tasks. View opening and closing duties.
              </p>
              <a href="./pages/duties.php" class="btn btn-dark">VIEW DUTIES</a>
            </div>
          </div>
        </div>
      </div>
      <br />

      <h1 class="section-title">Time Cards</h1>
      <div>
        <div class="row time-cards">
          <div class="col-sm-6">
            <div class="card h-100" style="width: 20rem">
              <img src="./imgs/times.png" class="card-img-top hours-pic" alt="" />
              <div class="card-body">
                <h5 class="card-title">View/Edit Shifts</h5>
                <p class="card-text">View or edit your work schedule.</p>
                <a href="./pages/timecard.php" class="btn btn-dark">VISIT</a>
              </div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="card h-100" style="width: 20rem">
              <img src="./imgs/payday.jpg" class="card-img-top hours-pic" alt="" />
              <div class="card-body">
                <h5 class="card-title">Projected Pay</h5>
                <p class="card-text">
                  See how much you've earned this pay period!
                </p>
                <a href="./pages/timecard.php#tcard" class="btn btn-dark">VISIT</a>
              </div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="card h-100" style="width: 20rem">
              <img src="./imgs/swapy.jpeg" class="card-img-top hours-pic" alt="" />
              <div class="card-body">
                <h5 class="card-title">Swap Shifts</h5>
                <p class="card-text">
                  See if anyone is willing to cover your shift.
                </p>
                <a href="./pages/timecard.php" class="btn btn-dark">VISIT</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br />

      <h1 class="section-title">Movie Reviews</h1>
      <div>
        <div class="row">
          <div class="col-sm-6">
            <div class="card h-100" style="width: 20rem">
              <img src="./imgs/Ebert05.jpg" class="card-img-top" alt="" />
              <div class="card-body">
                <h5 class="card-title">Leave a Review</h5>
                <p class="card-text">
                  Like a movie? Why not leave a review? Follow the link to
                  read reviews that other users have created or to write your
                  own
                </p>
                <a href="./pages/critiques.php" class="btn btn-dark">REVIEW</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer>
    <div class="container-lg">
      <div class="footer-flex">
        <div class="footer-left">
          <div class="footy-logo">
            <img src="../../imgs/android-chrome-512x512.png" height="50px" />&nbsp;
            <p class="name-footer">CHIDOSKII</p>
          </div>
          <br />
          <p>CMPS 3680 Web Programming II<br />Final Project</p>
          <br />
            <a class="footy-link-list" href="https://www.themoviedb.org/" target="_blank" rel="noopener noreferrer" ><img alt="..." src="https://www.themoviedb.org/assets/2/v4/logos/v2/blue_square_1-5bdc75aaebeb75dc7ae79426ddd9be3b2be1e342510f8202baf6bffa71d7f5c4.svg" class="footy-tmdb-icon"/></a>
            <p class="attribution">This product uses the TMDB API but is not endorsed or certified by TMDB.</p>
        </div>
        <div class="footer-mid">
          <p class="okpara_copyright">&copy; UsherBusser 2023</p>
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
          <div class="haiku">
            <p class="poem">I sweep all day long</p>
            <p class="poem">But there is still always more</p>
            <p class="poem">Popcorn on the floor!</p>
          </div>
        </div>
        <div class="footer-right">
          <p>SOCIALS</p>
          <a href="https://www.linkedin.com/in/chidi-okpara/" target="_blank" rel="noopener noreferrer">
            <img src="./imgs/linkedin-white.png" height="30px" /></a>
          <br />
          <a href="https://medium.com/@chidoskii" target="_blank" rel="noopener noreferrer">
            <img src="./imgs/medium-2.png" height="30px" /></a>
        </div>
      </div>
    </div>
  </footer>
  <script src="./scripts/slide.js" ></script>
  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
    crossorigin="anonymous"></script>
</body>

</html>
