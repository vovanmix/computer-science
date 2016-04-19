<?php

# a tree where each node could have as much children as there are 
# possible values in the datatype (a-z for letters, 0-9 for numbers etc)

# add O(n) ??
# search "isPrefix" O(1)
# search "contains" O(1)
# Because the number of steps required to find a word is <= y
# y - max possible length of a word the dictionary (ex 16)
#
# Space O(n+M), M is the sum of the length of the strings in the dictionary
# O(n)
# in worst case, if not a single word shares a node, there will be n*y records = O(n)


interface Vocabulary {
    
    public function add($word);
    public function isPrefix($prefix);
    public function contains($word);
    
}

class Trie implements Vocabulary {
    
    public function __construct(){
        
    }
    
    public function add($word){
        
    }
    
    public function isPrefix($prefix){
        
    }
    
    public function contains($word){
        
    }
    
    
    
    // store children reference in a hash table
    
}
