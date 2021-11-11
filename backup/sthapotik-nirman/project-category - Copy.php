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
                                    $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                               
                                    include_once('db_connection.php');
                                    $sql = "SELECT id, name FROM project_categories";
                                    $result = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($result) > 0) {
                                        // output data of each row
                                        while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                
                                    <?php
                                        if($actual_link == (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]"."/sthapotik-nirman/project-category.php?categoryId=".$row['id']) {
                                    ?>
                                            <a href="project-category.php?categoryId=<?php echo $row['id']; ?>" class="active" style="display: inline-block;padding: 10px 12px;margin: 0 2px;color: #ffffff;text-transform: uppercase;     background-color: #272727;"><?php echo $row["name"]; ?></a>
                                        <?php
                                            } else {
                                        ?>
                                            <a href="project-category.php?categoryId=<?php echo $row['id']; ?>" style="display: inline-block;padding: 10px 12px;margin: 0 2px;color: #757575;text-transform: uppercase;"><?php echo $row["name"]; ?></a>
                                <?php
                                            }
                                        }
                                    }
                                ?>


                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="" id="portfolio-grid" style="margin-top: 10px;">
                                <div class="container">
                                    <?php
                                        $categoryId = $_GET["categoryId"];
                                        $sqlProject = "SELECT id, name, image, hover_text, description FROM projects WHERE category_id = '$categoryId'";
                                        $resultProject = mysqli_query($conn, $sqlProject);

                                        if (mysqli_num_rows($resultProject) > 0) {
                                            // output data of each row
                                            while($rowProject = mysqli_fetch_assoc($resultProject)) {
                                    ?>


                                    <div class="item col-sm-3" data-toggle="modal" data-target="#myModal<?php echo $rowProject["id"]; ?>">
                                            <figure>
                                                <?php
                                                    if ($rowProject["image"] == null) {
                                                ?>
                                                        <img alt="Image" src="assets/images/COVERPAGE.jpg" width="420" height="280">
                                                <?php
                                                    } else {
                                                ?>
                                                        <img alt="Image" src="assets/uploads/<?php echo $rowProject['image']; ?>" width="420" height="280">
                                                <?php
                                                    }
                                                ?>
                                                <figcaption>
                                                    <h3 style="color: #FFFFFF;"><?php echo $rowProject["name"]; ?></h3>
                                                    <p style="font-size: 16px; color: #FFFFFF;"><b><?php echo $rowProject["hover_text"]; ?></b></p>
                                                </figcaption>
                                            </figure>   
                                        </div>

                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal<?php echo $rowProject["id"]; ?>" role="dialog">
                                            <div class="modal-dialog modal-lg" style="margin-top: 120px;">
                                            <!-- <div class="modal-dialog modal-lg" style="margin-top: 100px; width: 1300px;"> -->
                                                <div class="modal-content">
                                                    <div class="modal-header" style="padding-top: 0px; padding-bottom: 0px;">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title text-center" style="font-size: 20px;"><?php echo $row["name"]; ?></h4>
                                                    </div>
                                                    <div class="modal-body" style="padding: 5px;">
                                                        <?php
                                                    if ($rowProject["image"] == null) {
                                                        ?>
                                                            <img alt="Image" src="assets/images/COVERPAGE.jpg">
                                                        <?php
                                                    } else {

                                                        ?>
                                                            <img alt="Image" src="assets/uploads/<?php echo $rowProject['image']; ?>">
                                                        <?php

                                                    }
                                                ?>
                                                         
                                                        <?php
                                                            if($rowProject["description"] != null) {
                                                                // $doc = new DOMDocument();
                                                                // $doc->loadHTML($rowProject["description"]);
                                                                // echo $doc->saveHTML();
                                                                echo $rowProject["description"];
                                                            }
                                                        ?>
                                                        
                                                    </div>
                                                    <div class="modal-footer" style="padding-top: 5px; padding-bottom: 5px;">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                        }
                                    }
                                    mysqli_close($conn);
                                ?>
								</div>
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