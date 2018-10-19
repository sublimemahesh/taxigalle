<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

include_once(dirname(__FILE__) . '/../auth.php');


if (isset($_POST['update'])) {
    $BOOKING = new Booking($_POST['id']);

    $BOOKING->is_approved = $_POST['is_approved'];

    $BOOKING->update();

    header('Location: ../view-booking.php?id='.$_POST['id'].'&message=21');
    exit();
}

