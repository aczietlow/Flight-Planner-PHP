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
     * An array containing the minimum distance between all vertices.
     *
     * @var array
     */
    protected $distance;

    /**
     * Gets the calculated distance array.
     *
     * @return array
     */
    public function getDistance()
    {
        return $this->distance;
    }

    public function DIJKSTRA($graph, $source)
    {
        // Distance from each Vertex to source
        $distance = array();

        // Holds the shortest path tree;
        $sptSet = array();

        foreach ($graph as $vertex => $adjacentVertices) {
            $distance[$vertex] = PHP_INT_MAX;
            $sptSet[$vertex] = false;
        }

        // Set distance of starting point to 0.
        $distance[$source] = 0;

        // Find shortest path from all vertices.
        for ($i = 0; $i < count($graph) - 1; $i++) {
            $u = $this->minDistance($distance, $sptSet, $graph);

            // Mark the vertex as processed in the spt.
            $sptSet[$u] = true;

            // Update the distance of all adjacent vertices from the selected vertex.
            foreach ($graph[$u] as $v => $distanceValue) {
                /*
                 * Update distance of $vertex if:
                 * - It's not in sptSet
                 * - The total weight of path from source to v through u is
                 *   smaller than current value of dist[v]
                 */
                if (!$sptSet[$v] &&
                  $distance[$u] != PHP_INT_MAX &&
                  ($distance[$u] + $distanceValue < $distance[$v])) {
                    $distance[$v] = $distance[$u] + $distanceValue;
                }
            }


        }

        $this->distance = $distance;
    }

    public function printSolution()
    {
        print sprintf("Vertex   Distance from Source\n");
        foreach ($this->distance as $vertex => $distance) {
            print sprintf("%s \t\t %d\n", $vertex, $distance);
        }
    }

    /**
     * Utility function to find the minimum distance from the vertices not in the sptSet.
     *
     * @param array $distance
     *   Array containing each vertices minimum distance from source.
     * @param array $sptSet
     *   Array containing all of the vertices that are part of the spt.
     *
     * @return mixed
     *   The vertex with the minimum distance from source.
     */
    protected function minDistance($distance, $sptSet, $graph)
    {
        $min = PHP_INT_MAX;
        $minVertex = '';

        // Finds the next unprocessed vertex with the shortest distance from source.
        foreach ($graph as $vertex => $adjacentVertices) {
            if ($sptSet[$vertex] == false && $distance[$vertex] <= $min) {
                $min = $distance[$vertex];
                $minVertex = $vertex;
            }
        }
        return $minVertex;
    }
}
