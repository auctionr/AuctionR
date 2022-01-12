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
  <link rel="stylesheet" href="./css/auctionr.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <!-- ------------------------------------------------------------- -->
  <!-- Custom -->
  <title>AuctionR | Add Player</title>
  <link rel="stylesheet" href="./css/addplayer.css" />
  
  <!-- ------------------------------------------------------------- -->
</head>

<body>
  <?php
  $mysqli = new mysqli('localhost', 'root', '','auctionr');
  if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }
 
  // Perform query
  //person table (first, last name), ParameterPlayer(parameters), PlayerData()
  $sql = "SELECT P.FirstName,P.LastName,A.PGender,A.PNationality,A.Username,A.PlayerID,A.Price,B.Value from Person P, PlayerData A , ParameterPlayer B where P.Username=A.Username and B.PlayerID=A.PlayerID and B.ParameterID like '_00' and A.FranchiseID=''";
  $fid = $_GET['fid'];
?>


  <div class="container">
    <div class="dash-nav-fran-prof">
      <img src="../public/Logo2.png" height="70px" width="auto" alt="AuctionR" />
      <div>Add Players</div>
    </div>

    <div class="features">
        <div>
          <input type="text" name="search-text" id="search-text" placeholder="Search text">
          <button class="search-btn">Search</button>
        </div>
        <div>
            <label for="sort-by">Sort By:</label>
            <select name="sort-by" id="sort-by">
              <option value="price-asc">Name</option>
              <option value="price-desc">DOB</option>
              <option value="name-asc">Gender</option>
              <option value="name-desc">Nationality</option>
              <option value="name-desc">Rating</option>
              <option value="name-desc">Batting</option>
              <option value="name-desc">Bowling</option>
              <option value="name-desc">Fielding</option>
              <option value="name-desc">Price</option>
            </select>
            <select name="order" id="order">
              <option value="asc">Ascending</option>
              <option value="desc">Descending</option>
            </select>
          </div>
        <div class="range-slider">
            <span>
               Price: <input type="number" value="25000" min="0" max="120000"/> to 
                <input type="number" value="50000" min="0" max="120000"/>
            </span>
            <input value="25000" min="0" max="120000" step="500" type="range"/>
            <input value="50000" min="0" max="120000" step="500" type="range"/>
        </div>
          
        </div>
        
      </div>
    </div>

    <div class="player-table">
      <table class="table table-dark">
        <thead>
          <tr>
          <th>PlayerID</th>
            <th>UserName</th>
            <th>First Name</th>
            <th>Last Name</th>

            <th>Gender</th>
            <th>Nationality</th>
            
            <th>Rating</th>
             <th>Price</th>
            <th> </th>
          </tr>
        </thead>
        <tbody>
        <?php
   if ($result = $mysqli -> query($sql)) {
    while ($rows=mysqli_fetch_assoc($result)) {

   
  ?>
        
          <tr>
            <td><?php echo $rows['PlayerID'];?></td>
            <td><?php echo $rows['Username'];?></td>
            <td><?php echo $rows['FirstName'];?></td>
            <td><?php echo $rows['LastName'];?></td>
           
            <td><?php echo $rows['PGender'];?></td>
            <td><?php echo $rows['PNationality'];?></td>
            
            <td><?php echo $rows['Value'];?></td>
         
            <td><?php echo $rows['Price'];?></td>
            <td><a href=<?php echo "franchiseconfirmation.php?pid=".$rows['PlayerID']."&fid=".$fid; ?>> <button class="table-btn">Add</button></a></td>
          </tr>
          <?php
    }
    $result->free_result();
        }
  $mysqli -> close();
  ?>
          
        </tbody>
      </table>
    </div>
  </div>
<script>
(function () {
	var parent = document.querySelector(".range-slider");
	if (!parent) return;

	var rangeS = parent.querySelectorAll("input[type=range]"),
		numberS = parent.querySelectorAll("input[type=number]");

	rangeS.forEach(function (el) {
		el.oninput = function () {
			var slide1 = parseFloat(rangeS[0].value),
				slide2 = parseFloat(rangeS[1].value);

			if (slide1 > slide2) {
				[slide1, slide2] = [slide2, slide1];
				// var tmp = slide2;
				// slide2 = slide1;
				// slide1 = tmp;
			}

			numberS[0].value = slide1;
			numberS[1].value = slide2;
		};
	});

	numberS.forEach(function (el) {
		el.oninput = function () {
			var number1 = parseFloat(numberS[0].value),
				number2 = parseFloat(numberS[1].value);

			if (number1 > number2) {
				var tmp = number1;
				numberS[0].value = number2;
				numberS[1].value = tmp;
			}

			rangeS[0].value = number1;
			rangeS[1].value = number2;
		};
	});
})();

</script>
</body>

</html>