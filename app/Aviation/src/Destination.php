<?php
/**
 * @file
 * Destination.php
 *
 * @author aczietlow
 */

namespace FlightSim\Aviation;


abstract class Destination
{
    /**
     * @var string
     *   Airport code issued by the International Civil Aviation Organization.
     */
    public $ICAO;

    /**
     * @var string
     *   The human readable name for the destination.
     */
    public $name;

    /**
     * @var float
     *   The numerical value of destination's latitude.
     */
    public $Latitude;

    /**
     * @var float
     *   The numerical value of destination's longitude.
     */
    public $longitude;
}
