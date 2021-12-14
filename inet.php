<?php

// https://github.com/inetstudio/php-interview

function prePrint($var)
{
    echo '<pre>';
    print_r($var);
    echo '</pre>';
}

// Для всех заданий с массивами задан многомерный массив, элементы которого могут содержать одинаковые id:

$array = [
    ['id' => 1, 'date' => "12.01.2020", 'name' => "test1"],
    ['id' => 5, 'date' => "01.06.2020", 'name' => "test3"],
    ['id' => 2, 'date' => "02.05.2020", 'name' => "test2"],
    ['id' => 40, 'date' => "08.03.2020", 'name' => "test4"],
    ['id' => 40, 'date' => "05.03.2020", 'name' => "test4"],
    ['id' => 23, 'date' => "11.11.2020", 'name' => "test4"],
    ['id' => 5, 'date' => "06.06.2020", 'name' => "test3"],
    ['id' => 5, 'date' => "06.06.2020", 'name' => "test3"],
    ['id' => 23, 'date' => "11.11.2020", 'name' => "test4"],
    ['id' => 24, 'date' => "11.11.2020", 'name' => "test4"],
    ['id' => 24, 'date' => "11.11.2020", 'name' => "test4"],
];

// Все решения постараться реализовать НЕ используя циклы for / foreach.
// -----------------------------------------------------------------------
// 1. Выделить уникальные записи (убрать дубли) в отдельный массив. в конечном массиве не должно быть элементов с одинаковым id.

// Решение:

function arrayUniqueKey($array, $key) {
    $ar = [];
    $array_keys = [];
    $count = 0;

    foreach($array as $item) {
        if (!in_array($item[$key], $array_keys)) {
            $array_keys[$count] = $item[$key];
            $ar[$count] = $item;
            $count++;
        }

    }
    return $ar;
}

$array_unique = arrayUniqueKey($array, 'id');
prePrint($array_unique);

// -----------------------------------------------------------------------
// 2. Отсортировать многомерный массив по ключу (любому)
// Решение:

$array = [
    ['id' => 1, 'date' => "12.01.2020", 'name' => "test1"],
    ['id' => 2, 'date' => "02.05.2020", 'name' => "test2"],
    ['id' => 40, 'date' => "08.03.2020", 'name' => "test4"],
    ['id' => 23, 'date' => "11.11.2020", 'name' => "test4"],
    ['id' => 5, 'date' => "06.06.2020", 'name' => "test3"],
];

function compare($key)
{
    return function ($a, $b) use ($key) {
        return strnatcmp($a[$key], $b[$key]);
    };
}

usort($array, compare('id'));
prePrint($array);

// -----------------------------------------------------------------------
// 3. Вернуть из массива только элементы, удовлетворяющие внешним условиям (например элементы с определенным id)
// Решение:

$ar_filtered = array_filter($array, function ($item) {
    if ($item['id'] === 23) {
        return true;
    }
});

prePrint($ar_filtered);

// -----------------------------------------------------------------------
// 4. Изменить в массиве значения и ключи (использовать name => id в качестве пары ключ => значение)

// Решение:

function arMap($ar, $key)
{
    return array_map(function ($item) use ($key) {
        return $item[$key];
    }, $ar);
}

$ar_combined = array_combine(arMap($array, 'name'), arMap($array, 'id'));

prePrint($ar_combined);

