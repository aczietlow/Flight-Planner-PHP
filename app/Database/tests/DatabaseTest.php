<?php
/**
 * @file Phpunit test for Database class.
 */

use FlightSim\Database\Database;

class DatabaseTest extends PHPUnit_Framework_TestCase {



  public function testDatabaseCredentials() {
    $db = new Database();
    $connection_info = $db->getConnectionInfo();
    $this->assertNotEmpty($connection_info['database']);
    $this->assertNotEmpty($connection_info['name']);
    $this->assertNotEmpty($connection_info['password']);
    $this->assertNotEmpty($connection_info['uri']);

    return $connection_info;
  }

  public function testDatabaseConnection() {
    $db = new Database();
    $this->assertTrue($db->connect());
  }
}
