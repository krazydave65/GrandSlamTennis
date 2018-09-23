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

    public function AddNewLocation($location){
        $data = array('name' => $location);
        
        //parameters: table_name, table_column_data
        $str = $this->db->insert_string('locations', $data);
        
        //insert into database...returns true or false
        if ($this->db->query($str)){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
}