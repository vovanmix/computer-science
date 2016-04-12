<?php

# Linked list is a group of elements, each of them have a link (poiner, reference) to the next (linked list) 
# and previous (double linked list) element. Elements can not be accessed by index. Elemets are accessed only in consequence.
# Lists are better than arrays in adding elements (faster in memory). But is lists are implemented using arrays there is no difference.
# Linear Search complexity: O(n) (arrays are better( O(log n)) in binary search)

# 1. Built in implementstion
$a = new SplDoublyLinkedList();

$a->push('hello');
$a->push('kitty');
$a->push(',');
$a->push('how');
$a->push('are');
$a->push('you');
$a->push('?');

foreach($a as $item){
  echo "${item} ";
}

echo "{$a->count()}";

while($a->count()){
  $x = $a->shift();
  echo "${x} ";
}

echo "{$a->count()}";
