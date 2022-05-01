<?php

namespace App\File;

use App\File;
use Exception;

class Csv extends File
{
    /**
     * @param string $filePath
     */
    public function __construct(string $filePath)
    {
        $rawData = $this->getFileContents($filePath);

        parent::__construct(
            $rawData['roleCode'],
            $rawData['levelCode'],
            $rawData['departmentCode']
        );
    }

    /**
     * @param string $filePath
     * @return array
     */
    public function getFileContents(string $filePath): array
    {
        $fileContents = file($filePath);

        $rawDataUnsorted = array_map('str_getcsv', $fileContents);

        if (!empty($rawDataUnsorted[0][0]) && !empty($rawDataUnsorted[1][0])) {
            $keys = str_replace('"', '', explode(';', $rawDataUnsorted[0][0]));
            $values = str_replace('"', '', explode(';', $rawDataUnsorted[1][0]));
        }

        if (empty($keys) || empty($values) || array_diff($keys, ['roleCode', 'levelCode', 'departmentCode'])) {
            throw new Exception('Invalid csv file contents!');
        }

        return array_combine($keys, $values);
    }
}
