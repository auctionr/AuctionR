<?php
session_start();
$username = "";
$email= "";
$teamname = "";
$sport= "";
$budget=0;
$fid="";
$errors = array();

$db = mysqli_connect('localhost', 'root', '','auctionr');

if(isset($_POST['reg_user'])){

    $teamname = mysqli_real_escape_string($db, $_POST['teamname']);
    $email = mysqli_real_escape_string($db,$_POST['email']);
    $username = mysqli_real_escape_string($db, $_POST['username']);
    if(mysqli_real_escape_string($db, $_POST['sport']== "Basketball")){
        $sport = 'SP102';
    }
    else{
        $sport = 'SP101';
    }
    $fid = mysqli_real_escape_string($db, $_POST['fid']);
    $budget = mysqli_real_escape_string($db, $_POST['budget']);
    $password1 = mysqli_real_escape_string($db, $_POST['password1']);
    $password2 = mysqli_real_escape_string($db, $_POST['password2']);

    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($fid)) { array_push($errors, "Franchise ID is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password1)) { array_push($errors, "Password is required"); }
    if ($password1 != $password2) {
      array_push($errors, "The two passwords do not match");
    }

// $user_check_query = "SELECT * FROM frachisedata WHERE franchiseid ='$fid' LIMIT 1";
// $result = mysqli_query($db, $user_check_query);
// $frid = mysqli_fetch_assoc($result);

// if($frid)
// {
//     if ($frid['fid'] === $fid) {
//         array_push($errors, "Franchise already exists");
//       }
// }

$user_check_query1 = "SELECT * FROM login WHERE username ='$username' LIMIT 1";
$result1 = mysqli_query($db, $user_check_query1);
$user = mysqli_fetch_assoc($result1);

if($user)
{
    if ($user['username'] === $username) {
        array_push($errors, "Username already exists");
      }
}

if (count($errors) == 0) {
     $q1="INSERT INTO login (username, pass, email) VALUES ('$username','$password1','$email')";
     mysqli_query($db, $q1);
     $q3="INSERT INTO franchisedata (franchiseid, fname, username, credit) VALUES ('$fid','$teamname','$username','$budget')";
     mysqli_query($db, $q3);
}
}
