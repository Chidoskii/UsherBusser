<?php
require_once("../php/config.php");
require_once("../php/functions.php");

$modalPlaceholder = "How was the movie?";
$giverating =  <<<END
                  <span class="material-symbols-outlined cp-rating-star mso-icon" id="rating-btn" onclick="rateToggle()">
                  star_rate
                  </span>
                  END;
$mgiverating =  <<<END
                  <span class="material-symbols-outlined cp-rating-star mso-icon" id="rating-btn" onclick="rateToggler()">
                  star_rate
                  </span>
                  END;
$onthelist = <<<CONTENT
                  <form method="post" class="form-bane" action="">
                    <button type="submit" name="removewatch" class="btn btn-dark wl-form-btn">
                      <span class="material-symbols-outlined mso-icon on-the-list">
                        playlist_add_check
                      </span> 
                    </button>
                  </form>
                  CONTENT;
$notonthelist = <<<CONTENT
                  <form method="post" class="form-bane" action="">
                    <button type="submit" name="watchlist" class="btn btn-dark wl-form-btn"> 
                      <span class="material-symbols-outlined mso-icon" id="watchlist-btn">
                        list_alt_add
                      </span>
                    </button>
                  </form>
                  CONTENT;
$seenit = <<<CONTENT
                  <form method="post" class="form-bane" action="">
                    <button type="submit" name="removeseen" class="btn btn-dark wl-form-btn">
                      <span class="material-symbols-outlined mso-icon on-the-list">
                        visibility
                      </span> 
                    </button>
                  </form>
                  CONTENT;
$didnotseeit = <<<CONTENT
                  <form method="post" class="form-bane" action="">
                    <button type="submit" name="seenlist" class="btn btn-dark wl-form-btn"> 
                      <span class="material-symbols-outlined mso-icon" id="seenlist-btn">
                        visibility_off
                      </span>
                    </button>
                  </form>
                  CONTENT;
$reviewedit = <<<CONTENT
                    <button type="submit" name="review" class="btn btn-dark wl-form-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      <span class="material-symbols-outlined mso-icon on-the-list" id="review-btn">
                        history_edu
                      </span>
                    </button>
             
                  CONTENT;
$nocomment = <<<CONTENT
                    <button type="submit" name="review" class="btn btn-dark wl-form-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      <span class="material-symbols-outlined mso-icon" id="review-btn">
                        history_edu
                      </span>
                    </button>
                  CONTENT;

if (isset($_SESSION["login_email"])){
  $wtf = getUserId($_SESSION["login_email"]);
  $watchID = getWatchlistId($wtf);
  $seenID = getSeenlistId($wtf);
}
$critic = "";
$nod = "";
$mID = "";
$deets = "";
$similar = "";
$cast = "";
$videos = "";
$filler = "../imgs/filler.jpg";
$filler2 = "../imgs/mona.jpg";
$youtube = "https://www.youtube.com/embed/";
$config = configsTMDB();
$poster_base = $config['images']['secure_base_url'] . $config['images']['poster_sizes'][4];
$backdrop_base = $config['images']['secure_base_url'] . $config['images']['backdrop_sizes'][3];
$backdrop_base_small = $config['images']['secure_base_url'] . $config['images']['backdrop_sizes'][1];
$poster = "";
$backdrop = "";
$backdrop_small = "";
$rateColor = "rgb(240, 240, 240)";


  if (isset($_GET["mid"])){
    $mID = $_GET["mid"];
    if (isset($_SESSION["login_email"])){
      $db = get_mysqli_connection();
      $query = $db->prepare("SELECT * FROM Ratings WHERE mID = ? and uID = ?");
      $query->bind_param("ii", $mID, $wtf);
      $query->execute();
      $result = $query->get_result();
      $myratings = $result->fetch_all(MYSQLI_ASSOC);
      $reviewContent = getReviewContent($wtf, $mID);
      if ($reviewContent != "empty") {
        $modalPlaceholder = $reviewContent;
      }
    }
    $deets = getMovieDeets($TMDB_API_KEY, $mID);
    $similar = getSimilarMovies($TMDB_API_KEY, $mID);
    $cast = getCast($TMDB_API_KEY, $mID);
    $videos = getVideos($TMDB_API_KEY, $mID);
    $poster =  $poster_base . $deets['poster_path'];
    $backdrop =  $backdrop_base . $deets['backdrop_path'];
    $backdrop_small =  $backdrop_base_small . $deets['backdrop_path'];
  }
