<?php
/**
 * @file
 * Airport.php
 *
 * @author aczietlow
 */

namespace FlightSim\Entity;


use FlightSim\Database\Database;

class Airport extends Destination
{
    public $name;
    public $ICAO;
    public $latitude;
    public $longitude;
    public $fuelTypes = [];

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getICAO()
    {
        return $this->ICAO;
    }

    /**
     * @param mixed $ICAO
     */
    public function setICAO($ICAO)
    {
        $this->ICAO = $ICAO;
    }

    /**
     * @param mixed $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @param mixed $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * @return array
     */
    public function getFuelTypes()
    {
        return $this->fuelTypes;
    }

    /**
     * @param array $fuelTypes
     */
    public function setFuelTypes($fuelTypes)
    {
        $this->fuelTypes = $fuelTypes;
    }

    public function getLocation()
    {
    }

    /**
     * Load instance of existing Airport Entity.
     *
     * @TODO This screams for dependency injection.
     *
     * @return mixed|void
     */
    public function load($identifier)
    {
        $db = new Database();
        $airportData = $db->load('Airport', $identifier);
        $this->fromArray($airportData);
    }
}
