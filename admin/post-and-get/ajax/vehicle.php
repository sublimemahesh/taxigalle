<?php

include_once(dirname(__FILE__) . '/../../../class/include.php');
include_once(dirname(__FILE__) . '/../../auth.php');

if ($_POST['action'] == 'GETVEHICLEBYCITY') {

    $VEHICLE = new Vehicle(NULL);

    $result = $VEHICLE->getVehicleByCity($_POST["city"], $_POST["vehicleType"]);

    echo json_encode($result);
    header('Content-type: application/json');
    exit();
}


