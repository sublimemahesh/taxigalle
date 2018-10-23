<?php

include_once(dirname(__FILE__) . '/../../../class/include.php');
include_once(dirname(__FILE__) . '/../../auth.php');

if ($_POST['action'] == 'GETNEWBOOKING') {

    $BOOKING = new Booking(NULL);

    $result = $BOOKING->GetNewBookings();
    echo json_encode($result);
    header('Content-type: application/json');
    exit();
}