if (isset($_SESSION["login_email"])){
  if(isset($_POST['myrate'])) {
    $myrating = number_format($_POST["rating"],1);
    $db = get_mysqli_connection();
    $query = $db->prepare("INSERT INTO Ratings (mID, uID, rating) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE rating = ?");
    $query->bind_param('iidd', $mID, $wtf, $myrating, $myrating);
    $query->execute();
    $query = $db->prepare("SELECT * FROM Ratings WHERE mID = ? and uID = ?");
    $query->bind_param("ii", $mID, $wtf);
    $query->execute();
    $result = $query->get_result();
    $myratings = $result->fetch_all(MYSQLI_ASSOC);
  }

  if(isset($_POST['watchlist'])) {
    $db = get_mysqli_connection();
    $query = $db->prepare("INSERT INTO List_Items (mID, lID) VALUES (?, ?) ON DUPLICATE KEY UPDATE mID = ?");
    $query->bind_param('iii', $mID, $watchID, $mID);
    if(!$query->execute()) {
      header("Location: ./pages/critiques.php?mid=$mID");
    };
  }

  if(isset($_POST['removewatch'])) {
    $db = get_mysqli_connection();
    $query = $db->prepare("DELETE FROM List_Items where mID = ? and lID = ?");
    $query->bind_param('ii', $mID, $watchID);
    $query->execute();
  }

  if(isset($_POST['removeseen'])) {
    $db = get_mysqli_connection();
    $query = $db->prepare("DELETE FROM List_Items where mID = ? and lID = ?");
    $query->bind_param('ii', $mID, $seenID);
    $query->execute();
  }

  if(isset($_POST['seenlist'])) {
    $db = get_mysqli_connection();
    $query = $db->prepare("INSERT INTO List_Items (mID, lID) VALUES (?, ?) ON DUPLICATE KEY UPDATE mID = ?");
    $query->bind_param('iii', $mID, $seenID, $mID);
    $query->execute();
  }

  if(isset($_POST['critic'])) {
    $critic = trim($_POST["review"], " ");
    if (isset($_POST['nod'])){ 
      $nod = $_POST["nod"];
      $db = get_mysqli_connection();
      $query = $db->prepare("INSERT INTO Reviews (u_ID, mID, critique, NOD) VALUES (?,?,?,?) ON DUPLICATE KEY UPDATE critique = ?, NOD = ?");
      $query->bind_param('iisisi', $wtf, $mID, $critic, $nod, $critic, $nod);
      $query->execute();
    }
  }
}

$reviewPlaceholder = <<<CONTENT
                  <textarea id="modal-review-space" name="review" cols="50" placeholder="$modalPlaceholder"></textarea>
           
                CONTENT;
