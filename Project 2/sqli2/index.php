<?php

require_once('NaiveBayesClassifier.php');

$classifier = new NaiveBayesClassifier();
$spam = Category::$SPAM;
$ham = Category::$HAM;


$classifier->train("$$, dollars", $spam);
$classifier->train("The possibility of it being an injection query increases with the length of the string", $spam);
$classifier->train("105; DROP TABLE Users", $spam);
$classifier->train("this is a spam username and password", $spam);
$classifier->train("drop * <>", $spam);
$classifier->train("drop * from database", $spam);
$classifier->train("drop * from database", $spam);
$classifier->train("select * from database", $spam);
$classifier->train("1 OR 1=1 and drop", $spam);
$classifier->train("1 or 1 = 1", $spam);
$classifier->train("1 or 1 = 1 and user <> rahul", $spam);
$classifier->train("select * FROM db", $spam);
$classifier->train("105; DROP TABLE Users", $spam);
$classifier->train("delete * from database", $spam);
$classifier->train("105; INSERT into TABLE Users", $spam);
$classifier->train("1 or 1 = 1 and user <> john", $spam);

$classifier->train("rahul", $ham);
$classifier->train("john", $ham);
$classifier->train("rverma4", $ham);
$classifier->train("erenjaeger", $ham);
$classifier->train("killua@hxh", $ham);
$classifier->train("natusvincere", $ham);
$classifier->train("milesmorales", $ham);
$classifier->train("teamliquid.fc", $ham);
$classifier->train("johanliebert", $ham);
$classifier->train("Gojo666", $ham);
$classifier->train("Gon@hxh", $ham);
$classifier->train("Killua999", $ham);
$classifier->train("Goku111", $ham);
$classifier->train("freiza222", $ham);
$classifier->train("astralis.fc", $ham);
$classifier->train("hinatashoyo", $ham);
$classifier->train("kennys@cs", $ham);
$classifier->train("chainsawman", $ham);
$classifier->train("hyperbeast", $ham);
$classifier->train("doritojoe", $ham);

?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="css/global.css" type="text/css" rel="stylesheet">

	<title>SQLI2</title>
</head>

<body>

	<div class="container-fluid bg">
		<div class="row">
			<div class="col-md-4 col-sm-4 col-xs-12"></div>
			<div class="col-md-4 col-sm-4 col-xs-12">

				<form class=form-container action="login.php" method="POST">

					<h1>Bank Website</h1>
					<div class="form-group username">

						<label for="username"></label>
						<input type="text" class="form-control" id="user" placeholder="Enter your Username" name="user">
					</div>

					<div class="form-group password">
						<label for="pwd"></label>
						<input type="password" class="form-control" id="pass" placeholder="Enter your password" name="pass">
					</div>

					<button type="Submit" class="btn btn-success btn-block">Log In</button>

			</div>
			</form>
			<div class="col-md-4 col-sm-4 col-xs-12"></div>
		</div>
	</div>

</body>

</html>