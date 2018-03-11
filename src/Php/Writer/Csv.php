<?php
/**
 * @author   : Vitaliy Charnou <graffov87@gmail.com>
 */

declare(strict_types=1);

namespace Chervit\Iee\Writer;

class Csv
{
    const EXTENSIONS = 'csv';

    protected $file;

    public function setFile($file) :void
    {
        $this->file = $file;
    }

    public function getFile(): string
    {
        return $this->file;
    }

    public function setHeaders(array $headers)
    {
        $fp = fopen($this->file, 'w');
        fputcsv($fp, $headers);
        fclose($fp);
    }

    public function setInFile(array $item)
    {
        $fp = fopen($this->file, 'a+');
        fputcsv($fp, $item);
        fclose($fp);
    }
}