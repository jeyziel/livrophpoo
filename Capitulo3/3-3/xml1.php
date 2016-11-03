<?php
/**
 * Created by PhpStorm.
 * User: jeyzi
 * Date: 28/10/2016
 * Time: 18:15
 */

//interpreta o documento xml
$xml = simplexml_load_file('paises.xml');
//exibe as informações do objeto criado
var_dump($xml);
