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
    <link rel="stylesheet" href="./auctionr.css" />
    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>

    <!-- ------------------------------------------------------------- -->
    <!-- Custom -->
    <title>AuctionR | Player Validation</title>
    <link rel="stylesheet" href="./css/modconfirm.css" />
    <!-- ------------------------------------------------------------- -->
  </head>
  <body>
    <?php 
    $db = mysqli_connect('localhost', 'root', '','auctionr');
    if (mysqli_connect_error()) {
      echo "Failed to connect to MySQL: " . $mysqli_connect_error;
      exit();
    }

    $pid = $_GET['pid'];
    $sql = "SELECT * FROM PlayerData WHERE PlayerID = '$pid'";
    $playerdataresult = mysqli_query($db, $sql);

    ?>

    <?php 
      if($playerdataresult){
        while($pdata = mysqli_fetch_assoc($playerdataresult)){
    ?>

    
    <div class="container">
      <div class="dash-nav-prof">
        <img
          src="../public/Logo2.png"
          height="70px"
          width="auto"
          alt="AuctionR"
        />
        <div>Player Validation</div>
      </div>
      <div class="mod-body">
      <div class="mod-player-data">
        <h2>Player Data:</h2>
        <div class="mod-data-box">
          <div class="mod-data-box-sub">
            <div class="mod-data-info">Name:</div>
            
              <b>
                <?php 
                  $namesql = "SELECT * FROM Person P WHERE P.Username='".$pdata['Username']."'";
                  $namedataresult = mysqli_query($db, $namesql);
                if($namedataresult){
                  while($ndata = mysqli_fetch_assoc($namedataresult)){
                ?>
                  <div class="mod-data-data">
                    <?php echo $ndata['FirstName']." ".$ndata['LastName']; ?>
            </div>

                <?php
                  }
                }
                ?>
              </b>
            <div class="mod-data-info">Sport:</div>
            
            <?php 
                $sportsql = "SELECT * FROM Sports WHERE SportsID = '".$pdata['SportsID']."'";
                
                $sportdataresult = mysqli_query($db, $sportsql);
                if($sportdataresult){
                  while($sdata = mysqli_fetch_assoc($sportdataresult)){
            ?>
              <div class="mod-data-data">
                <?php echo $sdata['SName']; ?>
              </div>
            <?php
                  }
                }
              ?>
            <div class="mod-data-info">Date Of Birth:</div>
            <div class="mod-data-data"><?php echo substr($pdata['DOB'], 0, 10) ?></div>
            <div class="mod-data-info">Gender:</div>
            <div class="mod-data-data"><?php echo $pdata['PGender'] ?></div>
          </div>
          <div class="mod-data-box-sub">
            <div class="mod-data-info">Description:</div>
            <div class="mod-data-data-desc">
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Distinctio, quidem.
            </div>
            <div class="mod-data-info">Player ID:</div>
            <div class="mod-data-data"><?php echo $pdata['PlayerID'] ?></div>
            <div class="mod-data-info">Expected Price:</div>
            <div class="mod-data-data"><?php echo $pdata['Price'] ?></div>
            <div class="mod-data-info">Nationality</div>
            <div class="mod-data-data"><?php echo $pdata['PNationality'] ?></div>
          </div>
        </div>
      </div>
      <div class="mod-player-data-check">
        <form action="" class="mod-form">
          <h2>Checks:</h2>
          <div class="mod-data-box-checks">
            <div class="mod-player-form-field">
              <label for="validId" class="form-label">Valid ID?</label>
              <input type="checkbox" name="validId" id="validId" />
            </div>
            <div class="mod-player-form-field">
              <label for="validId" class="form-label">Rating: </label>
              <input type="number" name="rating" id="rating" class="form-box"/>
            </div>
            <div class="mod-player-form-field">
              <label for="price" class="form-label">Price: </label>
              <input type="number" name="price" id="price" class="form-box"/>
            </div>
          </div>
          <h2>Stats:</h2>
          <div class="mod-data-box-stats">
          <!-- <div class="mod-player-form-field">
              <label for="validId" class="form-label">Grade</label>
              <select name="grade" id="grade" class="form-box">
                <option value="A">A</option>
                <option value="A">B</option>
                <option value="A">C</option>
              </select>
            </div> -->
            <div class="mod-player-form-field">
              <label for="validId" class="form-label">Handling</label>
              <input type="number" name="rating" id="rating" class="form-box"/>
            </div>
            <div class="mod-player-form-field">
              <label for="validId" class="form-label">Defense</label>
              <input type="number" name="rating" id="rating" class="form-box"/>
            </div>
            <div class="mod-player-form-field">
              <label for="validId" class="form-label">Shooting</label>
              <input type="number" name="rating" id="rating" class="form-box"/>
            </div>
          </div>
          <button type="submit" class="mod-submit">Submit</button>
        </form>
      </div>
    </div>

    <?php
        }
      }
    ?>
    </div>
  </body>
</html>
