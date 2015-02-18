<?php
/**
 * @file
 * Dijkstra.php
 *
 * @author aczietlow
 */

namespace FlightSim\Algorithm;


class Dijkstra
{
    /*
     * Dijkstra in a nut shell...
     *
     * 1) Create a $sptSet (shortest path tree) that keeps track of vertices included in the spt, i.e.
     * whose minimum distance from source is calculated and finalized. Initially this set is empty.
     *
     * 2) Assign a distance value to all vertices in the input graph. Initialize all distance values as
     * infinity. Assign a distance value of 0 to the source vertex so that it is picked first.
     *
     * 3) While $sptSet doesn't include all vertices:
     *    - Pick a vertex $u which is not in $sptSet and has a minimum distance value
     *    - Include $u in $sptSet
     *    - Update distance value of all adjacent vertices of $u.
     *      > To update distance values, iterate through all adjacent vertices. For every adjacent vertex
     *      $v, if sum of distance value of $u (from source) and weigh $t of edge $u-$v, is less than the
     *      distance value of $v then update the distance value of $v.
     */

    /**
     * A graph represented by an adjacency list.
     *
     * @var array
     */
    protected $graph;

    public function __construct($graph)
    {
        $this->graph = $graph;
    }

    public function getShortestPath($startPoint, $endPoint)
    {
        $sptSet = array();

        // Set distance of starting point to 0.
        $sptSet[$startPoint] = 0;

        $currentVertex = $startPoint;

        for ($i = 0; $i < count($this->graph); $i++) {
            $adjacentVertices = $this->graph[$currentVertex];

            foreach ($adjacentVertices as $adjacentVertex => $distance) {
                $sptSet[$adjacentVertex] = $distance;
            }
        }
        return $sptSet;
    }
}
