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
    <link rel="icon" type="image/x-icon" href="../../../imgs/favicon2.ico" />
    <link rel="stylesheet" href="../styles/style.css" />
    <title>Time Card | UsherBusser</title>
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
                <a class="nav-link" href="./login.php">LOG IN</a>
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
              <a class="nav-link" href="#">TIME CARD</a>
            </li>
            <li class="nav-item subnav">
              <a class="nav-link" href="./critiques.php">REVIEWS</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-lg home-content">
      <div class="page-section">
        <h1 id="worksched">WORK SCHEDULE</h1>
        <br />
        <br />
        <iframe
          src="https://calendar.google.com/calendar/embed?height=600&wkst=1&bgcolor=%23ffffff&ctz=America%2FLos_Angeles&showPrint=0&src=MDM1ZDRkMmYyMjFjZmViY2NjYWE0ZGNjZTY4ZjAyZWU0ZWFiYzZhMzBiNDE1OGVkZTAzZTVmNDQyNWM5ODMyOUBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=ZW4udXNhI2hvbGlkYXlAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&color=%23EF6C00&color=%23A79B8E"
          style="border: solid 1px #777"
          width="800"
          height="600"
          frameborder="0"
          scrolling="no"
        ></iframe>
      </div>
      <div class="page-section">
        <h1 id="tcard">TIME CARD</h1>
        <div id="container">
          <div id="contents">
            <form action="#tcard" autocomplete="on">
              <div class="groupings">
                <label for="amount">Hours: </label>
                <input type="number" id="amount" name="hours" required />
              </div>
              <div class="groupings">
                <label for="rate-options">Pay Rate: </label>
                <select id="rate-options" name="rate" required>
                  <option value="16.50" selected>16.50</option>
                  <option value="17.00">17.00</option>
                  <option value="17.50">17.50</option>
                  <option value="18.00">18.00</option>
                  <option value="19.00">19.00</option>
                  <option value="20.00">20.00</option>
                  <option value="21.00">21.00</option>
                  <option value="22.00">22.00</option>
                </select>
              </div>
              <br />
              <br />
              <div id="actions">
                <input type="submit" value="Calculate" />
                <input type="reset" value="Clear" onclick="clearValue()" />
              </div>
            </form>
          </div>
          <div id="output" class="empty"></div>
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
