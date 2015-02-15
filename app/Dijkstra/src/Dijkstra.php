<?php
/**
 * @file
 * Dijkstra.php
 *
 * @author aczietlow
 */

namespace Dijkstra;


class Dijkstra
{
    // From http://joshosopher.tumblr.com/post/3195564776/dijkstras-algorithm
    public function dijkstra(array $g, $start, $end = null)
    {
        $d = array();
        $p = array();
        $q = array(0 => $start);

        foreach ($q as $v) {
            $d[$v] = $q[$v];
            if ($v == $end) {
                break;
            }

            foreach ($g[$v] as $w) {
                $vw = $d[$v] + $g[$v][$w];

                if (in_array($w, $d)) {
                    if ($vw < $d[$w]) {
                        throw new \Exception('Dijkstra: found better path to already-final vertex');
                    }
                } elseif ($vw < $q[$w]) {
                    $q[$w] = $vw;
                    $p[$w] = $v;
                }
            }

            return array($d, $p);
        }
    }

    public function shortestPath(array $g, $start, $end)
    {
        list($d, $p) = $this->dijkstra($g, $start, $end);
        $path = array();
        while (true) {
            $path[] = $end;
            if ($end == $start) {
                break;
            }
            $end = $p[$end];
        }

        array_reverse($path);

        return $path;
    }
}
