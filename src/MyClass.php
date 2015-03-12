<?php

class MyClass
{
    
    private $filterFunc;
    
    
    function __construct()
    {
        $this->filterFunc = function ($el) {
            return true;
        };
    }
    
    function getInfo()
    {
        return "è la mia classe\n";
    }
    
    
    public function setFilterFunc($filterFunc)
    {
        $this->filterFunc = $filterFunc;        
    }
    
    public function filter($array)
    {
        $func = $this->filterFunc;
        $result = array();
        foreach($array as $el) {
            if ($func($el)) {
                $result[] = $el;
            }
        }
        return $result;
    }
    
}