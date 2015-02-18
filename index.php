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


//var_dump($airport);

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