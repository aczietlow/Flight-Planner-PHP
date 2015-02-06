<?php
/**
 * @file
 * Airplane.php
 *
 * @author aczietlow
 */

namespace FlightSim\Entity;


class Airplane extends Vehicle
{
    /**
     * @inheritdoc
     */
    protected $entityType = 'airplane';

    /**
     * @inheritdoc
     */
    protected $entityIdentifier = 'model';

    public function getName()
    {

    }
}
