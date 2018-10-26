<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$RENT_CAR = new RentCar(NULL)
?> 
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Manage Rent Car || Taxi Galle Admin || </title>
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
                <!-- Manage Districts -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                        <div class="card">
                            <div class="header">
                                <h2>
                                    Manage Rent a Car
                                </h2>
                                <ul class="header-dropdown">
                                    <li>
                                        <a href="create-rent-a-car.php">
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
                                                <th>Vehicle Name</th> 
                                                <th>Price Per Day</th> 
                                                <th>Price Per EX:</th> 
                                                <th>Passengers</th> 
                                                <th>Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($RENT_CAR->all() as $key => $rent_car) {
                                                ?>
                                                <tr id="row_<?php echo $rent_car['id']; ?>">
                                                    <td><?php echo $rent_car['id']; ?></td> 

                                                    <td>
                                                        <?php echo $rent_car['name'] ?>
                                                    </td>

                                                    <td>
                                                        <?php echo $rent_car['price_per_day'] ?>
                                                    </td>

                                                    <td>
                                                        <?php echo $rent_car['price_per_extra_milage'] ?>
                                                    </td>

                                                    <td> 
                                                        <?php echo $rent_car['passengers'] ?>
                                                    </td>
                                                    <td> 
                                                        <a href="edit-rent-a-car.php?id=<?php echo $rent_car['id']; ?>" class="op-link btn btn-sm btn-default"><i class="glyphicon glyphicon-pencil"></i></a> | 

                                                        <a href="#" class="delete-rent-car btn btn-sm btn-danger" data-id="<?php echo $rent_car['id']; ?>"> 
                                                            <i class="glyphicon glyphicon-trash" data-type="cancel"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>   
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Vehicle Name</th> 
                                                <th>Price Per Day</th> 
                                                <th>Price Per EX:</th> 
                                                <th>Passengers</th> 
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
    <script src="delete/js/rent-car.js" type="text/javascript"></script> 
    <script src="plugins/sweetalert/sweetalert.min.js"></script>
    <script src="js/ajax/booking-indicator.js" type="text/javascript"></script>



</body>

</html> 