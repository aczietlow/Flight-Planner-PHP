<?php
/**
 * @file
 * NavBeacons.php
 *
 * @author aczietlow
 */

namespace FlightSim\Entity;


class NavBeacon extends Destination
{
    /**
     * @inheritdoc
     */
    protected $entityType = 'navbeacon';

    /**
     * @inheritdoc
     */
    protected $entityIdentifier = 'icao_id';

    public $name;
    public $ICAO;
    public $latitude;
    public $longitude;
    public $type;

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
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    public function getLocation()
    {

    }
}
