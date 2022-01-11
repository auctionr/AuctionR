<?php
session_start();
$eventname = "";
$eventid ="";
$sport= "";
$nationality= "";
$gender= "";
$maxhome=0;
$maxfor=0;
$sdate="";
$edate="";
$errors = array();

$db = mysqli_connect('localhost', 'root', '','auctionr');

if(isset($_POST['reg_user'])){

    $eventname = mysqli_real_escape_string($db, $_POST['eventname']);
    $eventid = mysqli_real_escape_string($db, $_POST['eventid']);
    $nationality = mysqli_real_escape_string($db,$_POST['nationality']);
    $gender = mysqli_real_escape_string($db, $_POST['gender']);
    $maxhome = mysqli_real_escape_string($db, $_POST['maxhome']);
    $maxfor = mysqli_real_escape_string($db, $_POST['maxfor']);
    $sdate = mysqli_real_escape_string($db, $_POST['sdate']);
    $edate = mysqli_real_escape_string($db, $_POST['edate']);
    if(mysqli_real_escape_string($db, $_POST['sport']== "Basketball" )){
        $sport = 'SP102';
    }
    else{
        $sport = 'SP101';
    }

    if (empty($eventname)) { array_push($errors, "Eventname is required"); }
    if (empty($eventid)) { array_push($errors, "Eventid is required");}

    $user_check_query = "SELECT * FROM event WHERE eventid ='$eventid' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $eid = mysqli_fetch_assoc($result);

    if($eid)
{
    if ($eid['eventid'] === $eventid) {
        array_push($errors, "Event already exists");
      }
}

if (count($errors) == 0) {
    $q1="INSERT INTO event (eventid, ename, maxforiegnplayers, maxhomeplayers, egender, enationality, sportsid, eventstart, eventend) VALUES ('$eventid','$eventname','$maxfor','$maxhome','$gender','$nationality','$sport','$sdate','$edate')";
    mysqli_query($db, $q1);
}
}