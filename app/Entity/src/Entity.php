<?php
/**
 * Created by PhpStorm.
 * User: aczietlow
 * Date: 1/25/15
 * Time: 4:12 PM
 */

namespace FlightSim\Entity;

use FlightSim\Database\Database;

abstract class Entity {

    /**
     * The type of Entity object.
     *
     * @var String
     */
    protected $EntityType;

    /**
     * Load existing Entities.
     *
     * @param String
     *   Unique identifier for the destination entity.
     *
     * @TODO This screams for dependency injection.
     *
     * @return mixed|void
     */
    public function load($identifier)
    {
        $db = new Database();
        $airportData = $db->load($this->EntityType, $identifier);
        $this->fromArray($airportData);
    }

    /**
     * Populates this object based on an incoming array generated by the
     * toArray() method above.
     *
     * @param $array
     */
    public function fromArray($array) {
        foreach($array as $key => $value) {
            if (property_exists($this, $key) && $key != 'debugData') {
                $this->{$key} = $value;
            }
        }
    }
} 