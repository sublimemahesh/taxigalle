<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

include_once(dirname(__FILE__) . '/../auth.php');


if (isset($_POST['update'])) {
    $BOOKING = new BookingRentCar($_POST['id']);

    $BOOKING->status = $_POST['status'];

    $BOOKING->update();

    header('Location: ../view-booking-rent-a-car.php?id='.$_POST['id'].'&message=21');
    exit();
}

