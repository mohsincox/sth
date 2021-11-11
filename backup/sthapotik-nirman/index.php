<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <title>STHAPOTIK NIRMAN</title>

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Audiowide' rel='stylesheet' type='text/css'>
   <!--  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
 -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/simple-line-icons.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/rs-plugin/css/settings.css" rel="stylesheet">
    <style type="text/css">
       .scrolled-header {
            background: #0c0c0c;
            padding: 0;
            border-color: #dddddd;
        }
	    #portfolio-grid {
            margin-top: 50px;
        }
    </style>
</head>
<body>
    
    <div class="sidebar-menu-container" id="sidebar-menu-container">

        <div class="sidebar-menu-push">

            <div class="sidebar-menu-overlay"></div>

            <div class="sidebar-menu-inner">

                <header class="site-header" style="padding: 0px;">
                    <div id="main-header" class="main-header header-sticky" style="background: #000000;">
                        <div class="inner-header clearfix">
                            <div class="logo">
                                <a href="./" style="">
                                    <img alt="Image-Logo" src="assets/images/LOGO.jpg" width="71" height="71">
                                    <span style="color: #FFFFFF; font-family: Calibri;"><b>STHAPOTIK NIRMAN</b></span>
                                </a>
                            </div>
                            <div class="pull-right logo" style="padding-left: 10px; padding-right: 10px;">
                            <div style="color: #FFFFFF;" class="pull-left">We are a team working on <b><spen style="font-size: 18px;">architectural </spen></b><b><spen style="font-size: 18px;">design,<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; interior design</spen></b> and related <b><spen style="font-size: 18px;">engineering design</spen></b> <br>consultancy service with <b><spen style="font-size: 18px;">top supervision</spen></b></div>
                            
                            </div>
                        </div>
                    </div>
                </header>

                <section class="portfolio on-portfolio" style="padding-left: 10px; padding-right: 10px; margin-top: 35px;">
                    <div class="container-fluid">
                        <div class="col-sm-12">
                            <div id="">
                                <?php
                                include_once('db_connection.php');
                                $sql = "SELECT id, name FROM project_categories";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                    while($row = mysqli_fetch_assoc($result)) { 
                                ?>
                                    <a href="project-category.php?categoryId=<?php echo $row["id"]; ?>" class="active" style="display: inline-block;padding: 10px 12px;margin: 0 2px;color: #757575;text-transform: uppercase;"><?php echo $row["name"]; ?></a>
                                

                                <?php




                                     }
                                }

                                mysqli_close($conn);


                                ?>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 50px;">
                            <div class="col-md-12">
                                <img src="assets/images/banar.jpg" alt="banar"> 
                            </div>
                        </div>
                    </div>
                </section>

                <footer class="footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="spacing"></div>
                                <h3 style="margin-bottom: 0px;"><a href="./" style="color: #FFFFFF;">STHAPOTIK NIRMAN</a></h3>
                                <p style="margin: 0 0 0px; color: #FFFFFF;">©2018 STHAPOTIK NIRMAN. All rights reserved.</p>
                                <div class="col-sm-10" style="padding: 0px;">
                                    <p style="margin: 0 0 0px; color: #FFFFFF;">Flat-D4 ,House- 37,road-27, Block-A,banani, Dhaka-1213 &nbsp;&nbsp;&nbsp;email: sthapotiknirman@gmail.com</p>
                                </div>
                                <div class="col-sm-2">
                                    <ul class="socials pull-right">
                                        <li>
                                            <a href="#" target="_blank" style="color: #FFFFFF;">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            
                        </div>    
                    </div>
                </footer>

                <a href="#" class="go-top"><i class="fa fa-angle-up"></i></a>

            </div>

        </div>
    </div>
    
    <script src="assets/js/jquery-1.11.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/custom.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("img").bind("contextmenu",function(e){
                return false;
            });
        });
    </script>

</body>
</html>