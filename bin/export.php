#!/usr/bin/env php
<?php

/**
 * @author   : Vitaliy Charnou <graffov87@gmail.com>
 */

include 'general.php';

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

