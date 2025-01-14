<?php


#DATABASE CLASS
require_once "../db/database.php";

class TripAdvisorModel
{
    #
    function getClients($id)
    {
        return Database::search("SELECT customer.name,pickup_date,drop_off_date,current_location,customer.email,trip_advisor.id AS tid,booking.id,booking.status FROM booking INNER JOIN trip_advisor ON booking.trip_advisor_id=trip_advisor.id INNER JOIN customer ON customer.id =booking.customer_id WHERE booking.trip_advisor_id='" . $id . "' AND booking.status = '1' OR booking.status= '2' OR booking.status='3' OR booking.status='0' OR booking.status='5' ");
    }

    #
    function getStartClients($id)
    {
        return Database::search("SELECT  customer.name,pickup_date,drop_off_date,current_location,customer.email,trip_advisor.id AS tid,booking.id,booking.status FROM booking INNER JOIN trip_advisor ON booking.trip_advisor_id=trip_advisor.id INNER JOIN customer ON customer.id =booking.customer_id  WHERE booking.trip_advisor_id='" . $id . "' AND booking.status='5' OR booking.status='3'  ; ");
    }

    #
    function handOver($book_id)
    {
        return Database::iud("UPDATE booking SET status='3' WHERE id='" . $book_id . "'; ");
    }

    #
    function deleteBooking($book_id)
    {
        return Database::iud("UPDATE booking SET status='4' WHERE id='" . $book_id . "'; ");
    }
    #
    function addVehicleStatus($data, $tid)
    {
        return Database::iud("INSERT INTO trip_vehicle_status (staus,trip_ad_id,book_id) VALUES ('" . $data["stat"] . "','" . $tid . "','" . $data["status"] . "');");
    }
}
