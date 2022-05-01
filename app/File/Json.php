<?php

namespace App\File;

use App\File;
use Exception;

class Json extends File
{
    /**
     * @param string $filePath
     */
    public function __construct(string $filePath)
    {
        $rawData = $this->getFileContents($filePath);

        parent::__construct(
            $rawData['data']['role_code'],
            $rawData['data']['level_code'],
            $rawData['data']['department_code']
        );
    }

    /**
     * @param string $filePath
     * @return array
     */
    public function getFileContents(string $filePath): array
    {
        $fileContents = json_decode(file_get_contents($filePath), true);

        if (!$fileContents) {
            throw new Exception('Invalid json file contents!');
        }

        return $fileContents;
    }
}
