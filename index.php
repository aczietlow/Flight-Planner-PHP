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

//var_dump($flightPlan->getDestinations());

$graph = array(
  'A' => array('B' => 2, 'D' => 4),
  'B' => array('C' => 1, 'G' => 10, 'A' => 2),
  'C' => array('B' => 1),
  'D' => array('E' => 3, 'A' => 4, 'F' => 8),
  'E' => array('D' => 3),
  'F' => array('D' => 8, 'G' => 2),
  'G' => array('B' => 10, 'F' => 2),
);

$dijkstra = new \FlightSim\Algorithm\Dijkstra($graph, 'A');

$dijkstra->printShortestPath('G');
$result = $dijkstra->getShortestPath('G');

$flightPlan->getGraph();

// Distance from Augusta regional Airport to 1600 Pennsylvania Ave NW, Washington, DC.

// 42.139722, -71.516667 to 42.358056, -71.063611. (should be ~44.4 km)
// We really really need tests for these things!!!!!!!!!
$test = \FlightSim\Algorithm\HaversineAlgorithm::distanceBetweenPlaces(42.139722, -71.516667, 42.358056, -71.063611);

print $test;
