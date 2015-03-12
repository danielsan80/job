<?php
use MyNamespace\MySubnamespace\MyClass as MyClass2;

include(__DIR__. '/vendor/autoload.php');



$obj1 = new MyClass();
$obj2 = new MyClass2();
$obj3 = new MyNamespace\MySubnamespace\MyClass();

echo $obj1->getInfo();
echo $obj2->getInfo();
echo $obj3->getInfo();