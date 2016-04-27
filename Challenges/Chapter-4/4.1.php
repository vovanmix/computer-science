<?php

# route between nodes

class Graph {
  public $nodes = [];
}

class GraphNode {
  public $adjacent = [];
  public $visited = false;
}

function findRoute(GraphNode $nodeA, GraphNode $nodeB){
  
  $queue = new SplQueue();
  
  foreach($nodeA->adjacent as $node){
    $queue->enqueue($node);
  }
  
  while($queue->top()){ //->valid()
    $node = $queue->dequeue();
    if(!$node->visited){
      if($node == $nodeB){
        return true;
      }
      $node->visited = true;
      foreach($node->adjacent as $adjacent){
        $queue->enqueue($adjacent);
      }
    }
  }
  
  return false;
  
}

$nodeA = new GraphNode();
$nodeB = new GraphNode();
$nodeC = new GraphNode();
$nodeD = new GraphNode();
$nodeE = new GraphNode();
$nodeF = new GraphNode();
$nodeG = new GraphNode();
$nodeH = new GraphNode();

$nodeA->adjacent = [$nodeB, $nodeC];
$nodeB->adjacent = [$nodeC, $nodeD];
$nodeC->adjacent = [$nodeD];
$nodeD->adjacent = [$nodeE];
//$nodeF->adjacent = [];
$nodeG->adjacent = [$nodeF, $nodeH];
$nodeH->adjacent = [$nodeG];

var_dump(findRoute($nodeA, $nodeH));
var_dump(findRoute($nodeA, $nodeE));
