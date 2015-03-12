<?php
include(__DIR__. '/vendor/autoload.php');

$func = function () {
    echo 'questa è una funzione'."\n";
};

$func();




$obj1 = new MyClass();
$obj2 = new MyClass();

$obj1->setFilterFunc(function($el) {
    return is_object($el);
});

$array = $obj1->filter(array(
    'asdf',
    $obj2,
    9,    
));

var_dump($array);


