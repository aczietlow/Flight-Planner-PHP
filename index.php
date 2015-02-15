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

//$destination = FlightSim\Entity\EntityFactory::getDestination('Airplane');

$airplane = FlightSim\Entity\EntityFactory::getVehicle('Airplane')->load('747');
$airport = FlightSim\Entity\EntityFactory::getDestination('Airport')->load('DALA');
$navbeacon = FlightSim\Entity\EntityFactory::getDestination('NavBeacon')->load('NAVE');


$startDestination = FlightSim\Entity\EntityFactory::getDestination('airport')->load('KMCO');
$endDestination = FlightSim\Entity\EntityFactory::getDestination('airport')->load('KCLE');

//var_dump($startDestination);

$flightPlan = new FlightSim\FlightPlan\FlightPlan();
$flightPlan->addDestination($startDestination);
$flightPlan->addDestination($endDestination);

var_dump($flightPlan->getDestinations());
