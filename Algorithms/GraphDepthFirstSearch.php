<?php

# start with retreiving all child nodes of the first node and all it's child nodes till the end

# Depth First Traversal (or Search) for a graph is similar to Depth First Traversal of a tree. The only catch here is, 
# unlike trees, graphs may contain cycles, so we may come to the same node again. To avoid processing a node more than once, 
# we use a boolean visited array. 

# The depth first search is well geared towards problems where we want to find any solution to the problem 
# (not necessarily the shortest path), or to visit all of the nodes in the graph
# It is a key property of the Depth First search that we not visit the same node more than once
# The basic concept is to visit a node, then push all of the nodes to be visited onto the stack. 
# To find the next node to visit we simply pop a node of the stack

class DepthFirstSearch {

}
