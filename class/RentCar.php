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
class RentCar {

    public $id;
    public $name;
    public $price_per_day;
    public $price_per_extra_milage;
    public $image;
    public $passengers;
    public $sort;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`name`,`price_per_day`,`price_per_extra_milage`,`image`,`passengers`,`sort` FROM `rent_a_car` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->name = $result['name'];
            $this->price_per_day = $result['price_per_day'];
            $this->price_per_extra_milage = $result['price_per_extra_milage'];
            $this->image = $result['image'];
            $this->passengers = $result['passengers'];
            $this->sort = $result['sort'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `rent_a_car` (`name`, `price_per_day`, `price_per_extra_milage`,`image`,`passengers`) VALUES  "
                . "('"
                . $this->name . "','"
                . $this->price_per_day . "', '"
                . $this->price_per_extra_milage . "', '"
                . $this->image . "', '"
                . $this->passengers . "')";

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

        $query = "SELECT * FROM `rent_a_car` ORDER BY `passengers` ";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    
    public function delete() {

        $query = 'DELETE FROM `rent_a_car` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

    public function arrange($key, $vehicle) {
        $query = "UPDATE `rent_a_car` SET `sort` = '" . $key . "'  WHERE id = '" . $vehicle . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        return $result;
    }

}
