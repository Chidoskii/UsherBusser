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
$rand1 = rand(1000, 15000);
$rand2 = rand(25000, 100000);
$rand3 = $rand2 - $rand1;
$total_hours = 0;

if (isset($_POST["newShift"])) {
  $shiftStart = $_POST["shiftStart"];
  echo $shiftStart;
  $shiftEnd = $_POST["shiftEnd"];
  
  
  $db = get_mysqli_connection();
  $query = $db->prepare("INSERT INTO Shifts (s_ID, u_ID, startTime, endTime) VALUES (?,?,?,?)");
  $query->bind_param("iiss", $rand3,$wtf,$shiftStart,$shiftEnd);
  $result = $query->execute();
}

$today = date_create(date("Y/m/d"));
$changeup = $today;
$today = date_format($today,"Y-m-d");
date_sub($changeup, date_interval_create_from_date_string("14 days"));
$date = date_format($changeup,"Y-m-d");

$shifts = getUserShifts($wtf, $date, $today);
if (!empty($shifts)) {
  foreach ($shifts as $key => $value) {
    
    $startingTime = date_create($value['startTime']);
    $endingTime = date_create($value['endTime']);
    $hours = date_diff($endingTime, $startingTime);
    $hours = $hours->format("%h");
    $total_hours = $total_hours + $hours;
  }
}

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
    <link rel="stylesheet" href="../styles/style.css" />
    <link rel="stylesheet" href="../styles/mobile.css" />
    <title>Time Card | UsherBusser</title>
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
              <a class="nav-link" href="#">TIME CARD</a>
            </li>
            <li class="nav-item subnav">
              <a class="nav-link" href="./reviews.php">REVIEWS</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-lg home-content">
      <div class="shifts-content-can">
        <div class="shifts-page-section-can">
          <h1 class="work-title">WORK SCHEDULE</h1>
          <div class="sched-stats">
            You got <span class="money-money"><?php echo $total_hours; ?></span> hrs on the books.
          </div>
          <?php
            $pay = $total_hours * 16;
          ?>
          <div class="sched-stats">
            You can expect <span class="money-money">$<?php echo $pay; ?></span> on your next check.
          </div>
        
          <div class="shifts-can">
          <?php

            if (!empty($shifts)) {
              foreach ($shifts as $key => $value) {
                
                $startingTime = date_create($value['startTime']);
                $startTime = date_format($startingTime, 'h:i A');
                $startDate = date_format($startingTime, 'D, F jS');
                $endingTime = date_create($value['endTime']);
                $endTime = date_format($endingTime, 'h:i A');
                $hours = date_diff($endingTime, $startingTime);
                $hours = $hours->format("%h");

                $card = <<<CONTENT
                    <div class="shift-info-can">
                      <div class="shift-card-title">
                        $startDate | $hours hrs
                      </div>  
                      <div class="shift-time-can">
                        <div class="time-label">Start</div>
                        <div class="shift-time">$startTime</div>
                      </div>
                      <div class="shift-time-can">
                        <div class="time-label">End</div>
                        <div class="shift-time">$endTime</div>
                      </div>
                    </div>
                    CONTENT;
                  echo $card;
                }
              } else {
                $card = <<<CONTENT
                    <div class="no-bread-can">
                      You ain't gettin no bread, fam!
                    </div>
                    CONTENT;
                  echo $card;
              }
            
          ?>
          </div>

        </div>
        <div class="add-shift-page-section-can">
          <div class="add-shift-form">
          <h1 class="add-shift-title">ADD NEW SHIFT</h1>
          <?php
            $shift_form = new PhpFormBuilder();
            $shift_form->set_att("method", "POST");
            $shift_form->add_input("Start", array(
                "type" => "datetime-local",
                "class" => array("add-shift-field"),
                "required" => true
            ), "shiftStart");
            $shift_form->add_input("End", array(
                "type" => "datetime-local",
                "required" => true
            ), "shiftEnd");
            $shift_form->add_input("newShift", array(
                "type" => "submit",
                "class" => array("btn btn-dark add-shift-btn"),
                "value" => "ADD"
            ), "newShift");
            $shift_form->build_form();

            if (isset($_SESSION["shift_error"])) {
                echo $_SESSION["shift_error"] . "<br>";
                unset($_SESSION["shift_error"]);
            }
          ?>
          </div>
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
              <p class="poem">Need a vacation</p>
              <p class="poem">But I need money for that</p>
              <p class="poem">Ugggh, need more hours!</p>
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
    <script src="../scripts/timecard.js"></script>
  </body>
</html>
