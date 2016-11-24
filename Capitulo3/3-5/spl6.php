<?php

foreach (new DirectoryIterator('./') as $file){
    print (string) $file . '<br>' . PHP_EOL;
    print 'Nome: ' . $file->getFilename() . '<br>' . PHP_EOL;
    print 'Extensao: ' . $file->getExtension() . '<br>' . PHP_EOL;
    print 'Tamanho: ' . $file->getSize() . '<br>' . PHP_EOL;

    print  '<br>' . PHP_EOL;


}