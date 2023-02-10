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

//SQLI prevention using mysqli_real_escape_string
$user=stripcslashes($user);
$pass=stripcslashes($pass);
$user=mysqli_real_escape_string($connection, $user);
$pass=mysqli_real_escape_string($connection, $pass);

//SQLI prevention using prepared statement
$stmt = $connection->prepare('SELECT * FROM userpass WHERE user = ? AND pass = ?');
$stmt->bind_param('ss', $user, $pass);
$stmt->execute();
$result = $stmt->get_result();

$row=mysqli_fetch_array($result);
$user1=$row['user'];
$amount=$row['amount'];
if($result){
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