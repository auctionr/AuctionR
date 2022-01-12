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
    // $franchise = 'harden';
    $franchise = $_GET['uname'];

    $sql = "SELECT * FROM FranchiseData WHERE Username = '".$franchise."'";
    $franchisedataresult = mysqli_query($db, $sql);

    $sql = "SELECT * FROM Event WHERE EventID IN (SELECT EventID from FranchiseEvent WHERE FranchiseID = (SELECT FranchiseID from FranchiseData WHERE Username ='".$franchise."'))";
    $cureventdataresult = mysqli_query($db, $sql);

    $sql = "SELECT * FROM Event WHERE EventID NOT IN (SELECT EventID from FranchiseEvent WHERE FranchiseID = (SELECT FranchiseID from FranchiseData WHERE Username ='".$franchise."'))";
    $neweventdataresult = mysqli_query($db, $sql);

    $sql = "SELECT * FROM PlayerData WHERE FranchiseID = (SELECT FranchiseID FROM FranchiseData WHERE Username='".$franchise."')";
    
    $playerdataresult = mysqli_query($db, $sql);

    $franid = "";
 
    ?>

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

        <?php 
            if($franchisedataresult){
              while($fdata = mysqli_fetch_assoc($franchisedataresult)){
                $franid = $fdata['FranchiseID']
        ?>

        <div class="fran-dash-right">
          <div class="dash-fran-prof">
            <div class="prof-img">
              <img src="../public/LogoA.png" alt="Logog" />
            </div>
            <div class="fran-prof-info">Name:</div>
            <div class="fran-prof-name"><?php echo $fdata['FName']; ?></div>
            <div class="fran-prof-info">Credits:</div>
            <div class="fran-prof-budget"><?php echo $fdata['Credit']; ?></div>
            <div class="fran-prof-info">Description:</div>
            <div class="fran-prof-desc">
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Voluptatum, quisquam.
            </div>
            <div class="fran-prof-info">Team:</div>
            <div class="fran-prof-team">
              <ul>
              
              <?php 
                if($playerdataresult){
                  while($pldata = mysqli_fetch_assoc($playerdataresult)){
              ?>
                <?php 
                  $namesql = "SELECT * FROM Person WHERE Username='".$pldata['Username']."'";
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
              <?php 
                }
              }
              ?>
            </div>
          </div>
          <a href=<?php echo "addplayer.php?fid=".$franid; ?>>
            <button class="event-join-btn">Add Player</button>
          </a>
          </div>
          
        
          <div class="dash-data">
          <div div class="my-events">

            <h2>My Events</h2>
            <div class="event-data">

          <?php 
            if($cureventdataresult){
              while($cdata = mysqli_fetch_assoc($cureventdataresult)){
          ?>
              <a href = <?php echo "eventdisplay.php?eid=".$cdata['EventID']; ?> >
                <div class="event-card">
                  <div class="event-card-title">
                    <?php echo $cdata['EName']; ?>
                  </div>
                  <div class="event-card-date">From <?php echo substr($cdata['EventStart'],0,10); ?> To <?php echo substr($cdata['EventEnd'], 0, 10); ?></div>
                </div>
              </a>
              <div class="event-divider"></div>
          <?php
              }
            }
          ?>

            </div>
          </div>
          

          <div class="other-events">
            <h2>Other Events</h2>
            <div class="event-data">

              <?php 
                if($neweventdataresult){
                  while($ndata = mysqli_fetch_assoc($neweventdataresult)){
              ?>
              
              <div class="event-card">
              <a href = <?php echo "eventdisplay.php?eid=".$ndata['EventID']; ?> >
                <div class="event-card-title">
                  <a href=<?php echo "eventdisplay.php?eid=".$ndata['EventID']; ?>>
                    <?php echo $ndata['EName']; ?>
                  </a>
                </div>
              </a>  
                <div class="join-event-card">
                  <div class="event-card-date">
                    From <?php echo substr($ndata['EventStart'], 0, 10); ?> To <?php echo substr($ndata['EventEnd'], 0, 10); ?>
                  </div>
                  <a class = "event-join-btn" href = <?php echo "eventjoinconfirm.php?eid=".$ndata['EventID']."&fid=".$franid; ?>> JOIN </a>
                </div>
              </div>
              <div class="event-divider"></div>
              
              <?php
                  }
                }
              ?>

            </div>
          </div>
        </div>
        
      </div>
    </div>
  </body>
</html>
