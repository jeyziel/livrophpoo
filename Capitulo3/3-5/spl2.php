<?php

$file = new SplFileObject('spl2.php');

print 'forma 1: ' . PHP_EOL;

while (!$file->eof()){
    print 'linha :' . $file->fgets();
}
