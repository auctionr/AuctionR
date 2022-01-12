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
    <title>AuctionR | Player Dashboard</title>
    <link rel="stylesheet" href="./css/playerdash.css" />
    <!-- ------------------------------------------------------------- -->
  </head>
  <body>
    <?php 
      $db = mysqli_connect('localhost', 'root', '','auctionr');
      if (mysqli_connect_error()) {
        echo "Failed to connect to MySQL: " . $mysqli_connect_error;
        exit();
      }
      // $player = $_SESSION['username'];
      // $player = 'kobebryant';
      $player = $_GET['uname'];
     
      $sql = "SELECT * FROM Event WHERE EventID IN (SELECT EventID FROM PlayerEvent WHERE PlayerID = (SELECT PlayerID FROM PlayerData WHERE Username='".$player."'))";
      $cureventdata = mysqli_query($db, $sql);

      $sql = "SELECT * FROM PlayerData WHERE Username='".$player."'";
      $playerdataresult = mysqli_query($db, $sql);
      $pldatares = mysqli_query($db, $sql);

      $sql = "SELECT * FROM FranchiseData WHERE FranchiseID = (SELECT FranchiseID FROM PlayerData WHERE Username='".$player."')";
      $franchisedataresult = mysqli_query($db, $sql);

      $sql = "SELECT * FROM PlayerData WHERE FranchiseID = (SELECT FranchiseID FROM FranchiseData WHERE FranchiseID = (SELECT FranchiseID FROM PlayerData WHERE Username='".$player."'))";
      $teamdataresult = mysqli_query($db, $sql);
    ?>
    <div class="container">
      <div class="dash-nav-play-prof">
        <img
          src="../public/Logo2.png"
          height="70px"
          width="auto"
          alt="AuctionR"
        />
        <div>Player Dashboard</div>
      </div>
      <div class="dash-main">
        <div class="dash-data">
          <div class="my-events">
            <h2>My Events</h2>
            <div class="event-data">
              <?php 
                if($cureventdata){
                  while($cdata = mysqli_fetch_assoc($cureventdata)){
              ?> 
              <a a href = <?php echo "eventdisplay.php?eid=".$cdata['EventID']; ?> >
              <div class="event-card">
                <div class="event-card-title">
                  <?php echo $cdata['EName'];?>
                </div>
                <div class="event-card-date">From <?php echo substr($cdata['EventStart'], 0, 10);?> To <?php echo substr($cdata['EventEnd'], 0, 10);?></div>
              </div>
                  </a>
              <div class="event-divider"></div>
              <?php
                  }
                }
              ?>
            </div>
          </div>
          
          <div class="my-franchise">
            <h2>My Franchise</h2>
            <div class="franchise-box">
              <div class="fran-box-sub">
              <?php 
                if($franchisedataresult){
                  while($fdata = mysqli_fetch_assoc($franchisedataresult)){
              ?>
                <div class="fran-box-info">Franchise Name:</div>
                <div class="fran-box-data"><?php echo $fdata['FName']; ?></div>
                <div class="fran-box-info">Sport:</div>
                
                <?php
                if($playerdataresult){
                  while($plsdata = mysqli_fetch_assoc($playerdataresult)){
                ?>

                <?php 
                $sportsql = "SELECT * FROM Sports WHERE SportsID = '".$plsdata['SportsID']."'";
                $sportdataresult = mysqli_query($db, $sportsql);
                if($sportdataresult){
                  while($sdata = mysqli_fetch_assoc($sportdataresult)){
                ?>
                <div class="fran-box-data">
                  <?php echo $sdata['SName']; ?>
                </div>
                <?php 
                  }
                }
                ?>
                <?php 
                  }
                }
                ?>
                <div class="fran-box-info">Average Rating:</div>
                <div class="fran-box-data">1123</div>
                <!-- <div class="fran-box-info">Bought for:</div>
                <div class="fran-box-data">5 creds</div> -->
                <?php 
                  }
                }
                ?>

              </div>
              <div class="fran-box-sub">
                <div class="fran-box-info">
                  Team:
                </div>
                <div class="fran-box-data">
                  <ul>
                    <?php 
                      if($teamdataresult){
                        while($tdata = mysqli_fetch_assoc($teamdataresult)){
                    ?>
                    
                  <?php 
                  $namesql = "SELECT * FROM Person WHERE Username='".$tdata['Username']."'";
                  $namedataresult = mysqli_query($db, $namesql);
                  if($namedataresult){
                    while($ndata = mysqli_fetch_assoc($namedataresult)){
                  ?>
                    <li>
                      <?php echo $ndata['FirstName']." ".$ndata['LastName']; ?>
                    </li>
                  <?php 
                    }
                  }
                  ?>
                  <?php
                        }
                      }
                    ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="dash-play-prof">
          <div class="prof-img">
            <img src="../public/LogoA.png" alt="Logog" />
          </div>

          <?php
          if($pldatares){
            while($pldata = mysqli_fetch_assoc($pldatares)){
          ?>
          <div class="play-prof-info">Name:</div>
          <?php 
                  $namesql = "SELECT * FROM Person WHERE Username='".$player."'";
                  $namedataresult = mysqli_query($db, $namesql);
                if($namedataresult){
                  while($ndata = mysqli_fetch_assoc($namedataresult)){
          ?>
          <div class="play-prof-name">
            <?php echo $ndata['FirstName']." ".$ndata['LastName']; ?>
          </div>
          <?php 
            }
          }
          ?>
          <div class="play-prof-info">Price:</div>
          <div class="play-prof-name"><?php echo $pldata['Price']; ?></div>
          <div class="play-prof-info">Description:</div>
          <div class="play-prof-desc">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum,
            quisquam.
          </div>
          <?php
            }
          }
          ?>

          <div class="play-prof-info">Stats:</div>
          <div class="play-prof-stat">
            <ul>
              <p>Batting: 90</p>
              <p>Bowling: 701</p>
              <p>Bowling: 701</p>
              
            </ul>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
