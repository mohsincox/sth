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
      <a class="navbar-brand" href="#" style="color: #FFFFFF">STHAPOTIK NIRMAN</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="/sthapotik-nirman/project-category-create.php">Category Create</a></li>
        <li><a href="/sthapotik-nirman/project-category-index.php" style="color: #FFFFFF">Category List</a></li>
        <li class="active"><a href="/sthapotik-nirman/project-create.php">Project Create</a></li>
        <li><a href="/sthapotik-nirman/project-index.php" style="color: #FFFFFF">Project List</a></li>
        <li class="active"><a href="/sthapotik-nirman/sub-project-create.php">Sub Project Create</a></li>
        <li><a href="/sthapotik-nirman/sub-project-index.php" style="color: #FFFFFF">Sub Project List</a></li>
        <li class="active"><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $login_session; ?></a></li>
        <li><a href="/sthapotik-nirman/logout.php" style="color: #FFFFFF"><span class="glyphicon glyphicon-log-out"></span> LOG OUT</a></li>
      </ul>
    </div>
  </div>
</nav>