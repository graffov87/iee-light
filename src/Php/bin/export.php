#!/usr/bin/env php
<?php

/**
 * @author   : Vitaliy Charnou <graffov87@gmail.com>
 */

declare(strict_types=1);

const ENTITY = 'catalog_product';

function includeIfExists($file):void
{
    if (file_exists($file)) {
        include $file;
    }
}

includeIfExists(__DIR__.'/../../../../../vendor/autoload.php');
includeIfExists(__DIR__.'/../../../../../autoload.php');
includeIfExists(__DIR__ .'/../Model/Traits/Additional.php');
includeIfExists(__DIR__.'/../Model/AbstractDirection.php');
includeIfExists(__DIR__.'/../Model/Writer/Csv.php');
includeIfExists(__DIR__.'/../Model/Export.php');
includeIfExists(__DIR__.'/../Model/Log.php');
$params =  include __DIR__ .'/../../../../../../app/etc/env.php';

$log = new \Chervit\Iee\Log();
$log->setBeginTime();
$export = new \Chervit\Iee\Export($params, $log);
$writer = new \Chervit\Iee\Writer\Csv();
$writer->setFile('pupsik.csv');
$data = $export->getData();
$headers = array_keys($data[0]);
$log->writeln('count:' . count($data));
$writer->setHeaders($headers);
foreach($export->getCollection($data) as $key => $item) {
    $writer->setInFile(array_values($item));
}
$log->writelnTime();

