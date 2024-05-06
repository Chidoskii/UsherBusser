<?php
require_once("../php/config.php");
require_once("../php/functions.php");

if(empty($_SESSION["logged_in"])){
  header("location: ./login.php");
}

if($_SESSION["logged_in"] == false){
  header("location: ./login.php");
}

$wtf = getUserId($_SESSION["login_email"]);
$username = strtoupper($_SESSION["get_user"]["username"]);
$ratelist = getRatedMovies($wtf);
$watchlist = getWatchlistMovies($wtf);
$seenlist = getSeenlistMovies($wtf);
$reviewlist = getReviewedMovies($wtf);
$deets = "";
$filler = "../imgs/filler.jpg";
$filler2 = "../imgs/mona.jpg";
$config = configsTMDB();
$poster_base = $config['images']['secure_base_url'] . $config['images']['poster_sizes'][4];
$poster = "";
$rateColor = "rgb(240, 240, 240)";
$myrateColor = "rgb(240, 240, 240)";

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Fuggles&family=Pixelify+Sans&family=Poppins&family=Roboto:wght@400;700&family=Sedgwick+Ave+Display&family=Monomaniac+One&family=Acme&family=Croissant+One&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <link rel="icon" type="image/x-icon" href="../imgs/favicon2.ico" />
    <link rel="stylesheet" href="../styles/reviews.css">
    <link rel="stylesheet" href="../styles/style.css" />
    <link rel="stylesheet" href="../styles/mobile.css" />
    <title>Schedule | UsherBusser</title>
  </head>
  <body>
    <nav class="navbar fixed-top bg-dark navbar-dark navcan">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="../index.php"
            ><img src="../imgs/ub-logo.png" alt="" height="50px" /> USHER
            BUSSER</a
          >
        </div>

        <div class="topnav-links">
        <?php
        if(empty($_SESSION["logged_in"]) || $_SESSION["logged_in"] == false){
          echo '<div class="creds">
                  <ul class="navbar-nav tl-links">
                    <li class="nav-item login">
                      <a class="nav-link" href="./login.php">LOG IN</a>
                    </li>
                    <li class="nav-item signup">
                      <a class="nav-link" href="./login.php">SIGN UP</a>
                    </li>
                  </ul>
                </div>';
        } 
        else {
          echo '<li class="nav-item dropdown user-drop">
                  <a class="nav-link " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img alt="user" src="../imgs/user-circle.png" class="user-logo"/>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../php/logout.php">LOGOUT </a></li>
                  </ul>
                </li>';
        }
        ?>

          <form class="d-flex search-form" role="search">
            <input
              class="form-control me-2"
              type="search"
              placeholder="Search"
              aria-label="Search"
            />
            <button class="btn btn-outline-secondary search-btn" type="submit">
              Search
            </button>
          </form>
        </div>
      </div>
    </nav>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark navcan2">
      <div class="container-fluid sub-can">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#collapsibleNavbar"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav">
            <li class="nav-item subnav">
              <a class="nav-link" href="../index.php">HOME</a>
            </li>
            <li class="nav-item subnav">
              <a class="nav-link" href="./showtimes.php">MOVIES</a>
            </li>
            <li class="nav-item subnav">
              <a class="nav-link" href="./uher_sched.php">SCHEDULE</a>
            </li>
            <li class="nav-item subnav">
              <a class="nav-link" href="./duties.php">DUTIES</a>
            </li>
            <li class="nav-item subnav">
              <a class="nav-link" href="./timecard.php">TIME CARD</a>
            </li>
            <li class="nav-item subnav">
              <a class="nav-link" href="#">REVIEWS</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-lg usher-content">
      <h2 class="sub-page-title">My Ratings</h2>
      <div class="myratings-can">
      <?php
        foreach ($ratelist as $key => $item) {
          $movieid = $item['mID'];
            $deets = getMovieDeets($TMDB_API_KEY, $movieid);

            $id = $deets['id'];
            $temp = $deets['original_title'];
            $title = '"'. $temp . '"';
            $story = $deets['overview'];
            $release = $deets['release_date'];
            $date = date_create($release);
            $format = date_format($date, 'F jS Y');
            $img = $poster_base . $deets['poster_path'];
            $rating = number_format($deets['vote_average'],1);
            $myrate = getMyRate($wtf, $movieid);

            if ($myrate > 7.4) {
              $myrateColor = "#93FFCD";
            }
            if ($myrate < 7.5) {
              $myrateColor = "#FFE38E";
            }
            if ($myrate < 5.6) {
              $myrateColor = "#9FFBBB";
            }

            if ($rating > 7.4) {
              $rateColor = "#93FFCD";
            }
            if ($rating < 7.5) {
              $rateColor = "#FFE38E";
            }
            if ($rating < 5.6) {
              $rateColor = "#FFBBB9";
            }


            $card = <<<CONTENT
                    <div class="ratelist-card">
                      <div class="rate-info">
                        <div class="rate-title-rating-can">
                          <div class="rate-title-can">$title</div>
                          <div class="tmdb-your-rate-can">
                            <div class="your-rating-can">
                              <div class="ratings-header">$username</div>
                              <div class="ratings-score" style="background-color:$myrateColor;">$myrate</div>
                            </div>
                            <div class="your-rating-can">
                              <div class="ratings-header">TMDB</div>
                              <div class="ratings-score" style="background-color:$rateColor;">$rating</div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="rate-img">
                        <a class="ratings-img-link" href="./critiques.php?mid=$id" rel="noopener noreferrer">
                          <img src="$img" alt="" class="rate-img-cover"/>
                        </a>
                      </div>
                    </div>
                    <br>
                    CONTENT;
            echo $card;
        }
      ?>
      </div>
    <h2 class="sub-page-title">My Reviews</h2>
        <div class="my-reviews-can">
        <?php
        foreach ($reviewlist as $key => $item) {
          $movieid = $item['mID'];
            $deets = getMovieDeets($TMDB_API_KEY, $movieid);

            $id = $deets['id'];
            $temp = $deets['original_title'];
            $title = '"'. $temp . '"';
            $reviewDate = $item['createdAt'];
            $date = date_create($reviewDate);
            $format = date_format($date, 'F jS Y');
            $img = $poster_base . $deets['poster_path'];
            $recommend = $item['NOD'];
            $myreview = $item['critique'];

            $card = <<<CONTENT
                    <div class="review-card">
                      <div class="review-card-film-info">
                        <div class="review-card-film-cover">
                          <a class="ratings-img-link" href="./critiques.php?mid=$id" rel="noopener noreferrer">
                            <img src="$img" alt="..." class="review-img-cvr" />
                          </a>
                        </div>
                        <div class="review-card-meta">
                          <div class="review-card-film-title">$title</div>
                          <div class="review-card-review-date">Reviewed on $format</div>
                        </div>
                      </div>
                      <div class="review-card-film-critique">$myreview</div>
                    </div>
                    CONTENT;
            echo $card;
        }
      ?>
      </div>
      
      <h1 class="lp-section-hdr">Watchlist</h1>
    <div class="lp-watchlist-can">
    <?php
        foreach ($watchlist as $key => $item) {
          $movieid = $item['mID'];
            $deets = getMovieDeets($TMDB_API_KEY, $movieid);

            $id = $deets['id'];
            $temp = $deets['original_title'];
            $title = '"'. $temp . '"';
            $img = $poster_base . $deets['poster_path'];
            $rating = number_format($deets['vote_average'],1);

            if ($rating > 7.4) {
              $rateColor = "#93FFCD";
            }
            if ($rating < 7.5) {
              $rateColor = "#FFE38E";
            }
            if ($rating < 5.6) {
              $rateColor = "#FFBBB9";
            }


            $card = <<<CONTENT
                    <div class="watchlist-card">
                      <a class="watchlist-img-link" href="./critiques.php?mid=$id" rel="noopener noreferrer">
                        <img src="$img" alt="" class="wl-img-cover"/>
                      </a>
                      <div class="wl-film-info">
                        <div class="wl-film-title">$title</div>
                        <div class="wl-film-rate" style="background-color:$rateColor;">$rating</div>
                      </div>
                    </div>
                    CONTENT;
            echo $card;
        }
      ?>
    </div>

  <h1 class="lp-section-hdr">Seenlist</h1>
  <div class="lp-watchlist-can">
    <?php
        foreach ($seenlist as $key => $item) {
          $movieid = $item['mID'];
            $deets = getMovieDeets($TMDB_API_KEY, $movieid);

            $id = $deets['id'];
            $temp = $deets['original_title'];
            $title = '"'. $temp . '"';
            $img = $poster_base . $deets['poster_path'];
            $rating = number_format($deets['vote_average'],1);

            if ($rating > 7.4) {
              $rateColor = "#93FFCD";
            }
            if ($rating < 7.5) {
              $rateColor = "#FFE38E";
            }
            if ($rating < 5.6) {
              $rateColor = "#FFBBB9";
            }


            $card = <<<CONTENT
                    <div class="watchlist-card">
                      <a class="watchlist-img-link" href="./critiques.php?mid=$id" rel="noopener noreferrer">
                        <img src="$img" alt="" class="wl-img-cover"/>
                      </a>
                      <div class="wl-film-info">
                        <div class="wl-film-title">$title</div>
                        <div class="wl-film-rate" style="background-color:$rateColor;">$rating</div>
                      </div>
                    </div>
                    CONTENT;
            echo $card;
        }
      ?>
    </div>
        

    </div>
    </div>
    <footer>
      <div class="container-lg">
        <div class="footer-flex">
          <div class="footer-left">
            <div class="footy-logo">
              <img
                src="../imgs/android-chrome-512x512.png"
                height="50px"
              />&nbsp;
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
              <p class="poem">The film has ended</p>
              <p class="poem">But nobody is leaving</p>
              <p class="poem">Just watching credits!</p>
            </div>
          </div>
          <div class="footer-right">
            <p>SOCIALS</p>
            <a
              href="https://www.linkedin.com/in/chidi-okpara/"
              target="_blank"
              rel="noopener noreferrer"
            >
              <img src="../imgs/linkedin-white.png" height="30px"
            /></a>
            <br />
            <a
              href="https://medium.com/@chidoskii"
              target="_blank"
              rel="noopener noreferrer"
            >
              <img src="../imgs/medium-2.png" height="30px"
            /></a>
          </div>
        </div>
      </div>
    </footer>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
      integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
      integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
