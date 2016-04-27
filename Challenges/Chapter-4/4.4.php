<?php

# topological sort

define('STATUS_BLANK', 1);
define('STATUS_PROCESSING', 2);
define('STATUS_VISITED', 3);

class GraphNode{
  public $value = null;
  public $status = STATUS_BLANK;
  public $adjacent = [];
  
  public function __construct($name){
      $this->name = $name;
  }
}

class Graph{
  public $nodes = [];
}

function setStatusesToBlank(Graph $graph){
  foreach($graph->nodes as $node){
    if($node->status !== STATUS_VISITED){
      $node->status = STATUS_BLANK;
    }
  }
}

function runDFS($node, $order){
  if($node->status == STATUS_BLANK){
    $node->status = STATUS_PROCESSING;
    foreach($node->adjacent as $adjacent){
      runDFS($node, $order);
    }
    $order->unshift($node->name);
  }
}

function findProjectsOrder(Graph $graph){
    $order = new ArrayObject();
    $nodes = $graph->nodes;
    foreach($graph->nodes as $node){
      setStatusesToBlank($graph);
      runDFS($node, $order);
    }
    return $order;
}




$nodeA = new GraphNode('A');
$nodeB = new GraphNode('B');
$nodeC = new GraphNode('C');
$nodeD = new GraphNode('D');
$nodeE = new GraphNode('E');
$nodeF = new GraphNode('F');
$nodeG = new GraphNode('G');
$nodeH = new GraphNode('H');
$nodeA->adjacent = [$nodeD];
$nodeB->adjacent = [$nodeE];
$nodeC->adjacent = [];
$nodeD->adjacent = [$nodeF];
$nodeE->adjacent = [$nodeG];
$nodeF->adjacent = [$nodeH];
$nodeG->adjacent = [];
$nodeH->adjacent = [];

$graph = mew Graph();
$graph->nodes = [$nodeA, $nodeB, $nodeC, $nodeD, $nodeE, $nodeF, $nodeG, $nodeH];

$order = findProjectsOrder($graph);
