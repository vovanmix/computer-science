<?php

# Last In First Out (LIFO) structure
# Abstract data type
# 3 methods: push, pop, peek
# Could be implemented depending of a language natively, with a list or array behind the curtain

$a = new SplStack();
$a->push('1');
$a->push('2');
$a->push('3');

while($a->count()){
  $x = $a->pop();
  echo "{$x} ";
}
