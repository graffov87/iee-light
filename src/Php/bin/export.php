#!/usr/bin/env php
<?php

/**
 * @author   : Vitaliy Charnou <graffov87@gmail.com>
 */

declare(strict_types=1);

function includeIfExists($file):void
{
    if (file_exists($file)) {
        include $file;
    }
}
$config = '../../config/';
$model = '/../Model/';

includeIfExists(__DIR__.'/../../../../../vendor/autoload.php');
includeIfExists(__DIR__.'/../../../../../autoload.php');
includeIfExists(__DIR__ . $model . 'Traits/Additional.php');
includeIfExists(__DIR__. $model . 'AbstractDirection.php');
includeIfExists(__DIR__. $model . 'Writer/Csv.php');
includeIfExists(__DIR__. $model . 'Export.php');
includeIfExists(__DIR__. $model . 'Log.php');
//$params =  include __DIR__ .'/../../../../../../app/etc/env.php';
$params = null;
$text = file_get_contents($config. 'config.json');
$platforms = json_decode($text, true);
$paramPlatofms = $platforms['platforms']['Magento2'];
if (isset($paramPlatofms) && !empty($paramPlatofms)) {
  $options = json_decode(file_get_contents($config . $paramPlatofms['file']), true);
  if ($options['path_config']) {
      $params =include __DIR__ .$options['path_config'];
  }
  if (isset($options['mysql'])) {

  }
}
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

