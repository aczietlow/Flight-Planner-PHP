<?php
/**
 * @file Phpunit test for Database class.
 */

use FlightSim\Database\Database;

class DatabaseTest extends PHPUnit_Framework_TestCase {
  public function testDatabaseSaysHello() {
    $db = new Database();
    $this->assertTrue($db->hello());
  }
}