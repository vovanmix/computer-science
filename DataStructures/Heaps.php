<?php

# Heap is a binary tree, where all childs' keys should be less (or bigger) that their parents'.
# Heaps are filled in order, top to bottom and left to right
# When we add a new value, we compare it's key to it's parent's, and if it doesn't fit in the structure, 
# we swap it with the parent, and then with it's parent
# Min heap: lowest key at the top, Max heap: biggest key at the top
# Very useful for implementing Priority queues


// http://www.sitepoint.com/data-structures-3/

// todo: Graphs http://www.sitepoint.com/data-structures-4/

class Heap {
	
	protected $heap;
	
	protected $isMinHeap = false;
	
	public function __construct($isMinHeap = false){
		$this->heap = array();
		$this->isMinHeap = (bool)$isMinHeap;
	}
	
	public function add($key, $value){
		$this->heap[] = [$key, $value];
	}
	
	public function extract(){
		if($this->isEmpty()){
			throw new RunTimeException('The heap is empty!');
		}
		
		$rootNode = array_shift($this->heap);
		
		if(!$this->isEmpty()){
			// move last item into the root so the heap is
			// no longer disjointed
			
			$last = array_pop($this->heap);
			array_unshift($last);
			
			$this->adjust(0);
		}
	}
	
	public function count(){
		return count($this->heap);
	}
	
	
	protected function compare($item1, $item2){
		if($item1 == $item2){
			return 0;
		}
		
		$compareValue =  ($item1 > $item2 ? 1 : -1);
		if($this->isMinHeap){
			$compareValue *= -1;
		}
		return $compareValue;
	}
	
	protected function adjuct($index){
		
	}
	
	protected function inLeaf($node){
		
	}
	
	protected function inEmpty(){
		
	}
	
}
