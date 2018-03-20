<?php

/**
 * @author   : Vitaliy Charnou <graffov87@gmail.com>
 */

declare(strict_types=1);

namespace Chervit\Iee;

use Zend_Db_Adapter_Pdo_Mysql as Mysql;

class Export extends AbstractDirection
{
    public function getData() : array
    {
        $select = $this->conection->select();
        $select->from('catalog_product_entity')
            ->where('updated_at >= ?','1970-01-01 00:00:00');
        $result = $this->conection->fetchAll($select);

        return $result;
    }
}