<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . './auth.php');
?>

<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <title>Add Vehicle Type|| Admin || Taxi Galle</title>
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
        <!-- Bootstrap Spinner Css -->
        <link href="plugins/jquery-spinner/css/bootstrap-spinner.css" rel="stylesheet">
        <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" /> 
    </head>

    <body class="theme-red">
        <?php
        include './navigation-and-header.php';
        ?> 
        <section class="content">
            <div class="container-fluid"> 
                <?php
                $vali = new Validator();

                $vali->show_message();
                ?>
                <!-- Vertical Layout -->
                <div class="card">
                    <div class="header">
                        <h2>Add New Vehicle Type</h2>
                        <ul class="header-dropdown">
                            <li class="">
                                <a href="manage-vehicle-type.php">
                                    <i class="material-icons">list</i> 
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <form class="" action="post-and-get/vehicle-type.php" method="post"  enctype="multipart/form-data"> 

                            <!--vehicle_type-->
                            <div class="row">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="vehicle_type">Vehicle Type</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 p-bottom">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="vehicle_type" class="hidden-lg hidden-md">Vehicle Type</label>
                                            <input type="text" id="vehicle_type" class="form-control" placeholder="Enter Vehicle Type" autocomplete="off" name="name">
                                        </div>
                                    </div>
                                </div>
                            </div> 

                            <!--base-->
                            <div class="row">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="base">Base</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 p-bottom">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="base" class="hidden-lg hidden-md">Base</label>
                                            <input type="text" id="base" class="form-control" placeholder="Enter Base" autocomplete="off" name="base">
                                        </div>
                                    </div>
                                </div>
                            </div> 

                            <!--Unit-->
                            <div class="row">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="unit">Unit</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 p-bottom">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="unit" class="hidden-lg hidden-md">Unit</label>
                                            <input type="text" id="unit" class="form-control" placeholder="Enter Unit" autocomplete="off" name="unit">
                                        </div>
                                    </div>
                                </div>
                            </div> 

                            <!--Add Vehicle Type Photo-->
                            <div class="row">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="vehicle_type_photo">Vehicle Type Photo</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 p-bottom">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="vehicle_type_photo" class="hidden-lg hidden-md">Vehicle Type Photo</label>
                                            <input type="file" id="vehicle_type_photo" class="form-control" placeholder="Enter Vehicle Type Photo" autocomplete="off" name="image_name">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--passengers-->
                            <div class="row">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="passengers">Passengers</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 p-bottom">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="passengers" class="hidden-lg hidden-md">Passengers</label>
                                            <input type="text" id="passengers" class="form-control" placeholder="Enter Passengers" autocomplete="off" name="passengers">
                                        </div>
                                    </div>
                                </div>
                            </div> 


                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">  

                                </div>  
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">

                                    <button class="btn btn-primary m-t-15 waves-effect  pull-left" type="submit" name="add-vehicle">Create</button>

                                    <input type="hidden" name="add-vehicle" value="add-vehicle"/>
                                    <div class=" text-danger btn-padding pull-left error-mess" id="message" ></div> 
                                </div>
                            </div> 
                        </form> 
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
        <script src="tinymce/js/tinymce/tinymce.min.js"></script>


        <script>
            tinymce.init({
                selector: "#about_me",
                // ===========================================
                // INCLUDE THE PLUGIN
                // ===========================================

                plugins: [
                    "advlist autolink lists link image charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste"
                ],
                // ===========================================
                // PUT PLUGIN'S BUTTON on the toolbar
                // ===========================================

                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
                // ===========================================
                // SET RELATIVE_URLS to FALSE (This is required for images to display properly)
                // ===========================================

                relative_urls: false

            });
        </script>
        <script src="plugins/sweetalert/sweetalert.min.js"></script>
        <script src="js/ajax/booking-indicator.js" type="text/javascript"></script>
    </body>

</html>