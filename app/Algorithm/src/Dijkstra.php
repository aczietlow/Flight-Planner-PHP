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
     * A graph represented by an adjacency list.
     *
     * @var array
     */
    protected $graph;

    public function __construct($graph)
    {
        $this->graph = $graph;
    }

    public function getShortestPath($source, $target)
    {
        // Distance from each Vertex to source
        $distance = array();

        // Holds the shortest path tree;
        $sptSet = array();

        // Each vertex's predecessor with the shortest path.
        $route = array();

        // Queue of all unoptimized vertices
        $queue = new \SplPriorityQueue();

        foreach ($this->graph as $vertex => $adjacentVertices) {
            // @TODO PHP_INT_MAX vs INF?
            $distance[$vertex] = PHP_INT_MAX;
            $sptSet[$vertex] = false; // @TODO prob not needed anymore now that we use a queue.
            $route[$vertex] = null;
            foreach ($adjacentVertices as $adjacentVertex => $weight) {
                // Use the distance (weight) as the priority.
                $queue->insert($adjacentVertex, $weight);
            }
        }

        // Set distance of source to 0.
        $distance[$source] = 0;

        while (!$queue->isEmpty()) {
            // Extract the minimum distance.
            $u = $queue->extract();
            if (!empty($this->graph[$u])) {
                foreach ($this->graph[$u] as $v => $weight) {
                    // If alternate route is shorter.
                    if (($distance[$u] + $weight) < $distance[$v]) {
                        $route[$v] = $u;
                        $distance[$v] = $distance[$u] + $weight;
                    }
                }
            }
        }

        // Use reverse iteration using reverse stack.
        $stack = new \SplStack();
        $u = $target;
        $dist = 0;

        // Traverse from target to source
        while (isset($route[$u]) && $route[$u]) {
            $stack->push($u);
            $dist += $this->graph[$u][$route[$u]];
            $u = $route[$u];
        }

        if ($stack->isEmpty()) {
            echo "No route from $source to $target";
        } else {
            // Add the source node and print the path in reverse {LIFO} order.
            $stack->push($source);
            echo "$dist:";
            $sep = '';
            foreach ($stack as $vertex) {
                echo $sep, $vertex;
                $sep = '->';
            }
            echo "\n";
        }
    }
}
