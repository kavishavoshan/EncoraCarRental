<?php

#DATABASE CLASS
require_once "../db/database.php";

class AdminModel
{

   #
   function getVehicleBrands()
   {
      return Database::search("SELECT * FROM vehicle_brand ");
   }

   #
   function getVehicleTypes()
   {
      return Database::search("SELECT * FROM vehicle_type ");
   }

   #
   function getCars()
   {
      return Database::search("SELECT * FROM vehicle_brand INNER JOIN vehicle   ON vehicle.vehicle_brand_id=vehicle_brand.id WHERE status='0' ;");
   }
   #
   function getCustomers()
   {
      return Database::search("SELECT * FROM customer WHERE status='0' OR status='1';");
   }
   #
   function blockCustomer($customer_id)
   {

      return Database::search("UPDATE customer SET status='1' WHERE id='" . $customer_id . "';");
   }
   #
   function unBlockCustomer($customer_id)
   {

      return Database::search("UPDATE customer SET status='0' WHERE id='" . $customer_id . "';");
   }
   #
   function deleteCustomer($customer_id)
   {
      return Database::search("UPDATE customer SET status='2' WHERE id='" . $customer_id . "';");
   }

   #
   function getBookings()
   {
      return Database::search(" SELECT * FROM booking WHERE status='0' OR status='2' OR status='3' OR status ='5'  ;");
   }

   #
   function makePayment($data)
   {
      return Database::iud("UPDATE booking SET payment_recipt_id='" . $data["r_id"] . "',value='" . $data["value"] . "',status='5' WHERE id='" . $data["pay"] . "';");
   }

   #
   function addVehicleType($data)
   {
      return Database::iud("INSERT INTO vehicle_type (name) VALUE ('" . $data["type"] . "')");
   }

   #
   function addVehicleBrand($data)
   {
      return Database::iud("INSERT INTO vehicle_brand (name) VALUE ('" . $data["brand"] . "')");
   }

   #
   function addVehicle($data, $db_file_name)
   {
      return Database::iud("INSERT INTO vehicle (plate_number,description,passanger_count,price_for_24_hour,image_path,status,v_name,vehicle_brand_id,vehicle_type_id,license_number,license_start_date,insurance_number,insurance_start_date) VALUES ('" . $data["plate_number"] . "','" . $data["description"] . "','" . $data["passenger_count"] . "','" . $data["fee"] . "','" . $db_file_name . "','0','" . $data["vehcicle_name"] . "','" . $data["vehicle_brand_id"] . "','" . $data["vehicle_type_id"] . "','" . $data["licence_number"] . "','" . $data["licence_start_date"] . "','" . $data["insurance_id"] . "','" . $data["insurance_start_day"] . "');");
   }

   #
   function getCar($car_id)
   {
      return Database::search("SELECT vehicle.id,plate_number,description,passanger_count,price_for_24_hour,image_path,v_name,license_number,license_start_date,insurance_number,insurance_start_date,vehicle_brand.name AS vbname,vehicle_type.name FROM vehicle_brand INNER JOIN vehicle   ON vehicle.vehicle_brand_id=vehicle_brand.id INNER JOIN vehicle_type ON vehicle_type.id=vehicle.vehicle_type_id  WHERE status='0' AND vehicle.id='" . $car_id . "';");
   }
}
