<?php
session_start();
$username = "";
$email= "";
$firstname = "";
$lastname= "";
$DOB= "";
$gender = "";
$nationality= "";
$sport= "";
$playerid= "";
$price=0;
$errors = array();

$db = mysqli_connect('localhost', 'root', '','auctionr');

if(isset($_POST['reg_user'])){

    $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
    $email = mysqli_real_escape_string($db,$_POST['email']);
    $DOB = mysqli_real_escape_string($db, $_POST['DOB']);
    $gender = mysqli_real_escape_string($db, $_POST['gender']);
    $nationality = mysqli_real_escape_string($db, $_POST['nationality']);
    if(mysqli_real_escape_string($db, $_POST['sport']== "Basketball")){
        $sport = 'SP102';
    }
    else{
        $sport = 'SP101';
    }
    $playerid = mysqli_real_escape_string($db, $_POST['playerid']);
    $price = mysqli_real_escape_string($db, $_POST['price']);
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password1 = mysqli_real_escape_string($db, $_POST['password1']);
    $password2 = mysqli_real_escape_string($db, $_POST['password2']);

    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password1)) { array_push($errors, "Password is required"); }
    if ($password1 != $password2) {
      array_push($errors, "The two passwords do not match");
    }

$user_check_query = "SELECT * FROM login WHERE username ='$username' LIMIT 1";
$result = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($result);

if($user)
{
    if ($user['username'] === $username) {
        array_push($errors, "Username already exists");
      }
}

if (count($errors) == 0) {
    $query = "INSERT INTO login (username, email, password) 
              VALUES('$username', '$email', '$password1')";
    mysqli_query($db, $query);

}
}