$revision = <<<CONTENT
                  <textarea id="modal-review-space" name="review" cols="50">$modalPlaceholder</textarea>
                CONTENT;

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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="icon" type="image/x-icon" href="../imgs/favicon2.ico" />
    <link rel="stylesheet" href="../styles/reel.css">
    <link rel="stylesheet" href="../styles/movie.css">
    <link rel="stylesheet" href="../styles/vreel.css" />
    <link rel="stylesheet" href="../styles/style.css" />
    <link rel="stylesheet" href="../styles/mobile.css" />
    <title><?= $deets['title'] ?> | UsherBusser</title>
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
              <a class="nav-link" href="./reviews.php">REVIEWS</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    

    <div class="backdrop-showcase" style="background-image: url(<?php echo $backdrop; ?>)">
      <div class="film-package">
        <div class="film-cover-image-can"><img class="movie-cover-img" src="<?php echo $poster; ?>" /></div>
        <div class="mp-film-bd-info">
          <h1 class="mp-film-title"><?php echo $deets['title']; ?></h1>
          <p class="mp-film-desc"><?php echo $deets['overview']; ?></p>

          <div class="mp-all-opts-can">
            <div class="rate-slider-can hideme" id="rate-slider-can">
            <label for="mp-rate-slider" class="form-label rate-slider-label">Scale: 0 - 10</label>
            <div class="slider-deets">
              <form method="post" action="" class="rate-form">
                <output class="star-track">0</output>
                <span class="material-symbols-outlined grade-star">
                  grade
                </span>
              <input type="range" class="form-range" min="0" max="10" step="0.1" id="mp-rate-slider" name="rating" oninput="this.previousElementSibling.previousElementSibling.value = this.value">
              <button type="submit" name="myrate" class="btn btn-success rate-check-btn">
                <span class="material-symbols-outlined">
                  check_small
                </span>
              </button>
              </form>
            </div>
          </div>

            <div class="mp-film-opts-can">
              <div class="mp-film-opts rating">
                <div class="mp-film-opts-hdr ">TMDB RATING</div>
                <div class="mp-film-opts-item tmdb-rating"><?php echo number_format($deets['vote_average'], 1); ?>/10</div>
              </div>
              <div class="mp-film-opts rating">
                <div class="mp-film-opts-hdr ">YOUR RATING</div>
                <div class="mp-film-opts-item tmdb-rating">
                <?php
                if (isset($_SESSION["login_email"])){
                  if (count($myratings) > 0) {
                    echo "<div onclick='rateToggle()'>";
                    echo number_format($myratings[0]['rating'], 1) . "/10"; 
                    echo "</div>";
                  }
                  else {
                    echo $giverating;
                  }
                }
                     else {
                      echo $giverating;
                    }
                  ?>
                </div>
              </div>
              <div class="mp-film-opts">
                <div class="mp-film-opts-hdr">REVIEW</div>
                <div class="mp-film-opts-item">
                  <?php
                      if (isset($_SESSION["login_email"])){
                        if (isReviewed($wtf, $mID)) {
                          echo $reviewedit; 
                        }else {
                          echo $nocomment;
                        }
                      } else {
                        echo $nocomment;
                      }
                    ?>
                </div>
              </div>
              <div class="mp-film-opts">
                <div class="mp-film-opts-hdr">SEENLIST</div>
                <div class="mp-film-opts-item">
                  <?php
                    if (isset($_SESSION["login_email"])){
                      if (onSeenlist($seenID, $mID)) {
                        echo $seenit; 
                      }else {
                        echo $didnotseeit;
                      }
                    } else {
                      echo $didnotseeit;
                    }
                  ?>
                  
                </div>
              </div>
              <div class="mp-film-opts">
                <div class="mp-film-opts-hdr">WATCHLIST</div>
                <div class="mp-film-opts-item">
                  <?php
                    if (isset($_SESSION["login_email"])){
                      if (onWatchlist($watchID, $mID)) {
                        echo $onthelist; 
                      }else {
                        echo $notonthelist;
                      }
                    } else {
                      echo $notonthelist;
                    }
                  ?>
                  
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="backdrop-showcase-mobile" style="background-image: url(<?php echo $backdrop_small; ?>)">
      <div class="film-package">
        <div class="film-cover-image-can"><img class="movie-cover-img" src="<?php echo $poster; ?>" /></div>
        <div class="mp-film-bd-info">
          <h1 class="mp-film-title"><?php echo $deets['title']; ?></h1>
          <p class="mp-film-desc"><?php echo $deets['overview']; ?></p>
        <div class="mp-opts-grouping">
          <div class="rate-slider-can hideme" id="rate-range-can-mobile">
              <label for="rateRange" class="form-label star-form-label">Scale: 0 - 10</label>
              <div class="slider-deets">
                <form method="post" action="" class="rate-form">
                  <output class="star-track">0</output>
                  <span class="material-symbols-outlined grade-star">
                    grade
                  </span>
                <input type="range" class="form-range" min="0" max="10" step="0.1" id="mp-rate-slider" name="rating" oninput="this.previousElementSibling.previousElementSibling.value = this.value">
                <button type="submit" name="myrate" class="btn btn-success rate-check-btn">
                  <span class="material-symbols-outlined">
                    check_small
                  </span>
                </button>
                </form>
              </div>
          </div>
          <div class="mp-film-opts-can">
                <div class="mp-film-opts rating">
                  <div class="mp-film-opts-hdr ">TMDB RATING</div>
                  <div class="mp-film-opts-item tmdb-rating"><?php echo number_format($deets['vote_average'], 1); ?>/10</div>
                </div>
                <div class="mp-film-opts rating">
                  <div class="mp-film-opts-hdr ">YOUR RATING</div>
                  <div class="mp-film-opts-item tmdb-rating">
                  <?php
                  if (isset($_SESSION["login_email"])){
                    if (count($myratings) > 0) {
                      echo "<div onclick='rateToggler()'>";
                      echo number_format($myratings[0]['rating'], 1) . "/10"; 
                      echo "</div>";
                    }
                    else {
                      echo $mgiverating;
                    }
                  }
                      else {
                        echo $mgiverating;
                      }
                    ?>
                  </div>
                </div>
                <div class="mp-film-opts">
                  <div class="mp-film-opts-hdr">REVIEW</div>
                  <div class="mp-film-opts-item">
                    <?php
                        if (isset($_SESSION["login_email"])){
                          if (isReviewed($wtf, $mID)) {
                            echo $reviewedit; 
                          }else {
                            echo $nocomment;
                          }
                        } else {
                          echo $nocomment;
                        }
                      ?>
                  </div>
                </div>
                <div class="mp-film-opts">
                  <div class="mp-film-opts-hdr">SEENLIST</div>
                  <div class="mp-film-opts-item">
                    <?php
                      if (isset($_SESSION["login_email"])){
                        if (onSeenlist($seenID, $mID)) {
                          echo $seenit; 
                        }else {
                          echo $didnotseeit;
                        }
                      } else {
                        echo $didnotseeit;
                      }
                    ?>
                    
                  </div>
                </div>
                <div class="mp-film-opts">
                  <div class="mp-film-opts-hdr">WATCHLIST</div>
                  <div class="mp-film-opts-item">
                    <?php
                      if (isset($_SESSION["login_email"])){
                        if (onWatchlist($watchID, $mID)) {
                          echo $onthelist; 
                        }else {
                          echo $notonthelist;
                        }
                      } else {
                        echo $notonthelist;
                      }
                    ?>
                    
                  </div>
                </div>
              </div>
            </div>

            </div>
        </div>
        </div>
      </div>
    </div>
    <div class="moviepage-contents container">

        <div class="mp-video-section">
          <h1 class="mp-section-hdr">Videos</h1>
          <div class="mp-videos-can">

          <?php
                if (!empty($videos['results'])) {
                  foreach ($videos as $key => $link) {
                    if ($key == "results") {
                      foreach ($link as $key => $value) {
                        $site = $value['site'];
                        $source = $value['key'];
                        $type = $value['type'];
                        $url = $youtube . $source;
                        
                        $card = <<<CONTENT
                        <iframe class="embed-vid" width="420" height="315"
                          src="$url">
                        </iframe>
                        <br>
                        CONTENT;
                      echo $card;
                      }
                    }
                  }
                } else {
                  echo "<p>There are no videos, unfortunately.</p><br>";
                }
              ?> 
          </div>
        </div>


        <div class="reel-container">
        <h2 class="movie-reel-title">Cast</h2>
        <br>
          <div class="slider-wrapper">
            <button id="prev-slide" class="slide-button material-symbols-rounded">
            <img src="../imgs/reel/chev-left.png" alt="..." class="chevy" />
            </button>
            <ul class="credits-list">
              <?php
                foreach ($cast as $key => $person) {
                  if ($key == "cast") {
                    foreach ($person as $key => $value) {
                      $id = $value['id'];
                      $name = $value['name'];
                      $role = $value['known_for_department'];
                      $img = $poster_base . $value['profile_path'];
                      $fame = number_format($value['popularity'],1);

                      if ($fame > 99) {
                        $rateColor = "#93FFCD";
                      }
                      if ($fame < 99) {
                        $rateColor = "#FFE38E";
                      }
                      if ($fame < 35) {
                        $rateColor = "#FFBBB9";
                      }

                      if ($img == $poster_base) {
                        $img = $filler;
                      }
                      
                      $card = <<<CONTENT
                      <div class="film-info-can">  
                        <img class="image-item" src="$img" alt="Yikes!" />
                        <div class="film-details">
                          <div class="film-desc-deets">
                            <a class="film-title-link" href="#" rel="noopener noreferrer">
                              <p class="img-reel-film-title">$name</p>
                            </a>
                            <p class="img-reel-film-genre">Role: $role</p>
                          </div>
                          <div class="film-ratings-deets">
                            <p class="img-reel-ratings-title">Fame</p>
                            <div class="img-reel-rating-can">
                              <p class="img-reel-ratings">$fame</p>
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
              <img src="../imgs/reel/chev-right.png" alt="..." class="chevy" />
            </button>
          </div>
          <div class="slider-scrollbar">
            <div class="scrollbar-track">
              <div class="scrollbar-thumb"></div>
            </div>
          </div>
        </div>

        <div class="reel-container">
        <h2 class="movie-reel-title">Similar</h2>
        <br>
          <div class="slider-wrapper">
            <button id="new-prev-slide" class="nr-slide-button material-symbols-rounded">
            <img src="../imgs/reel/chev-left.png" alt="..." class="chevy" />
            </button>
            <ul class="new-r-image-list">
              <?php
                foreach ($similar as $key => $movie) {
                  if ($key == "results") {
                    foreach ($movie as $key => $value) {
                      $id = $value['id'];
                      $temp = $value['original_title'];
                      $title = '"'. $temp . '"';
                      $release = $value['release_date'];
                      $date = date_create($release);
                      $format = date_format($date, 'F jS Y');
                      $img = $poster_base . $value['poster_path'];
                      $rating = number_format($value['vote_average'],1);

                      if ($rating > 7.4) {
                        $rateColor = "#93FFCD";
                      }
                      if ($rating < 7.5) {
                        $rateColor = "#FFE38E";
                      }
                      if ($rating < 5.6) {
                        $rateColor = "#9FFBBB9";
                      }
                      if ($rating == 0.0) {
                        $rateColor = "rgb(240, 240, 240)";
                      }

                      if ($img == $poster_base) {
                        $img = $filler2;
                      }
                      
                      $card = <<<CONTENT
                      <div class="film-info-can">  
                        <img class="image-item" src="$img" alt="Yikes!" />
                        <div class="film-details">
                          <div class="film-desc-deets">
                            <a class="film-title-link" href="./critiques.php?mid=$id" rel="noopener noreferrer">
                            <p class="img-reel-film-title">$title</p>
                            </a>
                            <p class="img-reel-film-genre">Realesed: $format</p>
                          </div>
                          <div class="film-ratings-deets">
                            <p class="img-reel-ratings-title">Rating</p>
                            <div class="img-reel-rating-can">
                              <p class="img-reel-ratings">$rating</p>
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
              <img src="../imgs/reel/chev-right.png" alt="..." class="chevy" />
            </button>
          </div>
          <div class="nr-slider-scrollbar">
            <div class="scrollbar-track">
              <div class="nr-scrollbar-thumb"></div>
            </div>
          </div>
        </div>
  
                <!-- Modal -->
        <form method="post" action="">
        <div class="modal fade review-modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Write a Review</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <?php
                if (isset($_SESSION["login_email"])){
                  if (isReviewed($wtf, $mID)){
                    echo $revision;
                  } else {
                    echo $reviewPlaceholder;
                  }
                  $card = <<<BODY
                            <div class="recc-secc">
                            <p class="rec-ques">Would you recommend?</p>
                            <input type="radio" class="radio-btns" id="hellya" name="nod" value="1">
                            <label for="hellya">Yes</label>
                            <input type="radio" class="radio-btns" id="hellno" name="nod" value="0">
                            <label for="hellno">No</label>
                          </div>
                          BODY;

                          echo $card;

                } else {
                  $card = <<<BODY
                            <div class="">
                            You need to login or create an account.
                            <br>
                            <br>
                            <button type="button" class="btn mp-register-btn" data-bs-toggle="modal" data-bs-target="#signinModal">LOGIN</button>
                            </div>
                          BODY;

                          echo $card;
                }
                ?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="critic" class="btn btn-dark">Save changes</button>
              </div>
            </div>
          </div>
        </div>
        </form>

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
                alt="..."
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
              <p class="poem">What is a footer</p>
              <p class="poem">Without a decent haiku?</p>
              <p class="poem">Insignificant!</p>
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
    <script src="../scripts/mp-slide.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="../scripts/vreel.js"></script>
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
