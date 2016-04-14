<?php

# Binary search tree is a binary tree (each node has max of 2 children)
# children are named Left and Right, where the key of the Left child is always smaller 
# than the key of it's parent, and the key of the Right child is bigger
# When performing search, we traverse through nodes and compare the keys

class TreeNode{
    
    private $left = null;
    private $right = null;
    private $key = null;
    private $value = null;

    public function __construct($key, $value){
        $this->key = $key;
        $this->value = $value;
    }
    
    public function getValue(){
        return $this->value;
    }
    
    public function getKey(){
        return $this->key;
    }
    
    public function append(TreeNode $item){
        if($item->key > $this->key){
            $this->setRight($item);
        }
        elseif($item->key < $this->key){
            $this->setLeft($item);
        }
        else{
            throw new \Exception("Cannot add an item with the same key twice");
        }
    }
    
    private function setLeft(TreeNode $item){
        if($this->left === null){
            $this->left = $item;
        }else{
            $this->left->append($item);
        }
    }
    
    private function setRight(TreeNode $item){
        if($this->right === null){
            $this->right = $item;
        }else{
            $this->right->append($item);
        }
    }
    
    public function find($key){
        if($key == $this->key){
            return $this->value;
        }
        elseif($key > $this->key){
            $this->right->find($key);
        }
        elseif($key < $this->key){
            $this->left->find($key);
        }
    }
    
    // public function getLeft(){
    //     return $this->left;
    // }
    
    // public function getRight(){
    //     return $this->right;
    // }
}


class BinarySearchTree {

    private $_head = null;
    
    public function add($key, $value){
        $item = new TreeNode($key, $value);
    
        if($this->_head === null){
            $this->_head = $item;
        }
        else{
            $this->_head->append($item);
        }
    }
    
    public function get($key){
        if($this->_head === null){
            return false;
        }
        else{
            return $this->_head->find($key);
        }
    }
    
}
