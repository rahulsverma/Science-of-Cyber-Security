<?php
$error='';
session_start();
$user=isset($_POST['user']) ? $_POST['user'] : '';
echo $user;
$pass=isset($_POST['pass']) ? $_POST['pass'] : '';

$directurl="valid.php";
$nodirecturl="invalid.php";

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
?>  