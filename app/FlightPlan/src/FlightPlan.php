<?php
/**
 * Created by PhpStorm.
 * User: aczietlow
 * Date: 2/6/15
 * Time: 4:19 PM
 */

namespace FlightSim\FlightPlan;

use \FlightSim\Entity\Destination;

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

    /**
     * How much to modify the distance by before calculating destination subset.
     * @var int
     * @todo: add this to destinationSubset.
     */
    private $distanceModifier;

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

    /**
     * Limits a large set of destinations into more relevant subset.
     *
     * @param $destinations
     * @param $source
     * @param $target
     *
     * @return array
     */
    public function destinationSubset(array $destinations, destination $source, destination $target)
    {
        // Define radius length between source and target.
        $distance = getDistance($source, $target);

        // @todo: we may need to modify distance by a percentage to allow flight plans that are longer then the straight line distance

        //Loop through all destinations and eliminate the ones that are farther away then the radius
        foreach ($destinations as $key => $destination) {
            $tempDistance = $this->getDistance($source, $destination);
            if ($tempDistance > $distance) {
                unset($destination[$key]);
            }
        }

        // Remove destinations that are in the opposite direction of $target.
        // 2d translation.
        $sourceLoc = $source ->getLocation();

        $loc = $target ->getLocation();
        $direction = array();
        foreach ($loc as $key => $item) {
            $loc[$key] = $item - $sourceLoc[$key];
            $direction[$key] = $loc[$key] - abs($loc[$key]);
        }

        // $direction is an array that has either -1, 0, or 1 for each value of lat and long.
        // This gives us the direction between $source and $target
        // Need to remove destinations where at least one of the directions is not the same.


        return array();
    }

    /**
     * Gives the distance between two destinations.
     *
     * @param Destination $start
     * @param Destination $end
     *
     * @return float
     */
    private function getDistance(destination $start, destination $end)
    {
        $start = $start->getLocation();
        $end = $end->getLocation();
        $distance = sqrt(($end[1] - $start[1]) ^ 2 + ($end[2] - $start[2])^2);
        return abs($distance);

    }
}
