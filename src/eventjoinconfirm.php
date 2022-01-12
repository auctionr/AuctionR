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
    <scr
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>

    <!-- ------------------------------------------------------------- -->
    <!-- Custom -->
    <title>AuctionR | Home</title>
    <link rel="stylesheet" href="./css/eventdisplay.css">
    <!-- ------------------------------------------------------------- -->
  </head>
  <body>
    <?php 
    $db = mysqli_connect('localhost', 'root', '','auctionr');
    if (mysqli_connect_error()) {
      echo "Failed to connect to MySQL: " . $mysqli_connect_error;
      exit();
    }
    $eid = $_GET['eid'];
    $fid = $_GET['fid'];
    $sql = "SELECT * FROM Event WHERE EventID = '$eid'";
    $eventdataresult = mysqli_query($db, $sql);
    ?>

    <?php 
    if($eventdataresult){
      while($edata = mysqli_fetch_assoc($eventdataresult)){
    ?>
    
    <div class="container">
      <div class="event-display-nav">
        <img
          src="../public/Logo2.png"
          height="70px"
          width="auto"
          alt="AuctionR"
        />
        <div>Event Display</div>
      </div>
      <div class="event-display">
        <div class="event-display-title">Event</div>
        <div class="event-box">
          <div class="event-box-sub">
            <div class="event-display-info">Event Name:</div>
            <div class="event-display-data"><?php echo $edata["EName"] ?></div>
            <div class="event-display-info">Sport:</div>
            

              <?php 
                $sportsql = "SELECT * FROM Sports WHERE SportsID = '".$edata['SportsID']."'";
                $sportdataresult = mysqli_query($db, $sportsql);
                if($sportdataresult){
                  while($sdata = mysqli_fetch_assoc($sportdataresult)){
              ?>
              <div class="event-display-data">
                <?php echo $sdata['SName']; ?>
              </div>                  
              <?php
                  }
                }
              ?>

            <div class="event-display-info">Event Start:</div>
            <div class="event-display-data"><?php echo substr($edata["EventStart"], 0, 10) ?></div>
            <div class="event-display-info">Event End:</div>
            <div class="event-display-data"><?php echo substr($edata["EventEnd"], 0, 10) ?></div>
            <!-- <div class="event-display-info">Event Location:</div>
            <div class="event-display-data"><?php echo $edata["ENationality"] ?></div> -->
          </div>
          <div class="event-box-sub">
            <div class="event-display-info">Nationality:</div>
            <div class="event-display-data"><?php echo $edata["ENationality"] ?></div>
            <div class="event-display-info">Max Home Players:</div>
            <div class="event-display-data"><?php echo $edata["MaxHomePlayers"] ?></div>
            <div class="event-display-info">Max Foreign Players:</div>
            <div class="event-display-data"><?php echo $edata["MaxForiegnPlayers"] ?></div>
            <div class="event-display-info">Gender</div>
            <div class="event-display-data"><?php echo $edata["EGender"] ?></div>
            <!-- <div class="event-display-info">Event Budget</div>
            <div class="event-display-data">1000000</div> -->
          </div>
        </div>
        <?php 
          if(isset($_POST['join'])){
            $sql = "INSERT INTO FranchiseEvent VALUES ('$fid', '$eid')";
            mysqli_query($db, $sql);
            $sql1 = "SELECT * FROM PlayerData WHERE FranchiseID='".$fid."'";
            $sq1res = mysqli_query($db, $sql1);
            if($sq1res){
              while($sqpdata = mysqli_fetch_assoc($sq1res)){
                $sql2 = "INSERT INTO PlayerEvent (PlayerID, EventID) VALUES ('".$sqpdata["PlayerID"]."','".$eid."')";
                mysqli_query($sql2);
              }
            }
            header("Location: eventdisplay.php?eid=".$eid);
          }
        ?>
        <form method="post">
        <button type="submit" name="join" class="event-join">Join Event</button>
        </form>
      </div>
    </div>

    <?php
     }
    }
    ?>
  </body>
</html>
