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
    protected $entityType;

    /**
     * The identifier used for by the entity in the database.
     *
     * @var String
     */
    protected $entityIdentifier;


    /**
     * Holds the data for an entity loaded from the database.
     *
     * @var array
     */
    protected $entityData;

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
    public function load($uid)
    {
        $db = new Database();
        $this->entityData = $db->load($this->entityType, $uid, $this->entityIdentifier);
    }

    public function getIdentifier() {
      return $this->entityIdentifier;
    }
}
