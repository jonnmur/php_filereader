<?php

namespace App\Util;

class ConsolePrinter
{
    /**
     * @param string|array $input
     */
    public static function printError($input)
    {
        echo "\e[0;30;41m" . $input . "\e[0m\n";
    }

    /**
     * @param string|array $input
     */
    public static function printSuccess($input)
    {
        echo "\e[0;30;42m" . $input . "\e[0m\n";
    }

    /**
     * @param string|array $input
     */
    public static function printJson($input)
    {
        echo json_encode($input, JSON_PRETTY_PRINT);
    }
}
