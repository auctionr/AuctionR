<?php include('server2.php') ?>
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
    <link rel="stylesheet" href="./css/register.css" />
    <link rel="stylesheet" href="./css/auctionr.css" />
    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>

    <!-- ------------------------------------------------------------- -->
    <!-- Custom -->
    <title>AuctionR | Register</title>
    <link rel="stylesheet" href="/path/to/bootstrap.min.css">
<link href="/path/to/dist/bootstrap-image-checkbox.css" rel="stylesheet">
    <!-- ------------------------------------------------------------- -->
  </head>
  <body>
    <div class="container">
      <div class="dash-nav">
       <a href="index.html"><img
          src="../public/Logo2.png"
          height="80px"
          width="auto"
          alt="AuctionR"
        /></a> 
      </div>
      <h1 class="about-title">Franchise Registeration</h1>
      <form method="POST" action="franchiseregister.php"> 
        <?php include("errors.php"); ?>
    <section class="vh-100 register">
        <div class="container h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-9">
      
             
      
              <div class="card" style="border-radius: 0px;">
                <div class="card-body ">
      
                  <div class="row align-items-center pt-4 pb-3 ">
                    <div class="col-md-3 ps-5">
      
                      <h6 class="mb-0">Team name</h6>
      
                    </div>
                    <div class="col-md-9 pe-5">
      
                      <input type="text" class="form-control form-control-lg" name="teamname" value="<?php echo $teamname; ?>"/>
      
                    </div>
                  </div>
                 
      
                  <hr class="mx-n3">
      
                  <div class="row align-items-center py-3">
                    <div class="col-md-3 ps-5">
      
                      <h6 class="mb-0">Email address</h6>
      
                    </div>
                    <div class="col-md-9 pe-5">
      
                      <input type="email" class="form-control form-control-lg"name="email" value="<?php echo $email; ?>"/>
      
                    </div>
                  </div>
                  <div class="row align-items-center py-3">
                    <div class="col-md-3 ps-5">
      
                      <h6 class="mb-0">FranchiseID</h6>
      
                    </div>
                    <div class="col-md-9 pe-5">
      
                      <input type="tel" class="form-control form-control-lg"name="fid" value="<?php echo $fid; ?>"/>
      
                    </div>
                  </div>
      
                  <hr class="mx-n3">
                  <div class="row align-items-center py-3">
                    <div class="col-md-3 ps-5">
      
                      <h6 class="mb-0">Sport</h6>
      
                    </div>
                    <div class="col-md-9 pe-5">
      
                      <input type="text" class="form-control form-control-lg" name="sport" value="<?php echo $sport; ?>"/>
      
                    </div>
                  </div>
                  <div class="row align-items-center py-3">
                    <div class="col-md-3 ps-5">
      
                      <h6 class="mb-0">Credits</h6>
      
                    </div>
                    <div class="col-md-9 pe-5">
      
                      <input type="text" class="form-control form-control-lg" name="budget" value="<?php echo $budget; ?>"/>
      
                    </div>
                  </div>
      
                  <hr class="mx-n3">
                  <hr class="mx-n3">
                
                  <div class="row align-items-center py-3">
                    <div class="col-md-3 ps-5">
      
                      <h6 class="mb-0">Username</h6>
      
                    </div>
                    <div class="col-md-9 pe-5">
      
                      <input type="text" class="form-control form-control-lg" name="username" value="<?php echo $username; ?>"/>
                    </div>
                  </div>
      
                  <div class="row align-items-center py-3">
                    <div class="col-md-3 ps-5">
      
                      <h6 class="mb-0">Password</h6>
      
                    </div>
                    <div class="col-md-9 pe-5">
      
                      <input type="password" class="form-control form-control-lg" name="password1"/>
      
                    </div>
                  </div>
                  <div class="row align-items-center py-3">
                    <div class="col-md-3 ps-5">
      
                      <h6 class="mb-0">Confirm Password</h6>
      
                    </div>
                    <div class="col-md-9 pe-5">
      
                      <input type="password" class="form-control form-control-lg" name="password2" />
      
                    </div>
                  </div>
                  <hr class="mx-n3">
                  <div class="px-5 py-4">
                  <button type="submit" class="submit" name="reg_user"><a href="login.php" align="center">SUBMIT</a></button>
                  </div>
      
                </div>
              </div>
      
            </div>
          </div>
        </div>
      </section>
      </body>
</html>