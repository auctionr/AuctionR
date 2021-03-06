<?php include('server1.php') ?>
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
    <title>AuctionR | Add Events</title>

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
     
     
    <section class="vh-100 register">
        <div class="container h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-9">
              <form method="post" action="events.php">
                <?php include('errors.php'); ?>
                <h1 class="about-title">Create Event</h1>
      
              <div class="card" style="border-radius: 0px;">
                <div class="card-body ">
      
                  <div class="row align-items-center pt-4 pb-3 ">
                    <div class="col-md-3 ps-5">
      
                      <h6 class="mb-0">Event name</h6>
      
                    </div>
                    <div class="col-md-9 pe-5">
      
                      <input type="text" class="form-control form-control-lg" name="eventname" value="<?php echo $eventname; ?>"/>

      
                    </div>
                  </div>
                 

                  <div class="row align-items-center py-3">
                    <div class="col-md-3 ps-5">
      
                      <h6 class="mb-0">EventID</h6>
      
                    </div>
                    <div class="col-md-9 pe-5">
      
                      <input type="type" class="form-control form-control-lg" name="eventid" value="<?php echo $eventid; ?>"/>
      
                    </div>
                  </div>
                  <hr class="mx-n3">
      
                  <div class="row align-items-center py-3">
                    <div class="col-md-3 ps-5">
      
                      <h6 class="mb-0">Sport</h6>
      
                    </div>
                    <div class="col-md-9 pe-5">
      
                      <input type="type" class="form-control form-control-lg" name="sport" value="<?php echo $sport; ?>"/>
      
                    </div>
                  </div>
                  <div class="row align-items-center py-3">
                    <div class="col-md-3 ps-5">
      
                      <h6 class="mb-0">Region</h6>
      
                    </div>
                    <div class="col-md-9 pe-5">
      
                      <input type="text" class="form-control form-control-lg" name="nationality" value="<?php echo $nationality; ?>" />
      
                    </div>
                </div>
                  <div class="row align-items-center py-3">
                    <div class="col-md-3 ps-5">
      
                      <h6 class="mb-0">Gender</h6>
      
                    </div>
                    <div class="col-md-9 pe-5">
      
                      <input type="text" class="form-control form-control-lg" name="gender" value="<?php echo $gender; ?>" />
      
                    </div>
                  </div>
                  <hr class="mx-n3">
                  <hr class="mx-n3">
                  <div class="row align-items-center py-3">
                    <div class="col-md-3 ps-5">
      
                      <h6 class="mb-0">Maximum Home Players</h6>
      
                    </div>
                    <div class="col-md-9 pe-5">
      
                      <input type="number" class="form-control form-control-lg" name="maxhome" value="<?php echo $maxhome; ?>"/>
      
                    </div>
                </div>
                  <div class="row align-items-center py-3">
                    <div class="col-md-3 ps-5">
      
                      <h6 class="mb-0">Maximum Foreign Players</h6>
      
                    </div>
                    <div class="col-md-9 pe-5">
      
                      <input type="number" class="form-control form-control-lg" name="maxfor" value="<?php echo $maxfor; ?>"/>
                    </div>
                  </div>   
                  <div class="row align-items-center py-3">
                    <div class="col-md-3 ps-5">
      
                      <h6 class="mb-0">Start Date</h6>
      
                    </div>
                    <div class="col-md-9 pe-5">
      
                      <input type="text" placeholder="yyyy-mm-dd" class="form-control form-control-lg" name="sdate" value="<?php echo $sdate; ?>" />
                    </div>
                  </div>  
                  <div class="row align-items-center py-3">
                    <div class="col-md-3 ps-5">
      
                      <h6 class="mb-0">End Date</h6>
      
                    </div>
                    <div class="col-md-9 pe-5">
                      <input type="text" placeholder="yyyy-mm-dd" class="form-control form-control-lg" name="edate" value="<?php echo $edate; ?>"/>
                    </div>
                  </div>             
              </div>
              
            </div>
            <div class="px-5 py-4" style=" display: flex;
            justify-content: center;">
                <button type="submit" class="submit" name="reg_user"><a href="eventdisplay.php" align="center">Confirm Event</a></button>
              </div>
          </div>
          
        </div>
      </section>
      </body>
</html>