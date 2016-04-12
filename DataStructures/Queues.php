<?php

# First in, first out (FIFO)
# Abstract data type
# methods put, shift

$q = new SplQueue();
$q->enqueue(1);
$q->enqueue(2);
$q->enqueue(3);
$q->setIteratorMode(SplDoublyLinkedList::IT_MODE_DELETE);

foreach($q as $x){
    echo $x;
}
