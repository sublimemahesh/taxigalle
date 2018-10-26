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
class BookingRentCar {

    public $id;
    public $user;
    public $rentcar;
    public $start_date;
    public $end_date;
    public $booked_date_time;
    public $start_destination;
    public $end_destination;
    public $status;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`user`,`rentcar`,`start_date`,`end_date`,`booked_date_time`,`start_destination`,`end_destination`,`status` FROM `rent_car_booking` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->user = $result['user'];
            $this->rentcar = $result['rentcar'];
            $this->start_date = $result['start_date'];
            $this->end_date = $result['end_date'];
            $this->booked_date_time = $result['booked_date_time'];
            $this->start_destination = $result['start_destination'];
            $this->end_destination = $result['end_destination'];
            $this->status = $result['status'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `rent_car_booking` (`user`, `rentcar`, `start_date`,`end_date`,`booked_date_time`,`start_destination`,`end_destination`,`status`) VALUES  "
                . "('"
                . $this->user . "','"
                . $this->rentcar . "', '"
                . $this->start_date . "', '"
                . $this->end_date . "', '"
                . $this->booked_date_time . "', '"
                . $this->start_destination . "', '"
                . $this->end_destination . "', '"
                . $this->status . "')";

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

        $query = "SELECT * FROM `rent_car_booking` ORDER BY `booked_date_time` DESC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = 'UPDATE `rent_car_booking` SET `status`= "' . $this->status . '" WHERE id="' . $this->id . '"';

        $db = new Database();
        $result = $db->readQuery($query);

        if ($result) {
            return $this->__construct($this->id);
        } else {
            return FALSE;
        }
    }

    public function delete() {

        $query = 'DELETE FROM `rent_car_booking` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

    public function GetNewBookingsRentCar() {

        $query = "SELECT * FROM `rent_car_booking` WHERE `status` = '0' ORDER BY `booked_date_time` DESC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();
        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }
        return $array_res;
    }

}
