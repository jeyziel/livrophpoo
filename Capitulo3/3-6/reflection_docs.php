<?php

$classes = spl_classes(); //lista classe da spl

foreach ($classes as $classe){
    $rc = new ReflectionClass($classe);
    print '<b>' . $classe . '</b>' . '<br>' . PHP_EOL;

    foreach ($rc->getMethods() as $method){
        print '   ' . $method->getName();
        print '(';
        $paramNames = array();
        $parameters = $method->getParameters();

        if(count($parameters) > 0){
            foreach ($parameters as $parameter){
                if($parameter->isOptional()){
                    $ParamNames[] = '[' . $parameter->getName() . ']';
                }else{
                    $paramNames[] = $parameter->getName();
                }
            }
        }
        print implode(',',$paramNames);
        print ')';
        print '<br>' . PHP_EOL;

    }
}

//$xml = new SimpleXMLElement('<' . 'jeyziel' . '/>');
//$xml->addChild('nome','jeyziel');
//var_dump($xml);