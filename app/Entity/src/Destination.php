<?php
/**
 * @file
 * Destination.php
 *
 * @author aczietlow
 */

namespace FlightSim\Entity;


abstract class Destination
{
    /**
     * Gets the human readable name of the destination.
     *
     * @return mixed
     */
    abstract public function getName();

    /**
     * Gets the latitude and longitude of the destination.
     *
     * @return mixed
     */
    abstract public function getLocation();
}
