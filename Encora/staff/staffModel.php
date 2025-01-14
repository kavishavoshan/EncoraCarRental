<?php

#DATABASE CLASS
require_once "../db/database.php";
class StaffModel
{

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
 
   #
   function getCars()
   {
      return Database::search("SELECT * FROM vehicle_brand INNER JOIN vehicle   ON vehicle.vehicle_brand_id=vehicle_brand.id WHERE status='0' ORDER BY vehicle.id DESC ;");
   }

   #
   function getCar($car_id)
   {
      return Database::search("SELECT vehicle.id,plate_number,description,passanger_count,price_for_24_hour,image_path,v_name,license_number,license_start_date,insurance_number,insurance_start_date,vehicle_brand.name AS vbname,vehicle_type.name FROM vehicle_brand INNER JOIN vehicle   ON vehicle.vehicle_brand_id=vehicle_brand.id INNER JOIN vehicle_type ON vehicle_type.id=vehicle.vehicle_type_id  WHERE status='0' AND vehicle.id='" . $car_id . "';");
   }

   #
   function updateCar($data)
   {
      return Database::search(" UPDATE vehicle SET description='" . $data["description"] . "',price_for_24_hour='" . $data["fee"] . "',license_number='" . $data["licence_number"] . "',license_start_date='" . $data["licence_start_date"] . "',insurance_number='" . $data["insurance_id"] . "',insurance_start_date='" . $data["insurance_start_day"] . "' WHERE id='" . $data["v_id"] . "';");
   }

   #
   function deleteCar($data)
   {
      return Database::search(" UPDATE vehicle SET status='1' WHERE id='" . $data["v_id"] . "';");
   }
}
