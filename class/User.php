<?php

/**
 * Description of User
 *
 * @author sublime holdings
 * @web www.sublime.lk
 */
class Users {

    public $id;
    public $unique_id;
    public $name;
    public $email;
    public $contact_no;
    public $encrypted_password;
    public $otp;
    public $verified;
    public $created_at;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`unique_id`,`name`,`email`,`contact_no`,`encrypted_password`,`otp`,`verified`,`created_at` FROM `users` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->unique_id = $result['unique_id'];
            $this->name = $result['name'];
            $this->email = $result['email'];
            $this->contact_no = $result['contact_no'];
            $this->encrypted_password = $result['encrypted_password'];
            $this->otp = $result['otp'];
            $this->verified = $result['verified'];
            $this->created_at = $result['created_at'];

            return $result;
        }
    }

    public function create() {

        $query = "INSERT INTO `users` (`unique_id`, `name`, `email`,`contact_no`,`encrypted_password`,`otp`,`verified`,`created_at`) VALUES  "
                . "('"
                . $this->unique_id . "','"
                . $this->name . "', '"
                . $this->email . "', '"
                . $this->contact_no . "', '"
                . $this->encrypted_password . "', '"
                . $this->otp . "', '"
                . $this->verified . "', '"
                . $this->created_at . "')";

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

        $query = "SELECT * FROM `users` ";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function getVerifiedUsers() {

        $query = "SELECT * FROM `users` WHERE `verified` = 1 ";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE `rent_a_car` SET "
                . "`name` ='" . $this->name . "', "
                . "`price_per_day` ='" . $this->price_per_day . "', "
                . "`price_per_extra_milage` ='" . $this->price_per_extra_milage . "', "
                . "`contact_no` ='" . $this->contact_no . "', "
                . "`encrypted_password` ='" . $this->encrypted_password . "' "
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

        $query = 'DELETE FROM `rent_a_car` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

    public function getUserByUniqueId($unique_id) {


        $query = "SELECT * FROM `users` WHERE `unique_id` = '" . $unique_id . "'";

        $db = new Database();
        $result = mysql_query($query);
        $row = mysql_fetch_array($db->readQuery($query));

        return $row;
    }

}
