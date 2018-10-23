<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . './auth.php');
$id = NULL;
$id = $_GET['id'];
$BOOKING = new Booking($id);
?>

<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <title>View Booking || Admin || Taxi Galle</title>
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
                        <h2>View Booking (# <?php echo $BOOKING->id; ?>)</h2>
                        <ul class="header-dropdown">
                            <li class="">
                                <a href="manage-booking.php">
                                    <i class="material-icons">list</i> 
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <form class="" action="post-and-get/booking.php" method="post"  enctype="multipart/form-data"> 
                            <div class="row">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="customer">Customre</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 p-bottom">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="customer" class="hidden-lg hidden-md">Customre</label>
                                            <div class="form-control"><?php
                                                $USER = new User(NULL);
                                                $users = $USER->getUserByUniqueId($BOOKING->user);
                                                echo $users['name'];
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="contact_no">Contact No</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 p-bottom">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="contact_no" class="hidden-lg hidden-md">Contact No</label>
                                            <div class="form-control"><?php
                                                $USER = new User(NULL);
                                                $users = $USER->getUserByUniqueId($BOOKING->user);
                                                echo $users['contact_no'];
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="vehicle">Vehicle</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 p-bottom">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="vehicle" class="hidden-lg hidden-md">Vehicle</label>
                                            <div class="form-control"><?php
                                                $VEHICLE = new Vehicle_type($BOOKING->vehicle);
                                                echo $VEHICLE->name;
                                                ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="pick_up">Pick Up</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 p-bottom">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="pick_up" class="hidden-lg hidden-md">Pick Up</label>
                                            <div class="form-control"><?php echo $BOOKING->pickup; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="destination">Destination</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 p-bottom">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="destination" class="hidden-lg hidden-md">Destination</label>
                                            <div class="form-control"><?php echo $BOOKING->destination; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="booked_date_time">Booked Date Time</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 p-bottom">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="booked_date_time" class="hidden-lg hidden-md">Booked Date Time</label>
                                            <div class="form-control"><?php echo $BOOKING->booked_date_time; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="datetime"> Date Time</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 p-bottom">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="datetime" class="hidden-lg hidden-md">Date Time</label>
                                            <div class="form-control"><?php echo $BOOKING->datetime; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="status">Status</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 p-bottom">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="status" class="hidden-lg hidden-md">Status</label>
                                            <select id="is_approved" name="is_approved" class="form-control" >
                                                <option value="<?php echo $BOOKING->is_approved ?>"><?php
                                                    if ($BOOKING->is_approved == 0) {
                                                        echo "<p style='color:blue;'>" . 'Pending' . "</p>";
                                                    } elseif ($BOOKING->is_approved == 1) {
                                                        echo "<p style='color:green;'>" . 'Approved' . "</p>";
                                                    } else {
                                                        echo "<p style='color:red;'>" . 'Cancled' . "</p>";
                                                    }
                                                    ?></option>
                                                <option value="" >Pending</option>
                                                <option value="1" >Approved</option>
                                                <option value="2" >Cancled</option>
                                            </select> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">     
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">  
                                </div> 
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <input type="hidden" id="id" value="<?php echo $BOOKING->id; ?>" name="id"/>
                                    <button class="btn btn-primary m-t-15 waves-effect  pull-left" type="submit" name="update">Update</button>
                                </div>
                            </div>
                        </form>
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
    <script src="js/ajax/booking-indicator.js" type="text/javascript"></script>
</body>

</html>