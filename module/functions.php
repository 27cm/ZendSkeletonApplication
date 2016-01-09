<?php

if (!function_exists('mb_ucfirst')) {
    /**
     * Преобразует первый символ строки в верхний регистр.
     *
     * @link http://php.net/manual/en/function.ucfirst.php
     *
     * @param string $str
     * @param string $encoding [optional]
     *
     * @return string
     */
    function mb_ucfirst($str, $encoding = null)
    {
        $first = mb_strtoupper(mb_substr($str, 0, 1, $encoding), $encoding);
        return $first . mb_substr($str, 1, null, $encoding);
    }
}
