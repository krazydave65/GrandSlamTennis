<?php

class Location {
    public $name;
}

class LocationModel extends CI_Model{
    public function getAllLocations(){
        $query = $this->db->get('locations');

        $AllLocationObjects = Array();

        foreach ($query->result_array() as $location)
        {
            $new_location_object = $this->Location($location['name']);

            array_push($AllLocationObjects, $new_location_object);
        }

        return $AllLocationObjects;
    }

    public function Location($name){
        $Location = new Location();
        $Location->name = $name;

        return $Location;          
    }
}