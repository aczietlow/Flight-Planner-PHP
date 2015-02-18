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
     * An array containing the minimum distance to each Vertex from source.
     *
     * @var array
     */
    protected $distance = array();

    /**
     * A graph represented by an adjacency list.
     *
     * @var array
     */
    protected $graph = array();

    /**
     * An identifier for the source vertex.
     *
     * @var string
     */
    public $source = '';


    /**
     * Each vertex's preceding vertex with the shortest path.
     *
     * @var array
     */
    protected $route = array();

    public function __construct($graph, $source)
    {
        $this->graph = $graph;
        $this->source = $source;

        // Run dijkstra's algorithm on the graph.
        $this->dijkstra($this->source);
    }

    /**
     * Dijkstra's Algorithm.
     *
     * @param mixed $source
     *   Source vertex of the graph.
     */
    protected function dijkstra($source)
    {
        // Queue of all unoptimized vertices
        $queue = new \SplPriorityQueue();

        foreach ($this->graph as $vertex => $adjacentVertices) {
            // @TODO PHP_INT_MAX vs INF?
            $this->distance[$vertex] = PHP_INT_MAX;
            $this->route[$vertex] = null;
            foreach ($adjacentVertices as $adjacentVertex => $weight) {
                // Use the distance (weight) as the priority.
                $queue->insert($adjacentVertex, $weight);
            }
        }

        // Set distance of source to 0.
        $this->distance[$source] = 0;

        while (!$queue->isEmpty()) {
            // Extract the minimum distance.
            $u = $queue->extract();
            if (!empty($this->graph[$u])) {
                foreach ($this->graph[$u] as $v => $weight) {
                    // If alternate route is shorter.
                    if (($this->distance[$u] + $weight) < $this->distance[$v]) {
                        $this->route[$v] = $u;
                        $this->distance[$v] = $this->distance[$u] + $weight;
                    }
                }
            }
        }
    }

    /**
     * Finds the shortest possible path to the target vertex from the source.
     *
     * @param mixed $target
     *   An identifier for the target vertex.
     *
     * @throws \Exception if path from source to target does not exist.
     *
     * @return \stdClass
     *   Contains result of shortest path data.
     */
    public function getShortestPath($target)
    {
        // Use reverse iteration using reverse stack.
        $stack = new \SplStack();
        $u = $target;
        $distance = 0;

        // Traverse from target to source
        while (isset($this->route[$u]) && $this->route[$u]) {
            $stack->push($u);
            $distance += $this->graph[$u][$this->route[$u]];
            $u = $this->route[$u];
        }

        if ($stack->isEmpty()) {
            $message = sprintf('No route from %s to %s', $this->source, $target);
            throw new \Exception($message);
        } else {
            // Add the source node and print the path in reverse {LIFO} order.
            $stack->push($this->source);

            // @TODO find a type for this.
            $result = new \stdClass();

            $result->distance = $distance;

            $i = 0;
            foreach ($stack as $vertex) {
                $result->path[$i] = $vertex;
                $i++;
            }
            return $result;
        }
    }

    /**
     * Finds and prints the shortest possible path to the target vertex from the source.
     *
     * @param $target
     */
    public function printShortestPath($target)
    {
        // Use reverse iteration using reverse stack.
        $stack = new \SplStack();
        $u = $target;
        $dist = 0;

        // Traverse from target to source
        while (isset($this->route[$u]) && $this->route[$u]) {
            $stack->push($u);
            $dist += $this->graph[$u][$this->route[$u]];
            $u = $this->route[$u];
        }

        if ($stack->isEmpty()) {
            echo "No route from $this->source to $target";
        } else {
            // Add the source node and print the path in reverse {LIFO} order.
            $stack->push($this->source);
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
