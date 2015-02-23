<?php
/**
 * Calculates the shortest distance between two points given latitude and longitude.
 *
 * Assumes the earth as a perfect sphere, so not 100% accurate.
 *
 * User: aczietlow
 * Date: 2/22/15
 */

namespace FlightSim\Algorithm;


/**
 * Class HaversineAlgorithm
 * @package FlightSim\Algorithm
 */
class HaversineAlgorithm
{
    // Radius of Earth in KM for WGS-84 (latest geological standard).
    const RADIUS = 6372.797560856;

    /**
     * Calculate the distance between two places.
     *
     * Latitude and longitude should be given in decimal degree format  .
     *
     * @param double $lat1
     *   Latitude for point A.
     * @param double $lon1
     *   Longitude for point A.
     * @param double $lat2
     *   Longitude for point B.
     * @param double $lon2
     *   Longitude for point B.
     *
     * @return int
     */
    public static function distanceBetweenPlaces($lat1, $lon1, $lat2, $lon2)
    {
        $dlon = self::decimalDegreesToRadians($lon2 - $lon1);
        $dlat = self::decimalDegreesToRadians($lat2 - $lat1);

        $a = (sin($dlat / 2) * sin($dlat / 2)) +
          cos(self::decimalDegreesToRadians($lat1)) * cos(self::decimalDegreesToRadians($lat2)) *
          (sin($dlon / 2) * sin($dlon / 2));
        $angle = 2 * atan2(sqrt($a), sqrt(1 - $a));
        return $angle * self::RADIUS;
    }

    /**
     * Convert degrees to Radians.
     *
     * @param double $x
     *   Degrees.
     * @return double
     *   Radians.
     *
     * @TODO I would love to have a double type hint here.
     */
    public static function decimalDegreesToRadians($x)
    {
        return $x * (pi() / 180);
    }

}