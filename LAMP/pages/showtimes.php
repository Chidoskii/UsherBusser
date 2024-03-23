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
    <title>Home | UsherBusser</title>
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
              <a class="nav-link" href="#">MOVIES</a>
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

    <div class="container-lg home-content">
      <div class="page-content">
        <h1>NOW PLAYING</h1>

        <div class="now-playing">
          <div class="wrapper">
            <div class="movie-card">
              <img src="../imgs/napoleon.jpg" />
              <div class="descriptions">
                <h1>Napoleon</h1>
                <p>
                  Napoleon is a 2023 epic historical drama film directed and
                  produced by Ridley Scott and written by David Scarpa. Based on
                  the story of Napoleon Bonaparte, primarily depicting the
                  French leader's rise to power as well as his relationship with
                  Empress Joséphine, the film stars Joaquin Phoenix as Napoleon
                  and Vanessa Kirby as Joséphine.
                </p>
                <button>
                  <i class="fab fa-youtube"></i>
                  <a
                    href="https://www.youtube.com/watch?v=OAZWXUkrjPc&ab_channel=SonyPicturesEntertainment"
                    target="_blank"
                    rel="noopener noreferrer"
                  >
                    trailer on YouTube
                  </a>
                </button>
              </div>
            </div>
            <div class="movie-card">
              <img src="../imgs/shiftup.jpg" />
              <div class="descriptions">
                <h1>The Shift</h1>
                <p>
                  Kevin Garner encounters a mysterious man known as "The
                  Benefactor". When Kevin refuses the man's enticing offer of
                  wealth and power, he is shifted into alternate totalitarian
                  realities, encountering infinite worlds and impossible
                  choices, as he attempts to return to the woman he loves.
                </p>
                <button>
                  <i class="fab fa-youtube"></i>
                  <a
                    href="https://www.youtube.com/watch?v=cQropOvvfxM&ab_channel=FilmSelectTrailer"
                    target="_blank"
                    rel="noopener noreferrer"
                  >
                    trailer on YouTube
                  </a>
                </button>
              </div>
            </div>
            <div class="movie-card">
              <img src="../imgs/hgames.jpg" />
              <div class="descriptions">
                <h1 style="font-size: 18pt; font-weight: 600">
                  The Hunger Games: The Ballad of Songbirds & Snakes
                </h1>
                <p class="hunger-desc">
                  The story of Coriolanus Snow, years before he would become the
                  tyrannical President of Panem. Coriolanus sees a chance for a
                  change in his fortunes when he is chosen to be a mentor for
                  the 10th Hunger Games only to have his elation dashed when he
                  is assigned to mentor a girl tribute named Lucy Gray Baird
                  from the impoverished District 12.
                </p>
                <button>
                  <i class="fab fa-youtube"></i>
                  <a
                    href="https://www.youtube.com/watch?v=NxW_X4kzeus&ab_channel=LionsgateMovies"
                    target="_blank"
                    rel="noopener noreferrer"
                  >
                    trailer on YouTube
                  </a>
                </button>
              </div>
            </div>
            <div class="movie-card">
              <img src="../imgs/moon.jpg" />
              <div class="descriptions">
                <h1 style="font-size: 22pt; font-weight: 500">
                  Killers of the Flower Moon
                </h1>
                <p class="hunger-desc">
                  Killers of the Flower Moon is set in 1920s Oklahoma, it
                  focuses on a series of murders of Osage members and relations
                  in the Osage Nation after oil was discovered on tribal land.
                  The tribal members had retained mineral rights on their
                  reservation, and white opportunists sought to take the tribal
                  members' wealth.
                </p>
                <button>
                  <i class="fab fa-youtube"></i>
                  <a
                    href="https://www.youtube.com/watch?v=7cx9nCHsemc&ab_channel=ParamountPictures"
                    target="_blank"
                    rel="noopener noreferrer"
                  >
                    trailer on YouTube
                  </a>
                </button>
              </div>
            </div>
            <div class="movie-card">
              <img src="../imgs/freddys.jpg" />
              <div class="descriptions">
                <h1 style="font-size: 25pt; font-weight: 500">
                  Five Nights at Freddy's
                </h1>
                <p class="hunger-desc">
                  A troubled security guard begins working at Freddy Fazbear's
                  Pizzeria. While spending his first night on the job, he
                  realizes the late shift at Freddy's won't be so easy to make
                  it through.
                </p>
                <button>
                  <i class="fab fa-youtube"></i>
                  <a
                    href="https://www.youtube.com/watch?v=0VH9WCFV6XQ&ab_channel=UniversalPictures"
                    target="_blank"
                    rel="noopener noreferrer"
                  >
                    trailer on YouTube
                  </a>
                </button>
              </div>
            </div>
            <div class="movie-card">
              <img src="../imgs/gzilla.jpg" />
              <div class="descriptions">
                <h1 style="font-size: 24pt; font-weight: 500">
                  Godzilla Minus One
                </h1>
                <p class="hunger-desc">
                  Godzilla Minus One is a 2023 Japanese kaiju film written and
                  directed by Takashi Yamazaki. Japan is already devastated by
                  the war when a new crisis emerges in the form of a giant
                  monster.
                </p>
                <button>
                  <i class="fab fa-youtube"></i>
                  <a
                    href="https://www.youtube.com/watch?v=VvSrHIX5a-0&ab_channel=GODZILLAOFFICIALbyTOHO"
                    target="_blank"
                    rel="noopener noreferrer"
                  >
                    trailer on YouTube
                  </a>
                </button>
              </div>
            </div>
            <div class="movie-card">
              <img src="../imgs/Renaissance_KeyArt_1920x2880.jpg" />
              <div class="descriptions">
                <h1 style="font-size: 25pt; font-weight: 500">
                  Renaissance: A Film by Beyoncé
                </h1>
                <p class="hunger-desc">
                  Pop superstar Beyoncé performs hit songs in concert and
                  discusses the creative process behind her world tour.
                </p>
                <button>
                  <i class="fab fa-youtube"></i>
                  <a
                    href="https://www.youtube.com/watch?v=BGYIXarTNbA&ab_channel=Beyonc%C3%A9"
                    target="_blank"
                    rel="noopener noreferrer"
                  >
                    trailer on YouTube
                  </a>
                </button>
              </div>
            </div>
            <div class="movie-card">
              <img src="../imgs/animalss.jpg" />
              <div class="descriptions">
                <h1 style="font-size: 26pt; font-weight: 500">Animal</h1>
                <p class="hunger-desc">
                  A son undergoes a remarkable transformation as the bond with
                  his father begins to fracture, and he becomes consumed by a
                  quest for vengeance.
                </p>
                <button>
                  <i class="fab fa-youtube"></i>
                  <a
                    href="https://www.youtube.com/watch?v=Dydmpfo68DA&ab_channel=T-Series"
                    target="_blank"
                    rel="noopener noreferrer"
                  >
                    trailer on YouTube
                  </a>
                </button>
              </div>
            </div>
            <div class="movie-card">
              <img src="../imgs/marvelous.jpg" />
              <div class="descriptions">
                <h1 style="font-size: 24pt; font-weight: 500">The Marvels</h1>
                <p class="hunger-desc">
                  Carol Danvers, aka Captain Marvel, has reclaimed her identity
                  from the tyrannical Kree and taken revenge on the Supreme
                  Intelligence. However, unintended consequences see her
                  shouldering the burden of a destabilized universe. When her
                  duties send her to an anomalous wormhole linked to a Kree
                  revolutionary, her powers become entangled with two other
                  superheroes to form the Marvels.
                </p>
                <button>
                  <i class="fab fa-youtube"></i>
                  <a
                    href="https://www.youtube.com/watch?v=wS_qbDztgVY&ab_channel=MarvelEntertainment"
                    target="_blank"
                    rel="noopener noreferrer"
                  >
                    trailer on YouTube
                  </a>
                </button>
              </div>
            </div>
            <div class="movie-card">
              <img src="../imgs/wishywashy.jpg" />
              <div class="descriptions">
                <h1 style="font-size: 25pt; font-weight: 500">The Wish</h1>
                <p class="hunger-desc">
                  Young Asha makes a wish so powerful that it's answered by a
                  cosmic force, a little ball of boundless energy called Star.
                  With Star's help, Asha must save her kingdom from King
                  Magnifico and prove that when the will of one courageous human
                  connects with the magic of the stars, wondrous things can
                  happen.
                </p>
                <button>
                  <i class="fab fa-youtube"></i>
                  <a
                    href="https://www.youtube.com/watch?v=oyRxxpD3yNw&ab_channel=WaltDisneyAnimationStudios"
                    target="_blank"
                    rel="noopener noreferrer"
                  >
                    trailer on YouTube
                  </a>
                </button>
              </div>
            </div>
            <div class="movie-card">
              <img src="../imgs/sinigh.jpg" />
              <div class="descriptions">
                <h1 style="font-size: 25pt; font-weight: 500">Silent Night</h1>
                <p class="hunger-desc">
                  On Christmas Eve, a man witnesses the death of his young son
                  when the boy gets caught in crossfire between warring gangs.
                  Recovering from a wound that cost him his voice, he soon
                  embarks on a bloody and grueling quest to punish those
                  responsible.
                </p>
                <button>
                  <i class="fab fa-youtube"></i>
                  <a
                    href="https://www.youtube.com/watch?v=yBnTqn0lBDA&ab_channel=LionsgateMovies"
                    target="_blank"
                    rel="noopener noreferrer"
                  >
                    trailer on YouTube
                  </a>
                </button>
              </div>
            </div>
            <div class="movie-card">
              <img src="../imgs/dreamscen.jpg" />
              <div class="descriptions">
                <h1 style="font-size: 24pt; font-weight: 500">
                  Dream Scenario
                </h1>
                <p class="hunger-desc">
                  A family man finds his life turned upside down when millions
                  of strangers suddenly start seeing him in their dreams.
                  However, when his nighttime appearances take a nightmarish
                  turn, he's forced to navigate the consequences of his newfound
                  stardom.
                </p>
                <button>
                  <i class="fab fa-youtube"></i>
                  <a
                    href="https://www.youtube.com/watch?v=q3x9iUL-74w&ab_channel=A24"
                    target="_blank"
                    rel="noopener noreferrer"
                  >
                    trailer on YouTube
                  </a>
                </button>
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
              <p class="poem">Once upon a time</p>
              <p class="poem">I went to see a movie</p>
              <p class="poem">It was pretty good</p>
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
