<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$BOOKING = new Booking(NULL)
?> 
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Manage Booking || Taxi Galle Admin || </title>
        <!-- Favicon-->
        <link rel="icon" href="favicon.ico" type="image/x-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
        <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="plugins/node-waves/waves.css" rel="stylesheet" />
        <link href="plugins/animate-css/animate.css" rel="stylesheet" />
        <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
        <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet">
        <link href="css/themes/all-themes.css" rel="stylesheet" />
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
                <!-- Manage Districts -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                        <div class="card">
                            <div class="header">
                                <h2>
                                    Manage Booking
                                </h2>
                                <ul class="header-dropdown">
                                    <li>
                                        <a href="create-vehicle.php">
                                            <i class="material-icons">add</i> 
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
                                                <th>Customer</th> 
                                                <th>Co:Nu</th> 
                                                <th>Vehicle</th> 
                                                <th>Pickup</th> 
                                                <th>Destination</th> 
                                                <th>Booked D:T</th> 
                                                <th>Date Time</th> 
                                                <th>Price</th> 
                                                <th>Status</th> 
                                                <th>Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($BOOKING->all() as $key => $booking) {
                                                ?>
                                                <tr id="row_<?php echo $booking['id']; ?>">
                                                    <td><?php echo $booking['id']; ?></td> 
                                                    <?php
                                                    $USER = new User(NULL);
                                                    $users = $USER->getUserByUniqueId($booking['user']);
                                                    ?>

                                                    <td>
                                                        <?php echo $users['name'] ?>
                                                    </td>

                                                    <td>
                                                        <?php echo $users['contact_no'] ?>
                                                    </td>

                                                    <td>
                                                        <?php
                                                        $VEHICLE = new Vehicle_type($booking['vehicle']);
                                                        echo $VEHICLE->name;
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        echo $booking['pickup'];
                                                        ?> 
                                                    </td>
                                                    <td>
                                                        <?php
                                                        echo $booking['destination'];
                                                        ?> 
                                                    </td>
                                                    <td>
                                                        <?php
                                                        echo $booking['booked_date_time'];
                                                        ?> 
                                                    </td>
                                                    <td>
                                                        <?php
                                                        echo $booking['datetime'];
                                                        ?> 
                                                    </td>
                                                    <td>
                                                        <?php
                                                        echo $booking['price'];
                                                        ?> 
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($booking['is_approved'] == 0) {
                                                            echo "<p style='color:blue;'>" . 'Pending' . "</p>";
                                                        } elseif ($booking['is_approved'] == 1) {
                                                            echo "<p style='color:green;'>" . 'Approved' . "</p>";
                                                        } else {
                                                            echo "<p style='color:red;'>" . 'Cancled' . "</p>";
                                                        }
                                                        ?> 
                                                    </td>
                                                    <td> 
                                                        <a href="view-booking.php?id=<?php echo $booking['id']; ?>" class="op-link btn btn-sm btn-primary "><i class="glyphicon glyphicon-calendar padd" ></i></a>

                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>   
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Customer</th> 
                                                <th>Co:Nu</th> 
                                                <th>Vehicle</th> 
                                                <th>Pickup</th> 
                                                <th>Destination</th> 
                                                <th>Booked D:T</th> 
                                                <th>Date Time</th> 
                                                <th>Price</th> 
                                                <th>Status</th> 
                                                <th>Options</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.js"></script>
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="plugins/node-waves/waves.js"></script>

    <script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>


    <script src="plugins/sweetalert/sweetalert.min.js"></script>
    <script src="js/admin.js"></script>
    <script src="js/pages/tables/jquery-datatable.js"></script>
    <script src="js/demo.js"></script>
    <script src="delete/js/vehicle.js" type="text/javascript"></script>



</body>

</html> 