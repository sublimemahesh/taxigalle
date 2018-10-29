<?php
 
include_once(dirname(__FILE__) . '/../../class/include.php');

$ADMIN = new Admin(NULL);

$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);


if (empty($username) || empty($password)) {
    header('Location: ../login.php?message=6');
    exit();
}

if ($ADMIN->login($username, $password)) {
    header('Location: ../?message=5');
    exit();
} else {
    header('Location: ../login.php?message=7');
    exit();
}

