<?php
/**
 * Created by PhpStorm.
 * User: aczietlow
 * Date: 2/22/15
 * Time: 4:05 PM
 */

namespace FlightSim\Algorithm;

use FlightSim\Entity\Destination;

/**
 * Class Graph
 * @package FlightSim\Algorithm
 */
class Graph
{
    /**
     * The starting destination in the shortest path tree.
     *
     * @var Destination
     */
    public $source;

    /**
     * The target end point in the shortest path tree.
     *
     * @var Destination
     */
    public $target;

    /**
     * A set of Destination objects that are viable possible destinations in the flight plan.
     *
     * @var array
     */
    public $destinations;


    public $vertices;

    /**
     *
     * @TODO shouldn't be using arrays. Use SPL data structures.
     * @param $source
     * @param $target
     * @param $destinations
     */
    public function __construct($source, $target, $destinations) {
        $this->source = $source;
        $this->target = $target;
        $this->destinations = $destinations;
    }

    public function buildVertices()
    {
        $allDestinations = array();
        $allDestinations[] = $this->source;
        $allDestinations[] = $this->target;

        if ($this->destinations) {
            foreach($this->destinations as $destination) {
                $allDestinations[] = $destination;
            }
        }

        foreach ($allDestinations as $destination) {
            $this->vertices[$destination->getICAO()] = $destination->getLocation();
        }
    }

    public function buildEdges()
    {
        $graph = array();

        foreach ($this->vertices as $icao => $vertex) {
            echo 'test';
            unset($this->vertices[$icao]);
        }
    }

} 