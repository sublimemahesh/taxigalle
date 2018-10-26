<?php

include_once(dirname(__FILE__) . '/../../../class/include.php');
include_once(dirname(__FILE__) . '/../../auth.php');


if ($_POST['action'] == 'GETNEWBOOKINGRENTCAR') {

    $BOOKINGRENTCAR = new BookingRentCar(NULL);

    $result = $BOOKINGRENTCAR->GetNewBookingsRentCar();
    echo json_encode($result);
    header('Content-type: application/json');
    exit();
}

