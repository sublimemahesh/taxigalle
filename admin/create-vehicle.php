<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . './auth.php');
?>

<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <title>Add New Member || Admin || Support Lanka</title>
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
                        <h2>Add Vehicle</h2>
                        <ul class="header-dropdown">
                            <li class="">
                                <a href="manage-member.php">
                                    <i class="material-icons">list</i> 
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <form class="" action="post-and-get/vehicle.php" method="post"  enctype="multipart/form-data"> 

                            <!--vehicle type-->
                            <div class="row">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="name">Vehicle Type</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 p-bottom">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="name" class="hidden-lg hidden-md">Vehicle Type</label>
                                            <select name="type" class="form-control">
                                                <option> -- Please select the vehicle type -- </option>
                                                <?php
                                                foreach (Vehicle_type::all() as $key => $vehicle_type) {
                                                    ?>
                                                    <option value="<?php echo $vehicle_type['name'] ?>"><?php echo $vehicle_type['name'] ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <!--vehicle Model_and_Brand-->
                            <div class="row">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="name">Model_and_Brand</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 p-bottom">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="model_and_brand" class="hidden-lg hidden-md">Model_and_Brand</label>
                                            <input type="text" id="model_and_brand" class="form-control" placeholder="Enter Model_and_Brand " autocomplete="off" name="model_and_brand">
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <!--Reg_number-->
                            <div class="row">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="Reg_number">Reg_number</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 p-bottom">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="Reg_number" class="hidden-lg hidden-md">Reg_number</label>
                                            <input type="text" id="model_and_brand" class="form-control" placeholder="Enter Reg_number" autocomplete="off" name="reg_number">
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <!--email-->
                            <div class="row">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="email">Email</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 p-bottom">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="email" class="hidden-lg hidden-md">Email</label>
                                            <input type="email" id="email" class="form-control" placeholder="Enter email" autocomplete="off" name="email">
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <!--contact_number-->
                            <div class="row">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="contact_number">Contact Number</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 p-bottom">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="contact_number" class="hidden-lg hidden-md">Contact Number</label>
                                            <input type="text" id="email" class="form-control" placeholder="Enter contact_number" autocomplete="off" name="contact_number">
                                        </div>
                                    </div>
                                </div>
                            </div> 
                           
                            <!--Profile Picture-->
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="Vehicle Image">Vehicle Image</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="Vehicle Image" class="hidden-lg hidden-md">Vehicle Image</label>
                                            <input type="file" id="image" class="form-control" name="image" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Rank-->

                            <!--Add member-->
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">  

                                </div>  
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <input type="hidden" name="type" value="<?php echo $vehicle_type['id'] ?>"/>
                                    <button class="btn btn-primary m-t-15 waves-effect  pull-left" type="submit" name="add-vehicle">Add vehicle</button>


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
    </body>

</html>