<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . './auth.php');
?>

<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <title>Add New Rent a Car|| Admin || Taxi Galle</title>
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
                        <h2>Add New Rent a Car</h2>
                        <ul class="header-dropdown">
                            <li class="">
                                <a href="manage-rent-a-car.php">
                                    <i class="material-icons">list</i> 
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <form class="" action="post-and-get/rent-a-car.php" method="post"  enctype="multipart/form-data"> 

                            <!--vehicle_name-->
                            <div class="row">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="vehicle_name">Vehicle Name</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 p-bottom">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="vehicle_name" class="hidden-lg hidden-md">Vehicle Name</label>
                                            <input type="text" id="vehicle_name" class="form-control" placeholder="Enter Vehicle Name" autocomplete="off" name="name">
                                        </div>
                                    </div>
                                </div>
                            </div> 

                            <!--price_per_day-->
                            <div class="row">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="price_per_day">Price Per Day</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 p-bottom">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="price_per_day" class="hidden-lg hidden-md">Price Per Day</label>
                                            <input type="text" id="price_per_day" class="form-control" placeholder="Enter Price Per Day" autocomplete="off" name="price_per_day">
                                        </div>
                                    </div>
                                </div>
                            </div> 

                            <!--Price Per Exchange-->
                            <div class="row">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="price_per_extra_milage">Price Per Exchange</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 p-bottom">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="price_per_extra_milage" class="hidden-lg hidden-md">Price Per Exchange</label>
                                            <input type="text" id="price_per_extra_milage" class="form-control" placeholder="Enter Price Per Exchange" autocomplete="off" name="price_per_extra_milage">
                                        </div>
                                    </div>
                                </div>
                            </div> 

                            <!--Add Vehicle Type Photo-->
                            <div class="row">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="image">Vehicle Type Photo</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 p-bottom">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="image" class="hidden-lg hidden-md">Vehicle Type Photo</label>
                                            <input type="file" id="image" class="form-control" placeholder="Enter Vehicle Type Photo" autocomplete="off" name="image_name">
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
                                    <button class="btn btn-primary m-t-15 waves-effect  pull-left" type="submit" name="create">Create</button>
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