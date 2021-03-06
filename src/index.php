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
    <title>AuctionR | Home</title>

    <script src="./js/home.js"></script>
    <!-- ------------------------------------------------------------- -->
  </head>
  <body>
   
    <div class="container">
      <div class="hero">
        <div class="home-nav">
          <div class="btn yellow-home-btn">
            <a href="login.php"> Login/Register </a>
          </div>
        </div>
        <div class="home-logo">
          <img src="../public/Logo.png" alt="AuctionR Logo" />
        </div>

        <div class="home-slogan">Auctions , Simplified</div>

        <i class="fas fa-angle-double-down fa-3x arrow"></i>
      </div>

      <div class="about-us">
        <div class="about-title">About Us</div>
        <div class="about-desc">
          AuctionR is an online multisport auction platform for selection of players for sporting franchises. Holding auctions online auctions break down and remove the physical limitations of traditional auctions such as geography, presence, time, space.???
          It can also target a wider range of audience???.
           Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Voluptatibus eveniet similique iure! Placeat vitae, labore dicta
                ipsum esse nisi dolores.
        </div>

        <div class="showcase">
          <div class="about-title">Features</div>
          <div class="show1">
            <img
              src="../public/svg/events.svg"
              alt="Events"
              class="feature-img"
            />
            <div class="show1-desc">
              <h4>Events</h4>
              <p>
              We have different events happening from time to time. Our sport managers create and organise events.
               Franchises are given the option to join multiple events with their teams.
  
              </p>
            </div>
          </div>
          <div class="show1">
            <div class="show1-desc">
              <h4>Franchises</h4>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Voluptatibus eveniet similique iure! Placeat vitae, labore dicta
                ipsum esse nisi dolores.
              </p>
            </div>
            <img
              src="../public/svg/team.svg"
              alt="Events"
              class="feature-img"
            />
          </div>
          <div class="show1">
            <img
              src="../public/svg/players.svg"
              alt="Events"
              class="feature-img"
            />
            <div class="show1-desc">
              <h4>Players</h4>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Voluptatibus eveniet similique iure! Placeat vitae, labore dicta
                ipsum esse nisi dolores.
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="footer">
        <div>
          <a href="https://github.com/auctionr"
            ><i class="fab fa-github fa-2x"></i> &nbsp; Github</a
          >
        </div>
        <p>Copyright ?? AuctionR</p>
      </div>
    </div>
  </body>
</html>
