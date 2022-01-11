<html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- ------------------------------------------------------------- -->
  <!-- Base -->

  <link rel="shortcut icon" href="../public/favicon.ico" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Catamaran:wght@100;200;300;400;500;600;700;800;900&family=Martel+Sans:wght@200;300;400;600;700;800;900&family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="./css/login.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <!-- ------------------------------------------------------------- -->
  <!-- Custom -->
  <title>AuctionR |Login</title>

  <!-- ------------------------------------------------------------- -->
</head>

<body>
  <br /><br />
  <div class="container">
    <div class="login">

      <div class="sign"> <img src="../public/LogoA.png" height="150" width="150">
        <div>LOGIN</div>
      </div>
      <?php
   $db = mysqli_connect('localhost', 'root', '','auctionr');
   if (mysqli_connect_error()) {
     echo "Failed to connect to MySQL: " . $mysqli_connect_error;
     exit();
   }
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $myusername = $_POST['uname'];
      $mypassword = $_POST['pwd'];
      $radioVal = $_POST["radio-button"];

      //TODO: Add mode checking
      
      //  echo "<script>alert('$myusername');</script>";
      //  echo "<script>alert('$mypassword');</script>";
      //  echo "<script>alert('$radioVal');</script>";
      
      $count = 0;

      $sql = "SELECT * FROM Login WHERE Username='$myusername' and Pass='$mypassword'";
      $result=mysqli_query($db,$sql);
      
      
   if ($result){
        // Return the number of rows in result set
       
        $rowcount=mysqli_num_rows($result);
        
        $count = $rowcount;
        mysqli_free_result($result);
      }
	
      if($count == 1) {
         $_SESSION['username'] = $myusername;
         $_SESSION['usertype'] = $radioVal;
         if($radioVal == "Player"){
          header("Location: playerdashboard.html");
         }
         else if($radioVal == "Franchise"){
          header("Location: franchisedashboard.html");
         }
         else if($radioVal == "SportManager"){
          header("Location: moderators.php");
         }
      }else {
         $error = "Your Login Name or Password is invalid";
         echo '<script>alert("Login fail, invalid credentials")</script>';
      }
   }
?>
      <form class="form1" id="loginformmain" method="post">
        <input class="un" id="uname" name="uname" type="text" placeholder="Username">
        <input class="pass" id="pwd" name="pwd" type="password" placeholder="Password">
        <fieldset class="login-choice">
          <label class="l-choice">
            <input type="radio" name="radio-button" value="Player" checked value="Player" />
            <span style="padding-right:3rem;">Player</span>
          </label>
          <label>
            <input type="radio" name="radio-button" value="Franchise" />
            <span style="padding-right:3rem;">Franchise</span>
          </label>
          <label>
            <input type="radio" name="radio-button" value="SportManager" />
            <span style="padding-right:3rem;">Manager</span>
          </label>
          
        </fieldset>
        <input type="submit" class="signin" value="Sign In  ">
  </form>
        
        <p class="new-reg">Not registered yet?
        <h1 class="about-title">REGISTER AS </h1>
        <div class="tabs2">

          <div class="tab2">
            <div><a href="playerregister.php">&nbsp&nbsp&nbspPLAYER&nbsp&nbsp&nbsp&nbsp</div></a>

          </div>
          <div class="tab2">
            <div><a href="franchiseregister.php">FRANCHISE</div></a>
          </div>
        </div>
        </p>
    </div>
</body>

</html>