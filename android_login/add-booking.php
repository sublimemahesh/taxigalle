<?php

    require("config.php");
    
        date_default_timezone_set('Asia/Colombo');

        $now = date('Y-m-d H:i:s');

    if (!empty($_POST)) {
            $query = "INSERT INTO booking (id, user, vehicle, pickup, destination, booked_date_time, datetime, price) VALUES (:bookingid, :user, :vehicle, :pickup, :destination, :date_booked, :datetime, :price)";
            $params = array(
                ':bookingid' => '',
                ':user' => $_POST['user'],
                ':vehicle' => $_POST['vehicle'],
                ':pickup' => $_POST['pickup'],
                ':destination' => $_POST['destination'],
                ':date_booked' => $now,
                ':datetime' => $_POST['datetime'],
                ':price' => $_POST['price']
            );
            try {
                $stmt = $db->prepare($query);
                $result1 = $stmt->execute($params);
               }

			catch (PDOException $ex) {

            $response["error"] = TRUE;
            $response["message"] = "Database Error1. Please Try Again!";
            die(json_encode($response));
        }
 
    if($result1){
	
        $query = "SELECT * FROM users WHERE unique_id = :user_id";

        //now lets update what :user should be
        $query_params = array(
            ':user_id' =>$_POST['user']
        );

        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }
		
        catch (PDOException $ex) {

            $response["error"] = TRUE;
            $response["message"] = "Database Error2. Please Try Again!";
            die(json_encode($response));
        }

        $row = $stmt->fetch();

        if ($row) {

            $name = $row["name"];
            $email = $row['email'];
            $contact = $row['contact_no'];
            $vehicle = $_POST['vehicle'];
            $pickup = $_POST['pickup'];
            $datetime = $_POST['datetime'];
            $destination = $_POST['destination'];
            $price = $_POST['price'];
            $subject = "Taxi Galle - Taxi Booking";
            $message = "Hello $name,\n\nYou have a booking..\n\nYour booking details are bellow:\n\nEmail : $email\n\nContact : $contact\n\nVehicle Type : $vehicle\n\nPickup : $pickup\n\nDestination : $destination\n\nBooking Date : $datetime\n\nPrice : $price\n\nRegards,\nTaxi Galle";
            $from = "info@galle.website";
            $headers = "From:" . $from;

            mail($email,$subject,$message,$headers);

            $response["error"] = FALSE;
            $response["message"] = "Register successful!";
            echo json_encode($response);
        }else{
            $response["error"] = TRUE;
            $response["message"] = "Mail Query Error";
            die(json_encode($response));
        }
    }
        
    
    } else {
        $response["error"] = TRUE;
                $response["message"] = "Please Try Again!";
                die(json_encode($response));
    }
