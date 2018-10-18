<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vehicle
 *
 * @author win7
 */
class Vehicle_type {

    public $id;
    public $name;
    public $base;
    public $unit;
    public $image;
    public $passengers;
    public $sort;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`name`,`base`,`unit`,`image`,`passengers`,`sort` FROM `vehicle_type` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->name = $result['name'];
            $this->base = $result['base'];
            $this->unit = $result['unit'];
            $this->image = $result['image'];
            $this->passengers = $result['passengers'];
            $this->sort = $result['sort'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `vehicle_type` (`name`,`base`,`unit`,`image`,`passengers`,`sort`) VALUES  ('"
                . $this->name . "','"
                . $this->base . "','"
                . $this->unit . "','"
                . $this->image . "','"
                . $this->passengers . "','"
                . $this->sort . "')";

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

        $query = "SELECT * FROM `vehicle_type` ORDER BY `sort` ASC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE `vehicle_type` SET "
                . "`name` ='" . $this->name . "', "
                . "`base` ='" . $this->base . "', "
                . "`unit` ='" . $this->unit . "', "
                . "`image` ='" . $this->image . "', "
                . "`passengers` ='" . $this->passengers . "' "
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
        
        unlink(Helper::getSitePath() . "upload/vehicle-type/" . $this->image);
        $query = 'DELETE FROM `vehicle_type` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

    public function arrange($key, $vehicle) {
        $query = "UPDATE `vehicle_type` SET `sort` = '" . $key . "'  WHERE id = '" . $vehicle . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        return $result;
    }

}
