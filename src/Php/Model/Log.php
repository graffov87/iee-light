<?php
/**
 * @author   : Vitaliy Charnou <graffov87@gmail.com>
 */

declare(strict_types=1);

namespace Chervit\Iee;


class Log
{

    protected $beginTime;

    protected $endTime;

    public function writeln($text):void
    {
        echo $text ."\n";
    }

    public function setBeginTime()
    {
        $time = explode(" ", microtime());
        $startTime = $time[0] + $time[1];
        $this->beginTime = $time[0] + $time[1];
    }

    public function writelnTime() : void
    {
        $end = mktime();
        $time = explode(" ", microtime());
        $endTime = $time[0] + $time[1];
        $totalTime = $endTime - $this->beginTime;

        $this->writeln("Time: " . round($totalTime, 5) ." s");
    }
}