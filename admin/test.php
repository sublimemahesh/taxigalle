  
<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Arrange Rent a Car || Admin || Taxi Galle</title>
        <!-- Favicon-->
        <link rel="icon" href="favicon.ico" type="image/x-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

        <!-- Bootstrap Core Css -->
        <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

        <!-- Waves Effect Css -->
        <link href="plugins/node-waves/waves.css" rel="stylesheet" />

        <!-- Animation Css -->
        <link href="plugins/animate-css/animate.css" rel="stylesheet" />

        <!-- JQuery Nestable Css -->
        <link href="plugins/nestable/jquery-nestable.css" rel="stylesheet" />

        <!-- Custom Css -->
        <link href="css/style.css" rel="stylesheet">

        <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="css/themes/all-themes.css" rel="stylesheet" />
        <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" /> 
        <link href="css/datepicker.css" rel="stylesheet" type="text/css"/>
        <link href="css/fullcalendar.css" rel="stylesheet" type="text/css"/>
    </head>

    <body class="theme-red">
        <?php
        include 'navigation-and-header.php';
        ?>
        <section class="content">
            <div class="container-fluid">

                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card" style="margin-top: 20px;">
                            <div class="header">
                                <h2>
                                    Calender 
                                </h2>
                                <ul class="header-dropdown">
                                    <li class="">
                                        <a href="manage-vehicle-type.php">
                                            <i class="material-icons">list</i> 
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                <form method="post" action=" " class="form-horizontal" >
                                    <div id="calander-bar">
                                        <div class="row">
                                            <div class="col-sm-12" id="calendar">
                                                <div class="tab-pane fade active in"   > 
                                                    <table class="table-bordered">

                                                        <tr><td>Mon</td>
                                                            <td>Tues Day</td>
                                                            <td>Wendsday</td>
                                                            <td>Thursday</td>
                                                            <td>Firday</td>
                                                            <td>Saturday</td>
                                                            <td>Sunday</td></tr>



                                                    </table>
                                                    <div class="row" align="center" style="margin-top: 6px;">
                                                        <button id="back" class="calendar-navigation"> <<- Back </button>
                                                        <button id="next" class="calendar-navigation"> Next ->> </button> 
                                                        <input type="hidden" id="month" value="<?php echo date('m'); ?>">
                                                        <input  type="hidden" id="year" value="<?php echo date('Y'); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="plugins/jquery/jquery.min.js"></script>
        <script src="plugins/bootstrap/js/bootstrap.js"></script> 
        <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="plugins/node-waves/waves.js"></script>
        <script src="js/admin.js"></script>
        <script src="js/demo.js"></script>
        <script src="js/add-new-ad.js" type="text/javascript"></script>
        <script src="delete/js/slider.js" type="text/javascript"></script>

        <script src="plugins/sweetalert/sweetalert.min.js"></script>
        <script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>
        <script src="js/pages/ui/dialogs.js"></script>

        <script src="plugins/jquery-ui/jquery-ui.js" type="text/javascript"></script>
        <script src="tinymce/js/tinymce/tinymce.min.js"></script>
        <script>
            tinymce.init({
                selector: "#description",
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

        <script>
            $(function () {
                $("#sortable").sortable();
                $("#sortable").disableSelection();
            });
        </script>
        <link href="style.css" rel="stylesheet" type="text/css"/> 
        <script src="js/ajax/booking-indicator.js" type="text/javascript"></script>
        <script src="plugins/sweetalert/sweetalert.min.js"></script>
    </body>

</html>