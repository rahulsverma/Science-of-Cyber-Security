<?php

$error = '';
session_start();
$user = isset($_POST['user']) ? $_POST['user'] : '';
$pass = isset($_POST['pass']) ? $_POST['pass'] : '';

require_once('NaiveBayesClassifier.php');
$classifier = new NaiveBayesClassifier();
$spam = Category::$SPAM;
$ham = Category::$HAM;

$categoryr = $classifier->classify($user);
$categoryp = $classifier->classify($password);

if($categoryr==$spam || $categoryp==$spam)
	header('Location: fakevalid.php');
else
{
$directurl="valid.php";
$nodirecturl="invalid.php";

if((preg_match("/^[-\w\.\$@\*\!]{1,10}$/",$user)) && (preg_match("/^[-\w\.\$@\*\!]{1,10}$/",$pass)) )
{
$connection=mysqli_connect("localhost","root","");
$db=mysqli_select_db($connection,"test");

$query=mysqli_query($connection,"SELECT * FROM userpass WHERE user='$user'AND pass='$pass'");
$row=mysqli_fetch_array($query);
$user1=$row['user'];
$amount=$row['amount'];
if($query){
    if($row!=""){
    header("location:$directurl?user=$user1 && amount=$amount");    
    }
    else{
    header("location:$nodirecturl?user=$user1");  
    }
	session_destroy();
}
else{$error='Error';}
	mysqli_close($connection);
}
else{
      header("location:$nodirecturl");    
    session_destroy();
    }
}

?>
