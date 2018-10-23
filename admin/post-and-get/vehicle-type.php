<?php

include_once(dirname(__FILE__) . '/../../class/include.php');
include_once(dirname(__FILE__) . '/../auth.php');

if (isset($_POST['add-vehicle'])) {

    $VEHICLE_TYPE = New Vehicle_type(NULL);
    $VALID = new Validator();


    $VEHICLE_TYPE->name = $_POST['name'];
    $VEHICLE_TYPE->base = $_POST['base'];
    $VEHICLE_TYPE->unit = $_POST['unit'];
    $VEHICLE_TYPE->passengers = $_POST['passengers'];

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

    $VEHICLE_TYPE->image = $dir_dest_url . $imgName;

    $VALID->check($VEHICLE_TYPE, [
        'name' => ['required' => TRUE],
        'image' => ['required' => TRUE],
    ]);

    if ($VALID->passed()) {
        $VEHICLE_TYPE->create();

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

    $unlink('../../upload/vehicle-type/' . $OLD_IMAGE); // correct

    $server_name = "http://" . $_SERVER['SERVER_NAME'];

    $dir_dest_url = $server_name . '/upload/vehicle-type/';

    $dir_dest = '../../upload/vehicle-type/';

    $handle = new Upload($_FILES['image_name']);


    $imgName = null;


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
    }


    $VEHICLE_TYPE = New Vehicle_type($_POST['id']);
    $VALID = new Validator();

    $VEHICLE_TYPE->name = $_POST['name'];
    $VEHICLE_TYPE->base = $_POST['base'];
    $VEHICLE_TYPE->unit = $_POST['unit'];
    $VEHICLE_TYPE->passengers = $_POST['passengers'];

    $VEHICLE_TYPE->image = $dir_dest_url . $imgName;

    $VALID->check($VEHICLE_TYPE, [
        'name' => ['required' => TRUE],
    ]);

    if ($VALID->passed()) {
        $VEHICLE_TYPE->update();

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

        $VEHICLE_TYPE = Vehicle_type::arrange($key, $img);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
?>
