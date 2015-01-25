<?php
/**
 * Created by PhpStorm.
 * User: aczietlow
 * Date: 12/7/14
 * Time: 11:31 PM
 */

namespace FlightSim\Database;

class Database {

    public $xml;

    public function __construct()
    {
        $xml = file_get_contents('app/Database/data/database.xml');
        $this->xml = new \SimpleXMLElement($xml);
    }

    // @todo Load a certain object of a certain type.
    public function load($type, $identifier)
    {

        $result = $this->xml->xpath(
          // @todo Evaluate if it's reliable that $type(s)/$type will always work.
          $type . "s/". $type . "[model=".$identifier."]"
        );

        // XPath returns a series of SimpleXMLElement objects, but we only expect
        // to have one result, so we use current() to extract that item, and then
        // get_object_vars to convert the object to an array.
        return get_object_vars(current($result));

    }

    public function loadAirplane($identifier)
    {

    }

    public function loadDestination($identifier)
    {

    }

    public function loadNavBeacon($identifier)
    {

    }
}
