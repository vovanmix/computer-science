<?php
class HashTable {
    
    private $numberOfBuckets = 1000;
    
    private $data = [];
    
    private function hashKey($key){
        return hexdec( md5($key) ) % $this->numberOfBuckets;
    }
    
    private function getBucketValues($key){
        $hash = $this->hashKey($key);
        $bucketValues = $this->data[$hash];
        if(empty($bucketValues)){
            $bucketValues = new SplDoublyLinkedList();
        }
        return $bucketValues;
    }
    
    public function add($key, $value){
        $bucketValues = $this->getBucketValues($key);
        $valueHolder = new StdClass;
        $valueHolder->key = $key;
        $valueHolder->value = $value;
        $bucketValues->push($valueHolder);
    }
    
    public function get($key){
        $bucketValues = $this->getBucketValues($key);
        foreach($bucketValues as $bucketValue){
            if($bucketValue->key == $key){
                return $bucketValue->value;
            }
        }
        return null;
    }
}
