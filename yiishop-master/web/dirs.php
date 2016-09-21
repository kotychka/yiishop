<?php

$rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator('/vagrant/yiishop/web'));

$files = array(); 

foreach ($rii as $file) {

    if ($file->isDir()){ 
        continue;
    }

    $files[] = $file->getPathname(); 

}

var_dump($files);