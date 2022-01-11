<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- ------------------------------------------------------------- -->
    <!-- Base -->

    <link rel="shortcut icon" href="../public/favicon.ico" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Catamaran:wght@100;200;300;400;500;600;700;800;900&family=Martel+Sans:wght@200;300;400;600;700;800;900&family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./css/auctionr.css" />
    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>

    <!-- ------------------------------------------------------------- -->
    <!-- Custom -->
    <title>AuctionR | Franchise Dashboard</title>
    <link rel="stylesheet" href="./css/franchise.css" />
    <!-- ------------------------------------------------------------- -->
  </head>
  <body>
    <?php 
    $db = mysqli_connect('localhost', 'root', '','auctionr');
    if (mysqli_connect_error()) {
      echo "Failed to connect to MySQL: " . $mysqli_connect_error;
      exit();
    }
    // $franchise = $_SESSION['username'];
    $franchise = 'shaq';
    $eid = $_GET['eid'];

    $sql = "SELECT * FROM FranchiseData WHERE Username = '".$franchise."'";
    $franchisedataresult = mysqli_query($db, $sql);

    $sql = "SELECT * FROM Event WHERE EventID IN (SELECT EventID from FranchiseEvent WHERE FranchiseID = (SELECT FranchiseID from FranchiseData WHERE FName ='".$franchise."))'";
    $cureventdataresult = mysqli_query($db, $sql);

    $sql = "SELECT * FROM Event WHERE EventID NOT IN (SELECT EventID from FranchiseEvent WHERE FranchiseID = (SELECT FranchiseID from FranchiseData WHERE FName ='".$franchise."))'";
    $neweventdataresult = mysqli_query($db, $sql);
    ?>

    
  {% endif %}
    <div class="container"> 
      <div class="dash-nav-fran-prof">
        <img
          src="../public/Logo2.png"
          height="70px"
          width="auto"
          alt="AuctionR"
        />
        <div>Franchise Dashboard</div>
      </div>
      <div class="dash-main">
        <div class="dash-data">
          <div class="my-events">
            <h2>My Events</h2>
            <div class="event-data">
              <div class="event-card">
                <div class="event-card-title">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </div>
                <div class="event-card-date">From 10/12/2021 To 30/1/2022</div>
              </div>
              <div class="event-divider"></div>
              <div class="event-card">
                <div class="event-card-title">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </div>
                <div class="event-card-date">From 10/12/2021 To 30/1/2022</div>
              </div>
              <div class="event-divider"></div>
              <div class="event-card">
                <div class="event-card-title">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </div>
                <div class="event-card-date">From 10/12/2021 To 30/1/2022</div>
              </div>
            </div>
          </div>
          <div class="other-events">
            <h2>Other Events</h2>
            <div class="event-data">
              <div class="event-card">
                <div class="event-card-title">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </div>
                <div class="join-event-card">
                  <div class="event-card-date">
                    From 10/12/2021 To 30/1/2022
                  </div>
                  <a href="eventdisplay.html">
                    <button class="event-join-btn">Join</button>
                  </a>
                </div>
              </div>
              <div class="event-divider"></div>
              <div class="event-card">
                <div class="event-card-title">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </div>
                <div class="join-event-card">
                  <div class="event-card-date">
                    From 10/12/2021 To 30/1/2022
                  </div>
                  <a href="eventdisplay.html">
                    <button class="event-join-btn">Join</button>
                  </a>
                </div>
              </div>
              <div class="event-divider"></div>
              <div class="event-card">
                <div class="event-card-title">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </div>
                <div class="join-event-card">
                  <div class="event-card-date">
                    From 10/12/2021 To 30/1/2022
                  </div>
                  <a href="eventdisplay.html">
                  <button class="event-join-btn">Join</button>
                </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="fran-dash-right">
          <div class="dash-fran-prof">
            <div class="prof-img">
              <img src="../public/LogoA.png" alt="Logog" />
            </div>
            <div class="fran-prof-info">Name:</div>
            <div class="fran-prof-name">Lorem, ipsum.</div>
            <div class="fran-prof-info">Credits:</div>
            <div class="fran-prof-budget">34</div>
            <div class="fran-prof-info">Description:</div>
            <div class="fran-prof-desc">
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Voluptatum, quisquam.
            </div>
            <div class="fran-prof-info">Team:</div>
            <div class="fran-prof-team">
              <ul>
                <li>Lorem, ipsum.</li>
                <li>Lorem, ipsum.</li>
                <li>Lorem, ipsum.</li>
                <li>Lorem, ipsum.</li>
                <li>Lorem, ipsum.</li>
                <li>Lorem, ipsum.</li>
                <li>Lorem, ipsum.</li>
                <li>Lorem, ipsum.</li>
              </ul>
            </div>
          </div>
          <a href="addplayer.html">
            <button class="event-join-btn">Add Player</button>
          </a>
        </div>
      </div>
    </div>
  </body>
</html>
