<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="css/global.css" type="text/css" rel="stylesheet">
	<!-- SQLI Prevention using input validation -->
	<script>
		function validate() {
			var bool = /^[-\w\.\$@\*\!]{1,10}$/.test(document.getElementById("user").value);
			var next = /^[-\w\.\$@\*\!]{1,15}$/.test(document.getElementById("pass").value);
			if (bool == false || next == false) {
				document.getElementById("form").action = "invalid.php";
			}
		}
	</script>
	<title>SQLI3</title>
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
						<input type="password" class="form-control" id="pass" placeholder="Enter your Password" name="pass">
					</div>

					<button type="Submit" onclick="validate()" class="btn btn-success btn-block">Log In</button>

			</div>
			</form>
			<div class="col-md-4 col-sm-4 col-xs-12"></div>
		</div>
	</div>

</body>

</html>