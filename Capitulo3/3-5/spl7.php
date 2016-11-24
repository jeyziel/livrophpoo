<?php

$path = './';

foreach (new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($path,
        RecursiveDirectoryIterator::SKIP_DOTS)) as $item)
{
  print (string) $item . '<br>' . PHP_EOL;
}