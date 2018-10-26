<?php

include_once(dirname(__FILE__) . '/../../../class/include.php');
include_once(dirname(__FILE__) . '/../../auth.php');


if ($_POST['action'] == 'GETNEWBOOKINGTAXI') {

    $BOOKINGTAXI = new BookingRentCar(NULL);

    $result = $BOOKINGTAXI->GetNewBookingsTaxi();
    echo json_encode($result);
    header('Content-type: application/json');
    exit();
}

