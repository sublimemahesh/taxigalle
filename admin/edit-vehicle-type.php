<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$VEHICLE_TYPE = new Vehicle_type($id);
?> 
﻿<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Edit Vehicle Type || Admin || Taxi Galle</title>

        <!-- Favicon-->
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
        <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="plugins/node-waves/waves.css" rel="stylesheet" />
        <link href="plugins/animate-css/animate.css" rel="stylesheet" />
        <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet">
        <link href="css/themes/all-themes.css" rel="stylesheet" />

        <link href="plugins/jquery-spinner/css/bootstrap-spinner.css" rel="stylesheet">
        <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" /> 

    </head>

    <body class="theme-red">
        <?php
        include './navigation-and-header.php';
        ?>

        <section class="content">
            <?php
            $vali = new Validator();

            $vali->show_message();
            ?>
            <div class="container-fluid"> 
                <!-- Body Copy -->

                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Edit Vehicle Type
                                </h2>
                                <ul class="header-dropdown">
                                    <li class="">
                                        <a href="manage-vehicle-type.php">
                                            <i class="material-icons">list</i> 
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="body row">
                                <form class="form-horizontal col-sm-9 col-md-12" method="post" action="post-and-get/vehicle-type.php" enctype="multipart/form-data"> 

                                    <!--Vehicle Type-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="name">Vehicle Type</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label for="name" class="hidden-lg hidden-md">Vehicle Type</label>
                                                    <input type="text" id="name" class="form-control" placeholder="Enter Vehicle Type" autocomplete="off" name="name" value="<?php echo $VEHICLE_TYPE->name; ?>" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Base-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="base">Base</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label for="base" class="hidden-lg hidden-md">Base</label>
                                                    <input type="text" id="base" class="form-control" autocomplete="off" name="base" value="<?php echo $VEHICLE_TYPE->base; ?>" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Unit-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="unit">Unit</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label for="unit" class="hidden-lg hidden-md">Unit</label>
                                                    <input type="text" id="base" class="form-control" autocomplete="off" name="unit" value="<?php echo $VEHICLE_TYPE->unit; ?>" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Passengers-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="passengers">Passengers</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label for="passengers" class="hidden-lg hidden-md">Passengers</label>
                                                    <input type="text" id="passengers" class="form-control" autocomplete="off" name="passengers" value="<?php echo $VEHICLE_TYPE->passengers; ?>" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Vehicle Image-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="vehicle_image">Vehicle Image</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label for="vehicle_image" class="hidden-lg hidden-md">Vehicle Image</label>

                                                    <input type="file" id="vehicle_image" class="form-control" autocomplete="off" name="image_name" value="<?php
                                                    $VEHICLE_TYPE->image;
                                                    ?>" >
                                                    <img  src="<?php echo $VEHICLE_TYPE->image ?>"  name="image_name">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-4">
                                            <input type="hidden" id="id" value="<?php echo $VEHICLE_TYPE->id; ?>" name="id"/>
                                            <input type="hidden" id="image" value="<?php echo $VEHICLE_TYPE->image; ?>" name="oldImageName"/>                                            
                                            <button type="submit" class="btn btn-primary m-t-15 waves-effect" name="update" value="submit">Save Changes</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- Jquery Core Js -->
        <script src="plugins/jquery/jquery.min.js"></script>
        <script src="plugins/bootstrap/js/bootstrap.js"></script> 
        <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="plugins/node-waves/waves.js"></script>
        <script src="plugins/jquery-spinner/js/jquery.spinner.js"></script>
        <script src="js/admin.js"></script>
        <script src="js/demo.js"></script>
        <script src="js/add-new-ad.js" type="text/javascript"></script>
        <script src="js/ajax/booking-indicator.js" type="text/javascript"></script>
        <script src="plugins/sweetalert/sweetalert.min.js"></script>

    </body>

</html>