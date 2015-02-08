<?php
/**
 * Created by PhpStorm.
 * User: aczietlow
 * Date: 2/6/15
 * Time: 4:19 PM
 */

namespace FlightSim\FlightPlan;


class FlightPlan
{
    /**
     * Vehicle to be used when calculating flight plan.
     * @var /Entity/Vehicle
     */
    public $vehicle;

    /**
     * List of destinations during flight path.
     * @var array
     */
    public $destinations = array();

    public function __construct()
    {

    }

    public function setVehicle(\FlightSim\Entity\Vehicle $vehicle)
    {
        $this->vehicle = $vehicle;
    }

    public function addDestination(\FlightSim\Entity\Destination $destination)
    {
        $this->destinations[] = $destination;
    }
} 