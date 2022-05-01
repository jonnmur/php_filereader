<?php

namespace App;

use App\File\Csv;
use App\File\Json;
use App\File\Xml;
use Exception;

class FileFactory
{
    /**
     * @param string $filePath
     * @return App\File
     */
    public static function getFile(string $filePath = null): File
    {
        if (empty($filePath) || !file_exists($filePath)) {
            throw new Exception('Invalid filepath!');
        }

        $ext = pathinfo($filePath, PATHINFO_EXTENSION);
        
        if (!in_array($ext, ['xml', 'json', 'csv'])) {
            throw new Exception('Invalid filetype!');
        }

        if ($ext === 'xml') {
            $file = new Xml($filePath);
        }
        
        else if ($ext === 'json') {
            $file = new Json($filePath);
        }
        
        else if ($ext === 'csv') {
            $file = new Csv($filePath);
        }

        return $file;
    }
}
