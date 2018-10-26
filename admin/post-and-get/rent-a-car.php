<?php

include_once(dirname(__FILE__) . '/../../class/include.php');
include_once(dirname(__FILE__) . '/../auth.php');

if (isset($_POST['create'])) {

    $RENT_CAR = New RentCar(NULL);
    $VALID = new Validator();


    $RENT_CAR->name = $_POST['name'];
    $RENT_CAR->price_per_day = $_POST['price_per_day'];
    $RENT_CAR->price_per_extra_milage = $_POST['price_per_extra_milage'];
    $RENT_CAR->passengers = $_POST['passengers'];

    $server_name = "http://" . $_SERVER['SERVER_NAME'];

    $dir_dest_url = $server_name . '/upload/vehicle-type/';

    $dir_dest = '../../upload/vehicle-type/';

    $handle = new Upload($_FILES['image_name']);

    $imgName = null;

    if ($handle->uploaded) {
        $handle->image_resize = true;
        $handle->file_new_name_ext = 'jpg';
        $handle->image_ratio_crop = 'C';
        $handle->file_new_name_body = Helper::randamId();
        $handle->image_x = 250;
        $handle->image_y = 250;

        $handle->Process($dir_dest);

        if ($handle->processed) {
            $info = getimagesize($handle->file_dst_pathname);
            $imgName = $handle->file_dst_name;
        }
    }

    $RENT_CAR->image = $dir_dest_url . $imgName;

    $VALID->check($RENT_CAR, [
        'name' => ['required' => TRUE],
        'image' => ['required' => TRUE],
    ]);

    if ($VALID->passed()) {
        $RENT_CAR->create();

        if (!isset($_SESSION)) {
            session_start();
        }
        $VALID->addError("Your data was saved successfully", 'success');
        $_SESSION['ERRORS'] = $VALID->errors();

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {

        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['ERRORS'] = $VALID->errors();

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

if (isset($_POST['update'])) {

    $img = $_POST ["oldImageName"];

    $OLD_IMAGE = (explode("/", $img)[5]);

    $server_name = "http://" . $_SERVER['SERVER_NAME'];

    $dir_dest_url = $server_name . '/upload/vehicle-type/';

    $dir_dest = '../../upload/vehicle-type/';

    $handle = new Upload($_FILES['image_name']);


    $imgName = null;


    $BOOKING_RENT = New RentCar($_POST['id']);
    $VALID = new Validator();
    
    if ($handle->uploaded) {
        $handle->image_resize = true;
        $handle->file_new_name_body = TRUE;
        $handle->file_overwrite = TRUE;
        $handle->file_new_name_ext = 'jpg';
        $handle->image_ratio_crop = 'C';
        $handle->file_new_name_body = Helper::randamId();
        $handle->image_x = 250;
        $handle->image_y = 250;

        $handle->Process($dir_dest);

        if ($handle->processed) {

            $info = getimagesize($handle->file_dst_pathname);

            $imgName = $handle->file_dst_name;
        }
        unlink('../../upload/vehicle-type/' . $OLD_IMAGE); // correct 
        $BOOKING_RENT->image = $dir_dest_url . $imgName;
    } else {

        $BOOKING_RENT->image = $img;
    }



    $BOOKING_RENT->name = $_POST['name'];
    $BOOKING_RENT->price_per_day = $_POST['price_per_day'];
    $BOOKING_RENT->price_per_extra_milage = $_POST['price_per_extra_milage'];
    $BOOKING_RENT->passengers = $_POST['passengers'];

    $VALID->check($BOOKING_RENT, [
        'name' => ['required' => TRUE],
    ]);

    if ($VALID->passed()) {
        $BOOKING_RENT->update();

        if (!isset($_SESSION)) {
            session_start();
        }
        $VALID->addError("Your changes saved successfully", 'success');
        $_SESSION['ERRORS'] = $VALID->errors();

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {

        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['ERRORS'] = $VALID->errors();

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

if (isset($_POST['save-arrange'])) {
 
    foreach ($_POST['sort'] as $key => $img) {
        $key = $key + 1;

        $BOOKING_RENT = RentCar::arrange($key, $img);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
?>
