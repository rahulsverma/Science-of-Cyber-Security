<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="css/global.css" type="text/css" rel="stylesheet">
</head>

<title>Login Successful</title>

<body>
  <div class="container-fluid bg">
    <div class="row">
      <div class="col-md-4 col-sm-4 col-xs-12"></div>
      <div class="col-md-4 col-sm-4 col-xs-12">
        <form class=container>
          <h1>Account Details:</h1>
          <h3>Username:</h3>
          <h2 style="margin-top: -10px;"><?php echo $_GET['user']; ?></h2>
          <br>
          <h3>Balance($):</h3>
          <h2 style="margin-top: -10px;"><?php echo $_GET['amount']; ?></h2>

          <div class="col-md-4 col-sm-4 col-xs-12"></div>
          <a href="index.php"><button type="button" class="btn btn-success">Log Out</button></a>
      </div>
    </div>
  </div>

</body>

</html>