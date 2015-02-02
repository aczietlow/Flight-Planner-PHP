<?php
/**
 * Created by PhpStorm.
 * User: aczietlow
 * Date: 12/7/14
 * Time: 11:31 PM
 */

namespace FlightSim\Database;

class Database
{

    public $xml;

    public function __construct()
    {
        $xml = file_get_contents('app/Database/data/database.xml');
        $this->xml = new \SimpleXMLElement($xml);
    }

  /**
   * Finds and retrieves available information about the requested entity.
   *
   * @param string $type
   *    The type of entity the user wishes to retrieve.
   * @param $uid
   *    Unique identifier of the entity in question (model, airport code, etc).
   * @param $identifier
   *    The type of identifier to be searched (model, airport_code, etc).
   *
   * @return array
   *    An array of available information about the requested entity.
   */
    public function load($type, $uid, $identifier)
    {

        $result = $this->xml->xpath(
            // @todo Evaluate if it's reliable that $type(s)/$type will always work.
            $type . "s/". $type . "[" . $identifier . "=\"" . $uid . "\"]"
        );

        if (empty($result)) {
            throw new \Exception(sprintf("The %s %s could not be found using the %s as the identifier", $uid, $type, $identifier));
        }

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
