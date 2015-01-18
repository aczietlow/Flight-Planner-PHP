<?php
/**
 * @file
 * Entity.php
 *
 * @author aczietlow
 */

namespace FlightSim\Entity;

use SebastianBergmann\Exporter\Exception;

/**
 * Class Entity
 * @package FlightSim\Entity
 *
 * Entity factory for objects needed for calculating the flight plan.
 */
class Entity
{
    /**
     * Gets destination object.
     *
     * @param
     *   The type of destination object to be loaded
     * @returns Destination
     *   Returns destination object.
     *
     * @TODO Come back and add error handling.
     */
    public function getDestination($destinationType)
    {
        // Instantiate the destination object.
        if (class_exists($destinationType)) {
            return new $destinationType();
        } else {
            throw new Exception("Could not load class $destinationType.");
        }
    }

    public function getVehicle()
    {

    }
}
