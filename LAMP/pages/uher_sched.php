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
    <title>Schedule | UsherBusser</title>
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
              <a class="nav-link" href="#">SCHEDULE</a>
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

    <div class="container-lg usher-content">
      <h1 id="ushyschedy">USHER SCHEDULE</h1>
      <div class="usher-sched">
        <div id="user-theatre-list">
          <ul class="list-group list-group-horizontal">
            <li class="list-group-item entry-number">
              <img src="../imgs/trash-svgrepo-com.png" alt="" height="20px" />
            </li>
            <li class="list-group-item entry-time">Time</li>
            <li class="list-group-item flex-fill">Movie</li>
            <li class="list-group-item entry-aud">AUD</li>
            <li class="list-group-item entry-rows">Rows</li>
            <li class="list-group-item entry-status">Status</li>
          </ul>
        </div>
        <ul id="new-entry-0" class="list-group list-group-horizontal"></ul>
        <ul id="new-entry-1" class="list-group list-group-horizontal"></ul>
        <ul id="new-entry-2" class="list-group list-group-horizontal"></ul>
        <ul id="new-entry-3" class="list-group list-group-horizontal"></ul>
        <ul id="new-entry-4" class="list-group list-group-horizontal"></ul>
        <ul id="new-entry-5" class="list-group list-group-horizontal"></ul>
        <ul id="new-entry-6" class="list-group list-group-horizontal"></ul>
        <ul id="new-entry-7" class="list-group list-group-horizontal"></ul>
        <ul id="new-entry-8" class="list-group list-group-horizontal"></ul>
        <ul id="new-entry-9" class="list-group list-group-horizontal"></ul>
        <ul id="new-entry-10" class="list-group list-group-horizontal"></ul>
        <ul id="new-entry-11" class="list-group list-group-horizontal"></ul>
        <ul id="new-entry-12" class="list-group list-group-horizontal"></ul>
        <ul id="new-entry-13" class="list-group list-group-horizontal"></ul>
        <ul id="new-entry-14" class="list-group list-group-horizontal"></ul>
        <br />
        <br />
        <div class="btns-flexcan">
          <button
            type="button"
            class="btn btn-secondary sched-option open-button"
            onclick="openForm()"
          >
            ADD
          </button>
          <button
            type="button"
            class="btn btn-secondary sched-option open-button"
            onclick="resetEntry()"
          >
            RESET
          </button>
        </div>
      </div>
      <div id="sched-form" class="form-popup">
        <form
          action="./uher_sched.php"
          class="form-container"
          autocomplete="on"
        >
          <h3 class="form-headie">ADD AN ENTRY</h3>
          <div class="groupings">
            <label for="endtime">Time: </label>
            <input type="time" id="endtime" name="time" required />
          </div>
          <br />
          <div class="groupings">
            <label for="filmName">Movie: </label>
            <select id="filmName" name="movie">
              <option value="A Good Film" selected>-title-</option>
              <option value="Color Purple">The Color Purple</option>
              <option value="Godzilla -1">Godzilla Minus One</option>
              <option value="Wonka">Wonka</option>
              <option value="Iron Claw">The Iron Claw</option>
              <option value="Aquaman 2">Aquaman and the Lost Kingdom</option>
              <option value="Migration">Migration</option>
              <option value="Boys in Boat">The Boys in the Boat</option>
              <option value="Anyone But You">Anyone But You</option>
              <option value="Boy & Heron">The Boy and the Heron</option>
              <option value="Hunger Games">The Hunger Games</option>
              <option value="Napoleon">Napoleon</option>
              <option value="Wish">Wish</option>
              <option value="Reissue">Reissue</option>
            </select>
          </div>
          <br />
          <div class="groupings">
            <label for="room">Auditorium: </label>
            <select id="room" name="aud" required>
              <option value="" disabled selected>-aud-</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
            </select>
          </div>
          <br />
          <div class="groupings">
            <label for="seats">Rows: </label>
            <select id="seats" name="rows">
              <option value="" disabled selected>-rows-</option>
              <option value="A↑">A &uarr;</option>
              <option value="B↑">B &uarr;</option>
              <option value="C↑">C &uarr;</option>
              <option value="D↑">D &uarr;</option>
              <option value="E↑">E &uarr;</option>
              <option value="F↑">F &uarr;</option>
              <option value="G↑">G &uarr;</option>
              <option value="H↑">H</option>
            </select>
          </div>
          <br /><br />
          <div id="actions">
            <input type="submit" value="Submit" class="btn" />
            <input
              type="reset"
              value="Close"
              class="btn cancel"
              onclick="closeForm()"
            />
          </div>
        </form>
      </div>

      <div id="reset-form" class="form-popup">
        <form
          action="./uher_sched.php"
          class="form-container"
          autocomplete="on"
          onsubmit="resetSchedule()"
        >
          <h3 class="form-headie">RESET SCHEDULE?</h3>
          <br />
          <div id="actions">
            <input type="submit" value="YES" class="btn" />
            <input
              type="reset"
              value="NO"
              class="btn cancel"
              onclick="cancelReset()"
            />
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
    <script src="../scripts/schedule.js" defer></script>
  </body>
</html>
