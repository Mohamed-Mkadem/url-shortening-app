<?php

/**
 * Summary of dd
 * @param mixed $var
 * @return never
 */
function dd($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    die();
}
/**
 * Summary of asset
 * @param mixed $path
 * @param mixed $levels
 * @return string
 */
function asset($path, $levels)
{
    $prefix = '';
    for ($i = 0; $i < $levels; $i++) {
        $prefix .= '../';
    }
    return "{$prefix}{$path}";
}