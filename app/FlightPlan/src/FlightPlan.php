<?php
/**
 * Created by PhpStorm.
 * User: aczietlow
 * Date: 2/6/15
 * Time: 4:19 PM
 */

namespace FlightSim\FlightPlan;

use FlightSim\Algorithm\Graph;
use \FlightSim\Entity\Destination;
use FlightSim\Entity\EntityFactory;

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

    public function getGraph()
    {
        // Mock data.
        $destinations = array();
        $destinations[] = EntityFactory::getDestination('airport')->load('AUGA');
        $start = $this->destinations[0];
        $target = $this->destinations[1];
        $graph = new Graph($start, $target, $destinations);

        $graph->buildVertices();
        $graph->buildEdges();
    }
}
