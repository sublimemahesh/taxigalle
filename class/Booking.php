<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Booking
 *
 * @author sublime
 */
class Booking {

    public $id;
    public $user;
    public $vehicle;
    public $pickup;
    public $destination;
    public $booked_date_time;
    public $datetime;
    public $price;
    public $booked_vehicle;
    public $is_approved;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`user`,`vehicle`,`pickup`,`destination`,`booked_date_time`,`datetime`,`price`,`booked_vehicle`,`is_approved` FROM `booking` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->user = $result['user'];
            $this->vehicle = $result['vehicle'];
            $this->pickup = $result['pickup'];
            $this->destination = $result['destination'];
            $this->booked_date_time = $result['booked_date_time'];
            $this->datetime = $result['datetime'];
            $this->price = $result['price'];
            $this->booked_vehicle = $result['booked_vehicle'];
            $this->is_approved = $result['is_approved'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `booking` (`user`, `vehicle`, `pickup`,`destination`,`booked_date_time`,`datetime`,`price`,`is_approved`) VALUES  "
                . "('"
                . $this->user . "','"
                . $this->vehicle . "', '"
                . $this->pickup . "', '"
                . $this->destination . "', '"
                . $this->booked_date_time . "', '"
                . $this->datetime . "', '"
                . $this->price . "', '"
                . $this->is_approved . "')";

        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            $last_id = mysql_insert_id();

            return $this->__construct($last_id);
        } else {
            return FALSE;
        }
    }

    public function all() {

        $query = "SELECT * FROM `booking` ORDER BY `booked_date_time` DESC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE `booking` SET "
                . "`vehicle` ='" . $this->vehicle . "', "
                . "`booked_vehicle` ='" . $this->booked_vehicle . "', "
                . "`is_approved` ='" . $this->is_approved . "' "
                . "WHERE `id` = '" . $this->id . "'";

        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            return $this->__construct($this->id);
        } else {
            return FALSE;
        }
    }

    public function delete() {

        $query = 'DELETE FROM `booking` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

    public function GetNewBookings() {

        $query = "SELECT * FROM `booking` WHERE `is_approved` = '0' ORDER BY `booked_date_time` DESC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();
        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }
        return $array_res;
    }

    public function GetBookedVehile($booked_vehicle) {

        $query = "SELECT * FROM `booking` WHERE `booked_vehicle` =$booked_vehicle";
       
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

}
