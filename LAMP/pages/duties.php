<?php
require_once("../php/config.php");

if(empty($_SESSION["logged_in"])){
  header("location: ./login.php");
}

if($_SESSION["logged_in"] == false){
  header("location: ./login.php");
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
    <title>Duties | UsherBusser</title>
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

    <div class="container-md home-content">
      <br />
      <h1>OPENING DUTIES</h1>
      <div class="container-lg">
        <div id="user-theatre-list">
          <ul class="list-group list-group-horizontal">
            <li class="list-group-item flex-fill">Task</li>
            <li class="list-group-item entry-status">Status</li>
          </ul>
          <ul class="new-entry-a list-group list-group-horizontal">
            <li class="list-group-item flex-fill">Restroom Drainage</li>
            <li class="list-group-item entry-status">
              <button
                type="button"
                id="duties-status-0"
                onclick="statusToggle(this.id)"
                class="btn btn-secondary open"
              >
                open
              </button>
            </li>
          </ul>
          <ul class="new-entry-b list-group list-group-horizontal">
            <li class="list-group-item flex-fill">
              Dust chairs in rows: A, B, C, D
            </li>
            <li class="list-group-item entry-status">
              <button
                type="button"
                id="duties-status-1"
                onclick="statusToggle(this.id)"
                class="btn btn-secondary open"
              >
                open
              </button>
            </li>
          </ul>
          <ul class="new-entry-a list-group list-group-horizontal">
            <li class="list-group-item flex-fill">Stock janitor closet</li>
            <li class="list-group-item entry-status">
              <button
                type="button"
                id="duties-status-2"
                onclick="statusToggle(this.id)"
                class="btn btn-secondary open"
              >
                open
              </button>
            </li>
          </ul>
          <ul class="new-entry-b list-group list-group-horizontal">
            <li class="list-group-item flex-fill">Wipe Trash Can Rims</li>
            <li class="list-group-item entry-status">
              <button
                type="button"
                id="duties-status-3"
                onclick="statusToggle(this.id)"
                class="btn btn-secondary open"
              >
                open
              </button>
            </li>
          </ul>
          <ul class="new-entry-a list-group list-group-horizontal">
            <li class="list-group-item flex-fill">
              Wipe Arcade & Vending Machines
            </li>
            <li class="list-group-item entry-status">
              <button
                type="button"
                id="duties-status-4"
                onclick="statusToggle(this.id)"
                class="btn btn-secondary open"
              >
                open
              </button>
            </li>
          </ul>
          <ul class="new-entry-b list-group list-group-horizontal">
            <li class="list-group-item flex-fill">Turn off mop sinks</li>
            <li class="list-group-item entry-status">
              <button
                type="button"
                id="duties-status-5"
                onclick="statusToggle(this.id)"
                class="btn btn-secondary open"
              >
                open
              </button>
            </li>
          </ul>
          <ul class="new-entry-a list-group list-group-horizontal">
            <li class="list-group-item flex-fill">
              <b>MONDAY:</b>&nbsp;&nbsp;Clean trash boat
            </li>
            <li class="list-group-item entry-status">
              <button
                type="button"
                id="duties-status-6"
                onclick="statusToggle(this.id)"
                class="btn btn-secondary open"
              >
                open
              </button>
            </li>
          </ul>
          <ul class="new-entry-b list-group list-group-horizontal">
            <li class="list-group-item flex-fill">
              <b>MONDAY & FRIDAY:</b>&nbsp;&nbsp;Ensure recliners are plugged in
            </li>
            <li class="list-group-item entry-status">
              <button
                type="button"
                id="duties-status-7"
                onclick="statusToggle(this.id)"
                class="btn btn-secondary open"
              >
                open
              </button>
            </li>
          </ul>
          <ul class="new-entry-a list-group list-group-horizontal">
            <li class="list-group-item flex-fill">
              <b>TUESDAY & THURSDAY:</b>&nbsp;&nbsp;Wipe down all pony walls
            </li>
            <li class="list-group-item entry-status">
              <button
                type="button"
                id="duties-status-8"
                onclick="statusToggle(this.id)"
                class="btn btn-secondary open"
              >
                open
              </button>
            </li>
          </ul>
          <ul class="new-entry-b list-group list-group-horizontal">
            <li class="list-group-item flex-fill">
              <b>TUESDAY & THURSDAY:</b>&nbsp;&nbsp;Dust all banisters and
              railings
            </li>
            <li class="list-group-item entry-status">
              <button
                type="button"
                id="duties-status-9"
                onclick="statusToggle(this.id)"
                class="btn btn-secondary open"
              >
                open
              </button>
            </li>
          </ul>
          <ul class="new-entry-a list-group list-group-horizontal">
            <li class="list-group-item flex-fill">
              <b>WEDNESDAY:</b>&nbsp;&nbsp;Dust handles: Theatre exit, lobby,
              bathrooms, concessions, office
            </li>
            <li class="list-group-item entry-status">
              <button
                type="button"
                id="duties-status-10"
                onclick="statusToggle(this.id)"
                class="btn btn-secondary open"
              >
                open
              </button>
            </li>
          </ul>
          <ul class="new-entry-b list-group list-group-horizontal">
            <li class="list-group-item flex-fill">
              <b>WEDNESDAY:</b>&nbsp;&nbsp;Dust aisle lights
            </li>
            <li class="list-group-item entry-status">
              <button
                type="button"
                id="duties-status-11"
                onclick="statusToggle(this.id)"
                class="btn btn-secondary open"
              >
                open
              </button>
            </li>
          </ul>
        </div>
      </div>
      <br />
      <br />
      <h1>CLOSING DUTIES</h1>
      <div class="container-lg">
        <div id="user-theatre-list">
          <ul class="list-group list-group-horizontal">
            <li class="list-group-item flex-fill">Task</li>
            <li class="list-group-item entry-status">Status</li>
          </ul>
          <ul class="new-entry-a list-group list-group-horizontal">
            <li class="list-group-item flex-fill">Restroom Drainage</li>
            <li class="list-group-item entry-status">
              <button
                type="button"
                id="duties-status-12"
                onclick="statusToggle(this.id)"
                class="btn btn-secondary open"
              >
                open
              </button>
            </li>
          </ul>
          <ul class="new-entry-b list-group list-group-horizontal">
            <li class="list-group-item flex-fill">Mop Break Room</li>
            <li class="list-group-item entry-status">
              <button
                type="button"
                id="duties-status-13"
                onclick="statusToggle(this.id)"
                class="btn btn-secondary open"
              >
                open
              </button>
            </li>
          </ul>
          <ul class="new-entry-a list-group list-group-horizontal">
            <li class="list-group-item flex-fill">Mop Usher Closet</li>
            <li class="list-group-item entry-status">
              <button
                type="button"
                id="duties-status-14"
                onclick="statusToggle(this.id)"
                class="btn btn-secondary open"
              >
                open
              </button>
            </li>
          </ul>
          <ul class="new-entry-b list-group list-group-horizontal">
            <li class="list-group-item flex-fill">Stock Janitor Closet 1F</li>
            <li class="list-group-item entry-status">
              <button
                type="button"
                id="duties-status-15"
                onclick="statusToggle(this.id)"
                class="btn btn-secondary open"
              >
                open
              </button>
            </li>
          </ul>
          <ul class="new-entry-a list-group list-group-horizontal">
            <li class="list-group-item flex-fill">Stock Janitor Closet 2F</li>
            <li class="list-group-item entry-status">
              <button
                type="button"
                id="duties-status-16"
                onclick="statusToggle(this.id)"
                class="btn btn-secondary open"
              >
                open
              </button>
            </li>
          </ul>
          <ul class="new-entry-b list-group list-group-horizontal">
            <li class="list-group-item flex-fill">Trash Collections</li>
            <li class="list-group-item entry-status">
              <button
                type="button"
                id="duties-status-17"
                onclick="statusToggle(this.id)"
                class="btn btn-secondary open"
              >
                open
              </button>
            </li>
          </ul>
          <ul class="new-entry-a list-group list-group-horizontal">
            <li class="list-group-item flex-fill">Dust chairs in rows: E, F, G, H</li>
            <li class="list-group-item entry-status">
              <button
                type="button"
                id="duties-status-18"
                onclick="statusToggle(this.id)"
                class="btn btn-secondary open"
              >
                open
              </button>
            </li>
          </ul>
          <ul class="new-entry-b list-group list-group-horizontal">
            <li class="list-group-item flex-fill">Wipe down lobby tables</li>
            <li class="list-group-item entry-status">
              <button
                type="button"
                id="duties-status-19"
                onclick="statusToggle(this.id)"
                class="btn btn-secondary open"
              >
                open
              </button>
            </li>
          </ul>
          <ul class="new-entry-a list-group list-group-horizontal">
            <li class="list-group-item flex-fill">Clean butter tray</li>
            <li class="list-group-item entry-status">
              <button
                type="button"
                id="duties-status-20"
                onclick="statusToggle(this.id)"
                class="btn btn-secondary open"
              >
                open
              </button>
            </li>
          </ul>
          <ul class="new-entry-b list-group list-group-horizontal">
            <li class="list-group-item flex-fill">Restock condiment island</li>
            <li class="list-group-item entry-status">
              <button
                type="button"
                id="duties-status-21"
                onclick="statusToggle(this.id)"
                class="btn btn-secondary open"
              >
                open
              </button>
            </li>
          </ul>
          <ul class="new-entry-a list-group list-group-horizontal">
            <li class="list-group-item flex-fill">Empty and hang all butlers and brooms</li>
            <li class="list-group-item entry-status">
              <button
                type="button"
                id="duties-status-22"
                onclick="statusToggle(this.id)"
                class="btn btn-secondary open"
              >
                open
              </button>
            </li>
          </ul>
          <ul class="new-entry-b list-group list-group-horizontal">
            <li class="list-group-item flex-fill"><b>MONDAY:</b>&nbsp;&nbsp;Put stock pallets in lobby</li></li>
            <li class="list-group-item entry-status">
              <button
                type="button"
                id="duties-status-23"
                onclick="statusToggle(this.id)"
                class="btn btn-secondary open"
              >
                open
              </button>
            </li>
          </ul>
          <ul class="new-entry-a list-group list-group-horizontal">
            <li class="list-group-item flex-fill"><b>TUESDAY:</b>&nbsp;&nbsp;Dust poster cases</li></li>
            <li class="list-group-item entry-status">
              <button
                type="button"
                id="duties-status-24"
                onclick="statusToggle(this.id)"
                class="btn btn-secondary open"
              >
                open
              </button>
            </li>
          </ul>
          <ul class="new-entry-b list-group list-group-horizontal">
            <li class="list-group-item flex-fill"><b>WEDNESDAY:</b>&nbsp;&nbsp;Dust auditorium doors and thresholds</li></li>
            <li class="list-group-item entry-status">
              <button
                type="button"
                id="duties-status-25"
                onclick="statusToggle(this.id)"
                class="btn btn-secondary open"
              >
                open
              </button>
            </li>
          </ul>
          <ul class="new-entry-a list-group list-group-horizontal">
            <li class="list-group-item flex-fill"><b>THURSDAY:</b>&nbsp;&nbsp;Rinse out and clean one usher trash can</li>
            <li class="list-group-item entry-status">
              <button
                type="button"
                id="duties-status-26"
                onclick="statusToggle(this.id)"
                class="btn btn-secondary open"
              >
                open
              </button>
            </li>
          </ul>
        </div>
        <div class="btns-flexcan">
          <button
              type="button"
              class="btn btn-secondary sched-option open-button"
              onclick="resetEntry()"
            >
              REFRESH
            </button>
        </div>
        <div id="reset-form" class="form-popup">
          <form
            action="./duties.php"
            class="form-container"
            autocomplete="on"
            onsubmit="Refresh()"
          >
            <h3 class="form-headie">REFRESH DUTIES?</h3>
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
              <p class="poem">Up the stairs, I went</p>
              <p class="poem">But forgot what I needed</p>
              <p class="poem">Down the stairs, I go</p>
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
    <script src="../scripts/duties.js"></script>
  </body>
</html>
