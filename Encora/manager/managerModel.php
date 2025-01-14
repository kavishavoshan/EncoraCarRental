<?php


#DATABASE CLASS
require_once "../db/database.php";

class ManagerModel
{
    #
    function getPayments()
    {
        return Database::search("SELECT booking.id AS bid ,pickup_date,drop_off_date,payment_recipt_id,value,customer.name FROM booking INNER JOIN customer ON booking.customer_id=customer.id WHERE value > 0; ");
    }

    #
    function getStaff()
    {
        return Database::search("SELECT * FROM staff WHERE status=1 OR status=0 ");
    }
    #
    function blockStaff($id)
    {
        return Database::iud("UPDATE staff SET status='1' WHERE id='" . $id . "' ");
    }
    #
    function unBlockStaff($id)
    {
        return Database::iud("UPDATE staff SET status='0' WHERE id='" . $id . "' ");
    }
    #
    function deleteStaff($id)
    {
        return Database::iud("UPDATE staff SET status='2' WHERE id='" . $id . "' ");
    }

    #
    function getSllery()
    {
        return Database::search("SELECT * FROM staff WHERE status=0");
    }

    #
    function addSllery($data)
    {
        return Database::iud("INSERT INTO sallery (staff_id,month,sallery) VALUES ('" . $data["add_sallery"] . "','" . $data["month"] . "','" . $data["amount"] . "');");
    }


    #
    function getTripAdvisor()
    {
        return Database::search("SELECT * FROM trip_advisor WHERE status= '0' ;");
    }

    #
    function assignTripAdvisor($data)
    {
        return Database::iud("UPDATE booking SET trip_advisor_id='".$data["tid"]."'  WHERE id='" . $data["assign"] . "';");
    }

    #
    function getBookings()
    {
        return Database::search("SELECT  * FROM vehicle  INNER JOIN booking  ON vehicle.id=booking.vehicle_id WHERE booking.status='0';");
    }
}
?>