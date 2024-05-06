<?php
require_once("../php/config.php");
require_once("../php/functions.php");

if (isset($_POST["login"])) {
  $login_email = $_POST["user-email"];
  $login_password = $_POST["user-password"];

  if (strlen($login_email) == 0 || strlen($login_password) == 0) {
      $_SESSION["login_error"] = "email and Password cannot be empty.";
  }
  else {
      $db = get_mysqli_connection();
      $query = $db->prepare("SELECT password FROM Users WHERE email = ?");
      $query->bind_param("s",$login_email);
      $query->execute();
      $result = $query->get_result();
      $results = $result->fetch_all(MYSQLI_ASSOC);
      if (count($results) > 0) {
          $hash = $results[0]["password"];

          if (password_verify($login_password,$hash)) {
              $_SESSION["logged_in"] = true;
              $_SESSION["login_email"] = $login_email;

              $user = get_user($login_email);

              if (count($user) > 0){
                  $_SESSION["is_user"] = true;
                  $_SESSION["get_user"] = $user;
                  header("Location: ../index.php");
              }
              else {
                  $_SESSION["is_user"] = false;
              }

          }
          else {
              $_SESSION["login_error"] = "Invalid username and password combination.";
          }
      }
      else {
          $_SESSION["login_error"] = "Invalid username and password combination.";
      }
  }
}

if (isset($_POST["register"])) { 
  $register_user = $_POST['reg-uname'];
  $register_email = $_POST['reg-email'];
  $register_password = $_POST['reg-password'];

  if (strlen($register_user) == 0 || strlen($register_email) == 0 || strlen($register_password) == 0) {
      http_response_code(400);
      $_SESSION["register_error"] = "Missing info in required fields.";
      
  }
  else {
      inputFilter($register_user, $register_email, $register_password); // Sanitizes the string
      if(findUser($register_user) === $register_user) {
          //error
          http_response_code(400);
          $_SESSION["register_error"] = "$register_user has been taken already";
      }
      $check = findEmail($register_email);
      if ($check === $register_email) {
          //error
          http_response_code(400);
          $_SESSION["register_error"] = "This email has already been registered";
      }
      
      // Register user to database
      $password = password_hash($register_password, PASSWORD_DEFAULT);
      $db = get_mysqli_connection();
      $query = $db->prepare("INSERT INTO Users (username, email, password) VALUES (?, ?, ?)");
      $query->bind_param('sss', $register_user, $register_email, $password);
      $query->execute();
      $check = $query->get_result();
      //Test if it sucessfully was entered
      $check = findUser($register_user);
      if ($check === $register_user) {
          //Success
          $_SESSION["user_added"] = "Welcome $register_user";
          echo "User successfuly added";
      }
      else {
          http_response_code(405);
          echo "Failed to add";
      }
      //Log User In
      $user = get_user($register_email);
      $_SESSION["logged_in"] = true;
      $_SESSION["is_user"] = true;
      $_SESSION["get_user"] = $user;
      $_SESSION["login_email"] = $register_email;
      $wl = 'Watchlist';
      $lt = 'watch';
      $userID = getUserId($register_email);
      $query = $db->prepare("Insert Into Lists (u_ID, listName, ltype) Values ( ? , ?, ?)");
      $query->bind_param('iss', $userID, $wl, $lt);
      $query->execute();
      $sl = 'Seenlist';
      $lt = 'seen';
      $query = $db->prepare("Insert Into Lists (u_ID, listName, ltype) Values ( ? , ?, ?)");
      $query->bind_param('iss', $userID, $sl, $lt);
      $query->execute();
      header("Location: ../index.php");
  }
}

//-----------santitize input----------//
function inputFilter(&$register_user, &$register_email, &$register_password) {
  $register_user = filter_var($register_user, FILTER_SANITIZE_STRING);
  $register_email = filter_var($register_email, FILTER_VALIDATE_EMAIL);
  $register_password = filter_var($register_password, FILTER_SANITIZE_STRING);
}

function findUser($register_user) {
  $db = get_mysqli_connection();
  $stmt = $db->prepare( "SELECT username FROM Users WHERE username = ?");
  $stmt->bind_param('s', $register_user);
  $stmt->execute();
  $result = $stmt->get_result();
  $results = $result->fetch_assoc();

  $value = $results["username"];

  return $value;
}

