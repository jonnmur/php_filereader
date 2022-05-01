<?php

namespace App\File;

use App\File;
use Exception;

libxml_use_internal_errors(true);

class Xml extends File
{
    /**
     * @param string $filePath
     */
    public function __construct(string $filePath)
    {
        $rawData = $this->getFileContents($filePath);

        parent::__construct(
            $rawData['role'],
            $rawData['level'],
            $rawData['department']
        );
    }

    /**
     * @param string $filePath
     * @return array
     */
    public function getFileContents(string $filePath): array
    {
        $fileContents = simplexml_load_file($filePath);
        
        if (!$fileContents) {
            throw new Exception('Invalid xml file contents!');
        }

        return (array)$fileContents;
    }
}
