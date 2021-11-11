<?php
	include('session.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  	<title>BhalobasharBD</title>
  	<!-- <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
    <link href="css/style.min.css" rel="stylesheet">
    <link href="css/style_dash.css" rel="stylesheet">
</head>
<body>

<?php
	include('navbar.php');
	//require $_SERVER['DOCUMENT_ROOT'].'/loginphp/navbar.php';
?>
  
<div class="container">
  <?php
    include_once('db_connection_asterisk.php');
    
    if ($connAsterisk->connect_error) {
        die("Connection failed: " . $connAsterisk->connect_error);
    } 

    //$sql_find = "SELECT `lead_id`, `phone_number`, `status` FROM `vicidial_list` WHERE  `phone_number` = '$phone_number' AND  `status` = 'SVYHU' AND (`modify_date` BETWEEN '$start_date_time' AND '$end_date_time')";

    $sql = "SELECT `lead_id`, `phone_number`, `status` FROM `vicidial_list`";
    $result = $connAsterisk->query($sql);

    $total = $result->num_rows;

    //echo "<br>";
        
    $sql_success = "SELECT `lead_id`, `phone_number`, `status` FROM `vicidial_list` WHERE `status` = 'SVYHU' ";
    $result_success = $connAsterisk->query($sql_success);  

    $success = $result_success->num_rows; 

    $connAsterisk->close();
?>

  <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading text-center"><code style="font-size: 25px;">ভালবাসার বাংলাদেশ কুইজ</code></div>
                <div class="panel-body" style="background-color: #b0ecf9">

                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-aqua"><i class="fa fa-clock-o"></i></span>
                                <div class="info-box-content">
                                    <center><span class="info-box-text" style="font-size: 39px;"><?php echo date("h:i"); ?></span></center>
                                    <center><span class="info-box-number" style="font-size: 18px;"><?php echo date("d/m/Y"); ?></span></center>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon purple" style="color: #fff !important;"><i class="fa fa-bell-o"></i></span>
                                <div class="info-box-content">
                                    <center><span class="info-box-text" style="font-size: 18px;">Total Misscall</span></center>
                                    <center><span class="info-box-number" style="font-size: 33px;"><?php echo $total; ?></span></center>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-aqua"><i class="fa fa-phone"></i></span>
                                <div class="info-box-content">
                                    <center><span class="info-box-text" style="font-size: 18px;">Ticket</span></center>
                                    <center><span class="info-box-number" style="font-size: 39px;"><?php //echo $total; ?></span></center>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="info-box bg-green">
                                <span class="info-box-icon"><i class="fa fa-hand-o-right"></i></span>
                                <div class="info-box-content">
                                    <center><span class="info-box-text" style="font-size: 18px;">Participated</span></center>
                                    <center><span class="info-box-number" style="font-size: 39px;" id="answer_ticket"><?php echo $success; ?></span></center>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-aqua"><i class="glyphicon glyphicon-phone"></i></span>
                                <div class="info-box-content">
                                    <center><span class="info-box-text" style="font-size: 18px;">Ticket</span></center>
                                    <center><span class="info-box-number" style="font-size: 39px;"><?php //echo $success; ?></span></center>
                                </div>
                            </div>
                        </div> -->
                    </div>

                    <!-- =========================================================== -->

                    <!-- <div class="row">
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="info-box bg-green">
                                <span class="info-box-icon"><i class="fa fa-hand-o-right"></i></span>
                                <div class="info-box-content">
                                    <center><span class="info-box-text" style="font-size: 18px;">Answer</span></center>
                                    <center><span class="info-box-number" style="font-size: 39px;" id="answer_ticket">{{ 11 }}</span></center>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="info-box bg-green">
                                <span class="info-box-icon"><i class="fa fa-bullhorn"></i></span>
                                <div class="info-box-content">
                                    <center><span class="info-box-text" style="font-size: 18px;">Answer</span></center>
                                    <center><span class="info-box-number" style="font-size: 39px;" id="answer_ticket">{{ 44 }}</span></center>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="info-box bg-green">
                                <span class="info-box-icon"><i class="fa fa-tty"></i></span>
                                <div class="info-box-content">
                                    <center><span class="info-box-text" style="font-size: 18px;">Answer</span></center>
                                    <center><span class="info-box-number" style="font-size: 39px;" id="answer_ticket">{{ 77 }}</span></center>
                                </div>
                            </div>
                        </div> 
                    </div> -->

                    <!-- =========================================================== -->

                     <!-- <div class="row">
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon purple" style="color: #fff !important;"><i class="fa fa-bell-o"></i></span>
                                <div class="info-box-content">
                                    <center><span class="info-box-text" style="font-size: 18px;">Pending</span></center>
                                    <center><span class="info-box-number" style="font-size: 33px;">{{ 11 }}</span></center>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon purple" style="color: #fff !important;"><i class="fa fa-bar-chart"></i></span>
                                <div class="info-box-content">
                                    <center><span class="info-box-text" style="font-size: 18px;">Pending</span></center>
                                    <center><span class="info-box-number" style="font-size: 33px;">{{ 55 }}</span></center>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon purple" style="color: #fff !important;"><i class="fa fa-headphones"></i></span>
                                <div class="info-box-content">
                                    <center><span class="info-box-text" style="font-size: 18px;">Pending</span></center>
                                    <center><span class="info-box-number" style="font-size: 33px;">{{ 33 }}</span></center>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <!-- =========================================================== -->

                    <!-- <div class="row">
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="info-box bg-red">
                                <span class="info-box-icon "><i class="fa fa-pause"></i></span>
                                <div class="info-box-content">
                                    <center><span class="info-box-text" style="font-size: 18px;">Closed</span></center>
                                    <center><span class="info-box-number" style="font-size: 33px;">{{ 88 }}</span></center>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="info-box bg-red">
                                <span class="info-box-icon "><i class="fa fa-arrow-right"></i></span>
                                <div class="info-box-content">
                                    <center><span class="info-box-text" style="font-size: 18px;">Closed</span></center>
                                    <center><span class="info-box-number" style="font-size: 33px;">{{ 99 }}</span></center>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="info-box bg-red">
                                <span class="info-box-icon "><i class="fa fa-share"></i></span>
                                <div class="info-box-content">
                                    <center><span class="info-box-text" style="font-size: 18px;">Closed</span></center>
                                    <center><span class="info-box-number" style="font-size: 33px;">{{ 55 }}</span></center>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <!-- =========================================================== -->

                    <!-- <div class="row">
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-yellow"><i class="glyphicon glyphicon-export"></i></span>
                                <div class="info-box-content">
                                    <center><span class="info-box-text" style="font-size: 18px;">Ticket</span></center>
                                    <center><span class="info-box-number" style="font-size: 39px;">{{ 44 }}</span></center>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-yellow"><i class="glyphicon glyphicon-saved"></i></span>
                                <div class="info-box-content">
                                    <center><span class="info-box-text" style="font-size: 18px;">Ticket</span></center>
                                    <center><span class="info-box-number" style="font-size: 39px;">{{ 33 }}</span></center>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-yellow"><i class="glyphicon glyphicon-download-alt"></i></span>
                                <div class="info-box-content">
                                    <center><span class="info-box-text" style="font-size: 18px;">Ticket</span></center>
                                    <center><span class="info-box-number" style="font-size: 39px;">{{ 33 }}</span></center>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <!-- =========================================================== -->

                    <!-- Small boxes (Stat box) -->
                    <!-- <div class="row">
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="small-box bg-aqua" style="background-color: #008080 !important;">
                                <div class="inner">
                                    <h3>{{ 33 }}</h3>
                                    <p><b>Logistics Ticket, Invoice Call</b></p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-files-o"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="small-box bg-aqua" style="background-color: #008080 !important;">
                                <div class="inner">
                                    <h3>{{ 44 }}</h3>
                                    <p><b>Sales Ticket, Invoice Call</b></p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-clipboard"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="small-box bg-aqua" style="background-color: #008080 !important;">
                                <div class="inner">
                                    <h3>{{ 55 }}</h3>
                                    <p><b>AC (Service-Other Brand) Ticket, Invoice Call</b></p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <!-- =========================================================== -->
                    
                    <!-- Small boxes (Stat box) -->
                    <!-- <div class="row">
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>{{ 66 }}</h3>
                                    <p><b>Sales Ticket</b></p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-hand-o-right"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>{{ 77 }}</h3>
                                    <p><b>Marketing Ticket</b></p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-anchor"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>{{ 44 }}</h3>
                                    <p><b>Factory Ticket</b></p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-tablet"></i>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <!-- =========================================================== -->

                    <!-- <div class="row">
                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <div class="circle-tile ">
                                <div class="circle-tile-heading green"><i class="fa fa-users fa-fw fa-3x"></i></div>
                                <div class="circle-tile-content green" style="padding-top: 40px;">
                                    <div class="circle-tile-number text-faded" id="new_total" style="font-size: 32px;">{{ 22 }}</div>
                                    <div class="circle-tile-description text-faded"> <h4 style="margin-top: 0; margin-bottom: 0;"> Users </h4> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <div class="circle-tile ">
                                <div class="circle-tile-heading blue"><i class="fa fa-calendar fa-fw fa-3x"></i></div>
                                <div class="circle-tile-content blue" style="padding-top: 40px;">
                                    <div class="circle-tile-number text-faded" id=""  style="font-size: 32px;">{{ 99 }}</div>
                                    <div class="circle-tile-description text-faded"> <h4 style="margin-top: 0; margin-bottom: 0;"> Total Ticket </h4></div> 
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <div class="circle-tile ">
                                <div class="circle-tile-heading dark-blue"><i class="fa fa-check fa-fw fa-3x"></i></div>
                                <div class="circle-tile-content dark-blue" style="padding-top: 40px;">
                                    <div class="circle-tile-number text-faded" id=""  style="font-size: 32px;">{{ 22 }}</div>
                                    <div class="circle-tile-description text-faded"> <h4 style="margin-top: 0; margin-bottom: 0;"> Ticket Status </h4></div> 
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <div class="circle-tile ">
                                <div class="circle-tile-heading purple"><i class="fa fa-paper-plane fa-fw fa-3x"></i></div>
                                <div class="circle-tile-content purple" style="padding-top: 40px;">
                                    <div class="circle-tile-number text-faded" id="answered_total"  style="font-size: 32px;">{{ 88 }}</div>
                                    <div class="circle-tile-description text-faded"> <h4 style="margin-top: 0; margin-bottom: 0;"> Ticket Types </h4></div> 
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <!-- =========================================================== -->

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
