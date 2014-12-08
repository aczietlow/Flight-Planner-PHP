<?php
/**
 * Created by PhpStorm.
 * User: aczietlow
 * Date: 12/7/14
 * Time: 11:31 PM
 */

namespace FlightSim\Database;

class Database extends \PDO {

  public function __construct() {
  }

  /**
   * Creates PDO object to be used to interact with the database through out the
   * application.
   */
  public function connect() {
    $info = $this->getConnectionInfo();
    try {
      parent::__construct('mysql://' . $info['name'] . ':' . $info['password'] . '@' . $info['uri'] . '/' . $info['database']);
    } catch (\PDOException $e) {
      sprintf('Database connection failed: %s', $e->getMessage());
    }

    return TRUE;
  }

  /**
   * Get the connection info needed to create the PDO object from the config
   * file.
   */
  public function getConnectionInfo() {
    return array(
      'name' => 'root',
      'password' => 'root',
      'database' => 'drupal8',
      'uri' => '127.0.0.1',
    );
  }
}
