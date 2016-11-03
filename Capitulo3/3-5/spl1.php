<?php

$file = new SplFileObject('spl1.php');
print 'Nome: ' . $file->getFilename() . '<br>' . PHP_EOL;
print 'Extensao: ' . $file->getExtension() . '<br>' . PHP_EOL;

$file2 = new SplFileObject("novo.txt","w");
$bytes = $file2->fwrite('olá mundo php' . PHP_EOL);
print 'Bytes escrito: ' . $bytes . PHP_EOL;