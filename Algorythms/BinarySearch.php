<?php

# Search the ordered array by dividing it in halves
# Time Complexity:
# Binary Search: O(log(n))
# Linear (Brute Force):	O(n)



function binary_search($needle, $haystack){

    $left = 0;
    $right = count($haystack) - 1;
    
    while($left <= $right){
        $mid = ($left + $right) / 2;
        
        if($haystack[$mid] == $needle){
            return $mid;
        } elseif ($haystack[$mid] > $needle){
            $right = $mid - 1;
        } elseif($list[$mid] < $x) {
            $left = $mid + 1;
        }
    }
    
    return -1;

}

$array = range(1,100,2);

var_dump( binary_search(43, $array) );
