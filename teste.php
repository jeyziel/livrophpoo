<?php
class A {
    function example() {
        echo "Je suis A::example() et je fournis une fonctionnalité de base.<br />\n";
    }
}

class B extends A {
    function example() {
        echo "Je suis B::example() et je fournis une fonctionnalité supplémentaire.<br />\n";
        parent::example();
    }
}

$b = new B;

// Cette syntaxe va appeler B::example(), qui, à son tour, va appeler A::example().
$b->example();
?>