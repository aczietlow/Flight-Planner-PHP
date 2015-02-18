# Dijkstra's Algorithm

Implements a shortest route graphing algorithm conceived by Edsger Dijkstra. Given a graph with non-negative
weights and a source the algorithm will find a shortest path tree.

## Dijkstra in a nut shell...

1. Create a sptSet (shortest path tree) that keeps track of vertices included in the spt, i.e. whose minimum
distance from source is calculated and finalized. Initially this set is empty.

2. Assign a distance value to all vertices in the input graph. Initialize all distance values as infinity.
Assign a distance value of 0 to the source vertex so that it is picked first.

3. While sptSet doesn't include all vertices:
 * Pick a vertex u which is not in sptSet and has a minimum distance value
 * Include u in sptSet
 * Update distance value of all adjacent vertices of u.
   * To update distance values, iterate through all adjacent vertices. For every adjacent vertex v, if the 
   sum of distance value of u (from source) and weight of edge u-v, is less than the distance value of
   v then update the distance value of v.
       
       
## Heaps, Stacks, and Queues Oh my



## Graphs

For this problem space a graph can be thought of as a series of vertices plotted along with x,y axis with a
measure of distance for each edge between vertices.

![Graphs](http://www.geeksforgeeks.org/wp-content/uploads/Fig-11.jpg "Source: http://www.geeksforgeeks.org")

There are 2 ways to represent this at a code level, adjacency matrix, or adjacency list. Each has advantages 
and disadvantages is processing speeds depending on the task. To my knowledge I don't know of a common/simple
way to use  adjacency matrices in PHP.

### Adjacency Matrix

An adjacency matrix is a means of representing which vertices (or nodes) of a graph are adjacent to which other vertices.

Example using the graph above

    > 0,  4, 0,  0,  0,  0, 0,  8, 0
      4,  0, 8,  0,  0,  0, 0, 11, 0 
      0,  8, 0,  7,  0,  4, 0,  0, 2                     
      0,  0, 7,  0,  9, 14, 0,  0, 0                     
      0,  0, 0,  9,  0, 10, 0,  0, 0
      0,  0, 4,  0, 10,  0, 2,  0, 0                     
      0,  0, 0, 14,  0,  2, 0,  1, 6
      8, 11, 0,  0,  0,  0, 1,  0, 7
      0,  0, 2,  0,  0,  0, 6,  7, 0

C/C++ has a data type for undirected and directed graphs. 

    /* Let us create the example graph discussed above */
       int graph[V][V] = {{0, 4, 0, 0, 0, 0, 0, 8, 0},
                          {4, 0, 8, 0, 0, 0, 0, 11, 0},
                          {0, 8, 0, 7, 0, 4, 0, 0, 2},
                          {0, 0, 7, 0, 9, 14, 0, 0, 0},
                          {0, 0, 0, 9, 0, 10, 0, 0, 0},
                          {0, 0, 4, 0, 10, 0, 2, 0, 0},
                          {0, 0, 0, 14, 0, 2, 0, 1, 6},
                          {8, 11, 0, 0, 0, 0, 1, 0, 7},
                          {0, 0, 2, 0, 0, 0, 6, 7, 0}
                         };

### Adjacency List

Adjacency lists are more space-efficient, particularly for sparse graphs in which most pairs of vertices are 
unconnected, while adjacency matrices facilitate quicker look-ups.

Moreover, we can easily work with adjacency list in PHP

Example:

    $graph = array(
      'A' => array('B' => 2, 'D' => 4),
      'B' => array('C' => 1, 'G' => 10, 'A' => 2),
      'C' => array('B' => 1),
      'D' => array('E' => 3, 'A' => 4, 'F' => 8),
      'E' => array('D' => 3),
      'F' => array('D' => 8, 'G' => 2),
      'G' => array('B' => 10, 'F' => 2),
    );

## Source, Inspiration, and Reference
* http://en.wikipedia.org/wiki/Graph_theory
* http://en.wikipedia.org/wiki/Dijkstra%27s_algorithm
* http://www.geeksforgeeks.org/greedy-algorithms-set-6-dijkstras-shortest-path-algorithm/
* http://www.sitepoint.com/data-structures-4/
* http://www.codediesel.com/algorithms/building-a-adjacency-matrix-of-a-graph/

## Future

In the future I'd love to be able to print the graphs and illustrate the process.

Resources
* https://github.com/clue/graph
* http://www.graphviz.org/