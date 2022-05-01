<?php

require __DIR__.'/vendor/autoload.php';

use App\File;
use App\FileFactory;
use App\Util\ConsolePrinter;

$input = getopt('f:');

try {
    $file = FileFactory::getFile(trim($input['f']) ?? null);
}
catch (Exception $e) {
    ConsolePrinter::printError($e->getMessage());
}

if (isset($file) && $file instanceof File) {
    ConsolePrinter::printSuccess('View file: "' . $input['f'] . '"');
    ConsolePrinter::printJson($file->toArray());
}
