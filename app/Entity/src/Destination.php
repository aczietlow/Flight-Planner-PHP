<?php
/**
 * @file
 * Destination.php
 *
 * @author aczietlow
 */

namespace FlightSim\Entity;


abstract class Destination extends Entity
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

    /**
     * @inheritdoc
     *
     * @TODO This isn't enforcable from the interface, might be work approach.
     */
    public function load($uid)
    {
        parent::load($uid);

        foreach ($this->entityData as $property => $value) {
            if (property_exists($this, $property)) {
                $this->$property = $value;
            } elseif ($property == 'coordinate') { // Add coordinates to destinations.
                $this->latitude = (double) $value->latitude;
                $this->longitude = (double) $value->longitude;
            }
        }

        return $this;
    }
}
