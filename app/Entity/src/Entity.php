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
     */
    public static function getDestination($destinationType)
    {
        /* Can not insert a variable into a php namespace.
         * '\FlightSim\Entity\$destinationType' is a syntax error.
         */
        // Define the fully qualified class path as a string.
        $class = '\\FlightSim\\Entity\\' . $destinationType;

        // Instantiate the destination object.
        if (class_exists($class)) {
            return new $class();
        } else {
            throw new Exception("Could not load class $destinationType.");
        }
    }

    public function getVehicle()
    {

    }
}
