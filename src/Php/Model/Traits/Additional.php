<?php
/**
 * @author   : Vitaliy Charnou <graffov87@gmail.com>
 */

declare(strict_types=1);

namespace Chervit\Iee\Traits;

trait Additional
{

    public function getCollection(array $array) {
        for($i=0; $i < count($array); $i++ ) {
            yield $array[$i];
        }
    }

}