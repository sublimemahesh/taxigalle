<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . './auth.php');
$id = NULL;
$id = $_GET['id'];
$VEHICLE = new Vehicle($id);
$BOOKING = new Booking($id);
?>

<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <title>View Vehicle Booking || Admin || Taxi Galle</title>
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
                if (isset($_GET['message'])) {

                    $MESSAGE = New Message($_GET['message']);
                    ?>
                    <div class="alert alert-<?php echo $MESSAGE->status; ?>" role = "alert">
                        <?php echo $MESSAGE->description; ?>
                    </div>
                    <?php
                }
                ?>

                <!-- Vertical Layout -->
                <div class="card">
                    <div class="header">
                        <h2><?php echo $VEHICLE->model_and_brand; ?></h2>
                        <ul class="header-dropdown">
                            <li class="">
                                <a href="manage-booking.php">
                                    <i class="material-icons">list</i> 
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>ID</th> 
                                        <th>Pick up</th> 
                                        <th>Destination</th> 
                                        <th>Booked D:T</th> 
                                        <th>Date Time</th> 
                                        <th>Price</th>   
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($BOOKING->GetBookedVehile($id) as $key => $vehicle) {
                                        ?>
                                        <tr id="row_<?php echo $vehicle['id']; ?>">

                                            <td><?php echo $vehicle['id'] ?></td> 
                                            <td><?php echo $vehicle['pickup'] ?></td> 
                                             
                                            <td><?php echo $vehicle['destination']?></td>
                                            <td><?php echo $vehicle['booked_date_time']  ?></td> 
                                            <td><?php echo $vehicle['datetime']  ?> </td>  
                                            <td><?php echo $vehicle['price']  ?> </td>  
 
                                        </tr>
                                        <?php
                                    }
                                    ?>   
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th> 
                                        <th>Pick up</th> 
                                        <th>Destination</th> 
                                        <th>Booked D:T</th> 
                                        <th>Date Time</th> 
                                        <th>Price</th>  
                                         
                                    </tr>
                                </tfoot>
                            </table>
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
    <script src="plugins/sweetalert/sweetalert.min.js"></script> 
    <script src="js/city.js" type="text/javascript"></script>
</body>

</html>