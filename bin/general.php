<?php

declare(strict_types=1);

const ENTITY = 'catalog_product';

function includeIfExists($file):void
{
    if (file_exists($file)) {
        include $file;
    }
}

includeIfExists(__DIR__.'/../vendor/autoload.php');
includeIfExists(__DIR__.'/../../../autoload.php');
includeIfExists(__DIR__.'/../src/Php/Traits/Additional.php');
includeIfExists(__DIR__.'/../src/Php/AbstractDirection.php');
includeIfExists(__DIR__.'/../src/Php/Writer/Csv.php');
includeIfExists(__DIR__.'/../src/Php/Export.php');
includeIfExists(__DIR__.'/../src/Php/Log.php');
$params =  include __DIR__ .'/../../../../app/etc/env.php';