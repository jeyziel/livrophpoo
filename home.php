<?php
class A {
    public function who() {
        echo __CLASS__;
    }
    public function test() {
        static::who(); // Here comes Late Static Bindings
    }
}

class B extends A {
    public function who() {
         echo __CLASS__;
    }
}


$a = new B;
$a->test();
?>