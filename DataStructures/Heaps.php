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
			// move last item into the root so the heap is no longer disjointed
			$lastNode = array_pop($this->heap);
			array_unshift($lastNode);
			
			$this->adjust(0);
		}
		return $rootNode;
	}
	
	public function count(){
		return count($this->heap);
	}
	
	protected function compare($item1, $item2){
		if($item1 == $item2){
			return 0;
		}
		
		$compareValue =  ($item1[0] > $item2[0] ? 1 : -1);
		if($this->isMinHeap){
			$compareValue *= -1;
		}
		return $compareValue;
	}
	
	protected function adjuct($rootIndex){
		// we've gone as far as we can down the tree if root is a leaf
		if(!$his->isLeaf($rootIndex)){
			$leftIndex = (2 * $rootIndex) + 1;
			$rightIndex = (2 * $rootIndex) + 2;
			
			//if root is less/bigger than either of it's children
			$h = $this->heap;
			if(
				(isset($h[$leftIndex]) && $this->compare($h[$rootIndex], $h[$leftIndex]) < 0) ||
				(isset($h[$rightIndex]) && $this->compare($h[$rootIndex], $h[$rightIndex]) < 0)
				){
				//find the larger/smaller child
				if(isset($h[$leftIndex]) && isset($h[$rightIndex])){
					$j = ($this->compare($h[$leftIndex], $h[$rightIndex]) >= 0) ? $leftIndex : $rightIndex;
				}
				elseif(isset($h[$leftIndex])){
					$j = $leftIndex; // left child only
				}
				else{
					$j = $rightIndex; // rigth child only
				}
				
				//swap places with root
				list($this->heap[$rootIndex], $this->heap[$j]) = [$this->heap[$j], $this->heap[$rootIndex]];
				
				//recursively adjust semiheap rooted at new node j
				$this->adjust($j);
			}
			// if not, we stop
		}
		//or we stop because the heap is optimized
	}
	
	protected function isLeaf($index){
		// there will always be 2n + 1 nodes in the sub-heap
		return ((2 * $index) + 1) > $this->count();
	}
	
	protected function isEmpty(){
		return empty($this->heap);
	}
	
}
