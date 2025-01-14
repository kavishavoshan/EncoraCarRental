<?php

#DATABASE CLASS
require_once "../db/database.php";

class CustomerModel
{
    #
    function getCars()
    {
        return Database::search("SELECT vehicle.id,description,passanger_count,price_for_24_hour,image_path,v_name,name FROM vehicle INNER JOIN vehicle_brand ON vehicle.vehicle_brand_id=vehicle_brand.id WHERE status='0' ;");
    }

    #
    function addBooking($data, $customer_id, $created_at, $vehicle_id)
    {

        $dateString = $_POST["pickup_date"];
        $timestamp = strtotime($dateString);
        $pickupdate = date('Y-m-d', $timestamp);

        $dateString2 = $_POST["pickup_date"];
        $timestamp2 = strtotime($dateString2);
        $drop_off_date = date('Y-m-d', $timestamp2);

        return Database::iud("INSERT INTO booking (vehicle_id,customer_id,created_at,status,pickup_date,drop_off_date,current_location,additional_info) VALUES ('" . $vehicle_id . "','" . $customer_id . "','" . $created_at . "','0','" . $data["pickup_date"] . "','" . $data["drop_off_date"] . "','" . $data["current_location"] . "','" . $data["ai"] . "');");
    }

    #
    function getTripAdvisors()
    {
        return Database::search("SELECT email,contact_number,name FROM trip_advisor");
    }

    #
    function getMyBooking($customer_id)
    {
        return Database::search("SELECT * FROM vehicle  INNER JOIN booking  ON vehicle.id=booking.vehicle_id WHERE booking.customer_id='" . $customer_id . "' AND booking.status='0' ORDER BY created_at DESC ;");
    }

    #
    function updateBook($customer_id, $book_id, $pd, $dd, $cl)
    {
        $dateString = $pd;
        $timestamp = strtotime($dateString);
        $pickupdate = date('Y-m-d', $timestamp);

        $dateString2 = $dd;
        $timestamp2 = strtotime($dateString2);
        $drop_off_date = date('Y-m-d', $timestamp2);

        return Database::iud("UPDATE booking SET pickup_date='" . $pickupdate . "',drop_off_date='" . $drop_off_date . "',current_location='" . $cl . "' WHERE customer_id='" . $customer_id . "' AND id='".$book_id."';");
    }


    #
    function deleteBook($customer_id,$book_id){
        return Database::iud("UPDATE booking SET status='1' WHERE customer_id='" . $customer_id . "' AND id='".$book_id."';");
    }
}
