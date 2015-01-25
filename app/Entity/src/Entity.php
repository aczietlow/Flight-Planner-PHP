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
     * @param string $destinationType
     *   The type of destination object to be loaded.
     *
     * @throws Exception if the instantiated object is not a destination object.
     *
     * @returns Destination
     *   Returns destination object.
     */
    public static function getDestination($destinationType)
    {
        // Instantiate the destination object.
        $destination = self::load($destinationType);

        // Check that the returned object is a Destination object.
        if ($destination instanceof Destination) {
            return $destination;
        } else {
            throw new Exception("$destinationType is not a valid destination Object");
        }
    }

    /**
     * Gets vehicle object.
     *
     * @param string $vehicleType
     *   The type of vehicle object to be loaded.
     *
     * @throws Exception if the instantiated object is not a Airport object.
     *
     * @returns Destination
     *   Returns destination object.
     */
    public static function getVehicle($vehicleType)
    {
        // Instantiate the destination object.
        $vehicle = self::load($vehicleType);

        // Check that the returned object is a Destination object.
        if ($vehicle instanceof Vehicle) {
            return $vehicle;
        } else {
            throw new Exception("$vehicleType is not a valid vehicle Object");
        }
    }

    /**
     * Instantiate requested object.
     *
     * @param string $type
     *   The type of object to be instantiated.
     *
     * @throws Exception if the object can not be loaded or the class can not be found.
     *
     * @returns object
     *   Returns object.
     */
    protected static function load($type)
    {
        /* Can not insert a variable into a php namespace.
         * '\FlightSim\Entity\$destinationType' is a syntax error.
         */
        // Define the fully qualified class path as a string.
        $class = '\\FlightSim\\Entity\\' . $type;

        // Instantiate the object.
        if (class_exists($class)) {
            return new $class();
        } else {
            throw new Exception("Could not load class $type.");
        }
    }
}
