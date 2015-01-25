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
$d = new FlightSim\Database\Database();

$destination = FlightSim\Entity\Entity::getDestination('Airport');

var_dump($destination);
