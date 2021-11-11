<?php
	include_once('session.php');
?>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#" style="color: #FFFFFF;">Bhalobasahar Bangladesh</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="/bhalobasharbd/home.php">Home</a></li>
        <li class=""><a href="/bhalobasharbd/vd-log/index.php" style="color: #FFFFFF;">vd log</a></li>
        <li class="active"><a href="/bhalobasharbd/vd-list/index.php">vd list</a></li>
        <!-- <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">D2D <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Campaign 1-1</a></li>
            <li><a href="#">Campaign 1-2</a></li>
            <li><a href="#">Campaign 1-3</a></li>
          </ul>
        </li>
        <li class="dropdown active">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">DIGITAL <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/bhalobasharbd/vd-log/index.php">vd log</a></li>
            <li><a href="#">Campaign 1-2</a></li>
            <li><a href="#">Campaign 1-3</a></li>
          </ul>
        </li> -->
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $login_session; ?></a></li>
        <li><a href="/bhalobasharbd/logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
      </ul>
    </div>
  </div>
</nav>