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
    // Radius of Earth in KM for WGS-84 (latest standard).
//    const RADIUS = 6372.797560856;
    const RADIUS = 6373;

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
    public static function radians( $x)
    {
    return $x * pi() / 180;
    }

    /**
     * Calculate the distance between two places.
     *
     * Latitide and longitude should be given in decimal format. Use
     * Decimal Degrees = Degrees + minutes/60 + seconds/3600 for conversion.
     *
     * @param double $lon1
     *   Longitude for point A.
     * @param double $lat1
     *   Latitude for point A.
     * @param double $lon2
     *   Longitude for point B.
     * @param double $lat2
     *   Longitude for point B.
     *
     * @return int
     */
    public static function distanceBetweenPlaces($lon1, $lat1, $lon2, $lat2)
    {
        $dlon = $lon2 - $lon1;
        $dlat = $lat2 - $lat1;

        $a = pow((sin($dlat/2)),2) + cos($lat1) * cos($lat2) * pow((sin($dlon/2)),2);
//        $a = (sin($dlat / 2) * sin($dlat / 2)) + cos(self::radians($lat1)) * cos(self::radians($lat2)) * (sin($dlon / 2) * sin($dlon / 2));
        $angle = 2 * atan2(sqrt($a), sqrt(1 - $a));
        return $angle * self::RADIUS;
    }

}