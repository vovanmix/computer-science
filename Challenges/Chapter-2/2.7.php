<?php

# intersection

function getKthNode(ListNode $node, $k){
  while($k > 0){
      $first_list_pointer = $first_list_pointer->next;
      $k--;
    }
  return $first_list_pointer;
}

function findIntersection(SinglyLinkedList $list1, SinglyLinkedList $list2){
  
  //traverse each of them till the end, if they have the same tail, they intersect
  //traverse them in parallel from lenLongest-lenSmallest, comparing nodes on each
  
  $current = $list1->head;
  $previous1 = null;
  $list1_nodes = 0;
  while($current != null){
    $current = $current->next;
    $previous1 = $current;
    $list1_nodes ++;
  }
  
  $current = $list2->head;
  $previous2 = null;
  $list2_nodes = 0;
  while($current != null){
    $current = $current->next;
    $previous2 = $current;
    $list2_nodes ++;
  }
  
  if($previous2 == $previous1){ // they do intersect
    $skip = abs($list1_nodes - $list2_nodes);
    
    $longest_list = $list2_nodes >= $list1_nodes ? $list2 : $list1;
    $shortest_list = $list2_nodes >= $list1_nodes ? $list1 : $list2;
    
    $first_list_pointer = getKthNode($longest_list->head, $skip);
    $second_list_pointer = $shortest_list->head;
    
    while($first_list_pointer != $second_list_pointer){
      $first_list_pointer = $first_list_pointer->next;
      $second_list_pointer = $second_list_pointer->next;
    }
    
    return $first_list_pointer;
  }
  return false;
  
}

//Brute Force: O(mk)
//Final: O(m+k) Space O(1)
//BCR: O(m + k)
