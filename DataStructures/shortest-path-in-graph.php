<?php

# Finding the Shortest-Path in a weightened graph

$graph = array(
  'A' => array('B' => 3, 'D' => 3, 'F' => 6),
  'B' => array('A' => 3, 'D' => 1, 'E' => 3),
  'C' => array('E' => 2, 'F' => 3),
  'D' => array('A' => 3, 'B' => 1, 'E' => 1, 'F' => 2),
  'E' => array('B' => 3, 'C' => 2, 'D' => 1, 'F' => 5),
  'F' => array('A' => 6, 'C' => 3, 'D' => 2, 'E' => 5),
);

# examining each edge between all possible pairs of vertices starting from the source node 
# and maintaining an updated set of vertices with the shortest total distance until 
# the target node is reached, or not reached, whichever the case may be.

# implementation using a PriorityQueue to maintain a list of all “unoptimized” vertices:
