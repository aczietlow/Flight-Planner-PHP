<?php
/**
 * Created by PhpStorm.
 * User: aczietlow
 * Date: 12/7/14
 * Time: 11:02 PM
 */

require_once 'vendor/autoload.php';


/*
 * Testing implementation code of classes.
 */

//$destination = FlightSim\Entity\EntityFactory::getDestination('Airport');

$destination = FlightSim\Entity\EntityFactory::getDestination('Airplane')->load('747compo');

var_dump($destination);
