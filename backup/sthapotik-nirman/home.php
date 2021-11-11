<?php
  include('session.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>STHAPOTIK NIRMAN</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<?php
  include('navbar.php');
  //require $_SERVER['DOCUMENT_ROOT'].'/loginphp/navbar.php';
?>
  
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-default">
        <div class="panel-heading">Dashboard</div>
        <div class="panel-body">You are logged in!</div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
