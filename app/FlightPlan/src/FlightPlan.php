<?php
/**
 * Created by PhpStorm.
 * User: aczietlow
 * Date: 2/6/15
 * Time: 4:19 PM
 */

namespace FlightSim\FlightPlan;

use \FlightSim\Database\Database;
use \FlightSim\Entity\Destination;
use \FlightSim\Entity\Airplane;
use \FlightSim\Entity\Airport;

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
        // @todo "This screams for database injection".
        $this->database = new Database();
    }

    /**
     * Setter function for vehicles.
     *
     * @param \FlightSim\Entity\Vehicle $vehicle
     */
    public function setVehicle(\FlightSim\Entity\Vehicle $vehicle)
    {
        $this->vehicle = $vehicle;
    }

    /**
     * Setter function for destinations
     *
     * @param Destination $destination
     */
    public function addDestination(Destination $destination)
    {
        $this->destinations[] = $destination;
    }

    /**
     * Getter function for destinations.
     *
     * @return array
     */
    public function getDestinations()
    {
        return $this->destinations;
    }

    public function loadAllOfType($type, $identifier) {
      $typeName = $type . 's';
      $allOfType = $this->database->loadAllOfType($type, $identifier);

      $class = '\\FlightSim\\Entity\\' . ucfirst($type);

      foreach ($allOfType as $entityID) {
          $allOfType[$entityID] = new $class;
          $allOfType[$entityID]->load($entityID);
      }

      $this->$typeName = $allOfType;
    }
}
