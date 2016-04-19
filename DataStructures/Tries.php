<?php

# a tree where each node could have as much children as there are 
# possible values in the datatype (a-z for letters, 0-9 for numbers etc)

# very useful for searching in the dictionaries, to find if the sequence is a word or a prefix of a word

# add O(1)
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

class TrieNode {
    
    protected $is_a_word = false;
    protected $children = [];
    
    public function __construct($is_a_word){
        $this->is_a_word = $is_a_word;
    }
    
    public function add($word){
        $letter = substr($word, 0, 1);
        $new_node = new TrieNode($is_a_word);
        $this->children[$letter] = $new_node;
        if(strlen($word) > 1){
            $remaining_word = substr($word, 1);
            $new_node->add($remaining_word);
        }
        else{
            $this->is_a_word = true;
        }
    }
    
}

class Trie implements Vocabulary {
    
    protected $head = null;
    
    public function __construct($is_a_word){
        $this->head = new TrieNode(false);
    }
    
    public function add($word){
        $this->head->add($word);
    }
    
    public function isPrefix($prefix){
        
    }
    
    public function contains($word){
        
    }
    
    
    
    // store children reference in a hash table
    
}