function findEmail($register_email) {
  $db = get_mysqli_connection();
  $query = $db->prepare("SELECT email FROM Users WHERE email = ?");
  $query->bind_param("s", $register_email);
  $query->execute();
  $result = $query->get_result();
  $results = $result->fetch_assoc();

  $value = $results["email"];

  return $value;
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
      href="https://fonts.googleapis.com/css2?family=Fuggles&family=Pixelify+Sans&family=Poppins&family=Monomaniac+One&family=Roboto:wght@400;700&family=Sedgwick+Ave+Display&family=Acme&family=Croissant+One&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <link rel="icon" type="image/x-icon" href="../imgs/favicon2.ico" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    />
    <link rel="stylesheet" href="../styles/style.css" />
    <link rel="stylesheet" href="../styles/creds.css" />
    <link rel="stylesheet" href="../styles/mobile.css" />
    <title>UsherBusser</title>
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
                      <a class="nav-link" href="#">LOG IN</a>
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
                    <li><a class="dropdown-item" href="../pages/preferrences.php">MyProfile Settings</a></li>
                    <li><hr class="dropdown-divider"></li>
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

    <div class="container-md home-content-login">
      <div class="container-can" id="container-can">
        <div class="form-container sign-up">
          <form method='post' action="">
            <h1>Create Account</h1>
            <div class="social-icons">
              <a href="#" class="creds-icon"
                ><i class="fa-brands fa-google-plus-g"></i
              ></a>
              <a href="#" class="creds-icon"
                ><i class="fa-brands fa-facebook-f"></i
              ></a>
              <a href="#" class="creds-icon"
                ><i class="fa-brands fa-github"></i
              ></a>
              <a href="#" class="creds-icon"
                ><i class="fa-brands fa-linkedin-in"></i
              ></a>
            </div>
            <span>or use your email for registration</span>
            <input class="creds-form-inputs" type="text" id="reg-uname" name="reg-uname" placeholder="Username" />
            <input class="creds-form-inputs" type="email" id="reg-email" name="reg-email" placeholder="Email" />
            <input
              class="creds-form-inputs"
              type="password"
              placeholder="Password"
              id="reg-password" name="reg-password"
            />
            <?php
              if (isset($_SESSION["register_error"])) {
                echo $_SESSION["register_error"] . "<br>";
                unset($_SESSION["register_error"]);
                }
          ?>
            <button type="submit" name="register">Sign Up</button>
          </form>
        </div>
        <div class="form-container sign-in">
          <form method='post' action="">
            <h1>Sign In</h1>
            <div class="social-icons">
              <a href="#" class="creds-icon"
                ><i class="fa-brands fa-google-plus-g"></i
              ></a>
              <a href="#" class="creds-icon"
                ><i class="fa-brands fa-facebook-f"></i
              ></a>
              <a href="#" class="creds-icon"
                ><i class="fa-brands fa-github"></i
              ></a>
              <a href="#" class="creds-icon"
                ><i class="fa-brands fa-linkedin-in"></i
              ></a>
            </div>
            <span>or use your email and password</span>
            <input class="creds-form-inputs" type="email" id="user-email" name="user-email" placeholder="Email" />
            <input
              class="creds-form-inputs"
              type="password"
              id="user-password" name="user-password"
              placeholder="Password"
            />
            <?php
              if (isset($_SESSION["login_error"])) {
                echo $_SESSION["login_error"] . "<br>";
                unset($_SESSION["login_error"]);
                }
          ?>
            <a href="#">Forgot Password?</a>
            <button type="submit" name="login">Sign In</button>
          </form>
        </div>
        <div class="toggle-container">
          <div class="toggle">
            <div class="toggle-panel toggle-left">
              <h1>Welcome Back!</h1>
              <p>Enter your credentials</p>
              <button class="hidden" id="login">Sign In</button>
            </div>
            <div class="toggle-panel toggle-right">
              <h1>Hello, Stranger!</h1>
              <p>Join UsherBusser today</p>
              <button class="hidden" id="register" >Sign Up</button>
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
              <p class="poem">Whenever I'm bored</p>
              <p class="poem">I find myself logging in</p>
              <p class="poem">To leave a review</p>
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
    <script src="../scripts/creds.js"></script>
  </body>
</html>
