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
    <link rel="icon" type="image/x-icon" href="../../../imgs/favicon2.ico" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    />
    <link rel="stylesheet" href="../styles/style.css" />
    <link rel="stylesheet" href="../styles/creds.css" />
    <title>UsherBusser</title>
  </head>
  <body>
    <nav class="navbar fixed-top bg-dark navbar-dark navcan">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="../home.php"
            ><img src="../imgs/ub-logo.png" alt="" height="50px" /> USHER
            BUSSER</a
          >
        </div>

        <div class="topnav-links">
          <div class="creds">
            <ul class="navbar-nav tl-links">
              <li class="nav-item login">
                <a class="nav-link" href="#">LOG IN</a>
              </li>
              <li class="nav-item signup">
                <a class="nav-link" href="./login.php">SIGN UP</a>
              </li>
            </ul>
          </div>

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
              <a class="nav-link" href="../home.php">HOME</a>
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
              <a class="nav-link" href="./critiques.php">REVIEWS</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-md home-content-login">
      <div class="container-can" id="container-can">
        <div class="form-container sign-up">
          <form action="">
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
            <input class="creds-form-inputs" type="text" placeholder="Name" />
            <input class="creds-form-inputs" type="email" placeholder="Email" />
            <input
              class="creds-form-inputs"
              type="password"
              placeholder="Password"
            />
            <button>Sign Up</button>
          </form>
        </div>
        <div class="form-container sign-in">
          <form action="">
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
            <input class="creds-form-inputs" type="email" placeholder="Email" />
            <input
              class="creds-form-inputs"
              type="password"
              placeholder="Password"
            />
            <a href="#">Forgot Password?</a>
            <button>Sign In</button>
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
              <button class="hidden" id="register">Sign Up</button>
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
                src="../../../imgs/android-chrome-512x512.png"
                height="50px"
              />&nbsp;
              <p class="name-footer">CHIDOSKII</p>
            </div>
            <br />
            <p>CMPS 2680 Web Programming <br />Final Project</p>
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
