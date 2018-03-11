<?php

/**
 * @author   : Vitaliy Charnou <graffov87@gmail.com>
 */

declare(strict_types=1);

namespace Chervit\Iee;

abstract class AbstractDirection
{
    use \Chervit\Iee\Traits\Additional;

    protected $connection;

    protected $log;

    public function __construct(
        array $params,
        \Chervit\Iee\Log $log
    ) {
        $config = [];
        $db = $params['db']['connection']['default'];
        $this->conection = new \Zend_Db_Adapter_Pdo_Mysql($db);
        $this->log = $log;
    }

    abstract public function getData();
}