<?php

# First In Last Out structure
# 3 methods: push, pop, peek

$a = new SplStack();
$a->push('1');
$a->push('2');
$a->push('3');

while($a->count()){
  $x = $a->pop();
  echo "{$x} ";
}
