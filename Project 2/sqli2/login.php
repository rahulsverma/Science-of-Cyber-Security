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

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="css/global.css" type="text/css" rel="stylesheet">
</head>

<title>SQLI Detection</title>

<body>
  <div class="container-fluid bg">
    <div class="row">
      <div class="col-md-4 col-sm-4 col-xs-12"></div>
      <form class="container">
        <h2 style="text-align=left">The entered Username is "<?php echo $user; ?>" </h2>
        <h2 style="text-align=left"> for which "<?php echo "  "; echo $categoryr; ?>" </h2>

    </div>
  </div>
  </div>

</body>

</html>