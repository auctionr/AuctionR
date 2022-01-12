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
    <link rel="stylesheet" href="./css/moderators.css" />
    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>

    <!-- ------------------------------------------------------------- -->
    <!-- Custom -->
    <title>AuctionR | Managers</title>

    <!-- ------------------------------------------------------------- -->
  </head>
  <body>
    <?php
    $mysqli = new mysqli('localhost', 'root', '','auctionr');
    if ($mysqli -> connect_errno) {
      echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
      exit();
    }
    $mod = $_GET['uname'];
   
    // Perform query
    //person table (first, last name), ParameterPlayer(parameters), PlayerData()
   $sql = "SELECT P.FirstName,P.LastName from Person P inner join PlayerData D where D.verified='no'and P.Username = D.Username";
   
  ?>
    <div class="container">
      <div class="dash-nav">
        <a href="index.html"
          ><img
            src="../public/Logo2.png"
            height="80px"
            width="auto"
            alt="AuctionR"
        /></a>
        <div class="dash-info">Sport Manager</div>
      </div>
      <div class="mod">
        <div class="table-top">
          <h2 class="player-req">Player requests:</h2>
          <a href="events.php"><button class="add-event">Add event</button></a>
        </div>

        <table class="table table-dark table-hover">
          <thead>
          <?php
         // Perform query
    //person table (first, last name), ParameterPlayer(parameters), PlayerData()
   $sql = "SELECT FirstName,LastName from Person P where Username='".$mod."'"; 
  
   if ($result = $mysqli -> query($sql)) {
    while ($rows=mysqli_fetch_assoc($result)) {
  ?>
            
            <th >Manager : <?php echo $rows['FirstName'];echo str_repeat('&nbsp;', 2);echo $rows['LastName'];?></th>
            
          </thead>
          <?php 
    }
    $result->free_result();
        }

  ?>
       
  </table>
  <ul>
        <?php
         // Perform query
    //person table (first, last name), ParameterPlayer(parameters), PlayerData()
   $sql = "SELECT P.FirstName,P.LastName,D.PlayerID from Person P inner join PlayerData D where D.verified='no'and P.Username = D.Username";
   if ($result = $mysqli -> query($sql)) {
    while ($rows=mysqli_fetch_assoc($result)) {
  ?>
        
         
          <li>
          <?php echo "<a href='modconfirm.php?pid=".$rows['PlayerID']."'>".$rows['FirstName']." ".$rows['LastName']."</a>";?>
          <span class="close">&times;</span>
        </li>
    
          <?php 
    }
    $result->free_result();
        }

  ?>
  </ul>
  </div>
 
     
    <script>
      var closebtns = document.getElementsByClassName("close");
      var i;

      for (i = 0; i < closebtns.length; i++) {
        closebtns[i].addEventListener("click", function () {
          this.parentElement.style.display = "none";
        });
      }
    </script>
  </body>
</html>
