<?php

use App\Models\Category;

function toCollect(array $array)
{
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $value = toCollect(json_decode(json_encode($value),true));
            $array[$key] = $value;
        }
    }

    return collect($array);
}

function sql_with_bindings($query)
{
    return vsprintf(str_replace('?', '%s', $query->toSql()), collect($query->getBindings())->map(function ($binding) {
        return is_numeric($binding) ? $binding : "'{$binding}'";
    })->toArray());
}
function slug($string)
{

    $t = $string;

    $specChars = array(
        ' ' => '-',    '!' => '',    '"' => '',
        '#' => '',    '$' => '',    '%' => '',
        '&' => '',    '\'' => '',   '(' => '',
        ')' => '',    '*' => '',    '+' => '',
        ',' => '',    '₹' => '',    '.' => '-',
        '/-' => '',    ':' => '',    ';' => '',
        '<' => '',    '=' => '',    '>' => '',
        '?' => '',    '@' => '',    '[' => '',
        '\\' => '',   ']' => '',    '^' => '',
        '_' => '',    '`' => '',    '{' => '',
        '|' => '',    '}' => '',    '~' => '',
        '-----' => '-',    '----' => '-',    '---' => '-',
        '/' => '',    '--' => '-',   '/_' => '-',

    );

    foreach ($specChars as $k => $v) {
        $t = str_replace($k, $v, $t);
    }
    return strtolower($t);
}
