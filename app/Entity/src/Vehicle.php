<?php
/**
 * @file
 * vehicle.php
 *
 * @author aczietlow
 */

namespace FlightSim\Entity;


abstract class Vehicle
{
    /**
     * Gets the human readable name of the destination.
     *
     * @return mixed
     */
    abstract public function getName();
}
