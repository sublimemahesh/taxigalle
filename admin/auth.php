<?php

if (!isset($_SESSION)) {
    session_start();
} 

if (!Admin::authenticate()) {
    redirect('login.php'); 
}