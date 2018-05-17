<?php

namespace Tests;

use Laravel\BrowserKitTesting\TestCase as BaseTestCase;

abstract class BrowserKitTestCase extends BaseTestCase
{
    use CreatesApplication;

    public $baseUrl = 'http://localhost';

    public function stringToxxxx($str)
    {
        $arrayStr = preg_split('//u', $str, -1, PREG_SPLIT_NO_EMPTY);
        $arrayResult = array_map(function ($T) {
            // http://help.i2yes.com/?q=node%2F186
            return '&#' . base_convert(bin2hex(iconv('utf-8', 'ucs-4', $T)), 16, 10) . ';';
        }, $arrayStr);

        return implode($arrayResult);
    }
}
