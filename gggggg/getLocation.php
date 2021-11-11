<?php
/**
* Author: CodexWorld
* Author URI: http://www.codexworld.com
* Function Name: getAddress()
* $latitude => Latitude.
* $longitude => Longitude.
* Return =>  Address of the given Latitude and longitude.
**/
function getAddress($latitude,$longitude){
    if(!empty($latitude) && !empty($longitude)){
        //Send request and receive json data by address

        // correct
        // sensor=true_or_false
        $geocodeFromLatLong = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($latitude).','.trim($longitude).'&sensor=true_or_false&key=AIzaSyBTmFQD7pTG98MDWNoq-RMGJ5u9jHqIULk');

        // correct
        // $geocodeFromLatLong = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($latitude).','.trim($longitude).'&key=AIzaSyBTmFQD7pTG98MDWNoq-RMGJ5u9jHqIULk');

        // correct
        // $geocodeFromLatLong = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?latlng=23.7984463,90.4031033&key=AIzaSyBTmFQD7pTG98MDWNoq-RMGJ5u9jHqIULk');

        // https://maps.googleapis.com/maps/api/geocode/json?latlng=23.7984463,90.4031033&key=AIzaSyBTmFQD7pTG98MDWNoq-RMGJ5u9jHqIULk
        $output = json_decode($geocodeFromLatLong);
        $status = $output->status;
        //Get address from json data
        // $address = ($status=="OK")?$output->results[1]->formatted_address:'';

        // $address = ($status=="OK")?$output->results[4]->formatted_address:'';

        $address = ($status=="OK")?$output->results[0]->formatted_address:'';
        //Return address of the given latitude and longitude
        if(!empty($address)){
            return $address;
        }else{
            return false;
        }
    }else{
        return false;   
    }
}

/**
 * Use getAddress() function like the following.
 */
$latitude = '23.7984463';
$longitude = '90.4031033';
$address = getAddress($latitude,$longitude);
echo $address = $address?$address:'Not found';