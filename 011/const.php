<?php

define('MY_CONST', 'My constant value');

define('small', 'small value'); // not recommended

define('MY_ARRAY', [
    'key' => 'value',
    'key2' => 'value2',
]);


echo MY_CONST;
echo '<br>';
echo small;
echo '<br>';
echo MY_ARRAY['key'];

echo '<br><br><br>';

function myFunction() {
    echo MY_CONST;
    echo '<br>';
    echo small;
    echo '<br>';
    echo MY_ARRAY['key'];
}

myFunction();


// php predefined constants
echo '<br><br><br>';

echo PHP_INT_MIN;

echo '<br><br><br>';

echo __DIR__ . '/test1.txt';

file_put_contents(__DIR__ . '/test1.txt', 'test1'); // absolute path
file_put_contents('test2.txt', 'test2'); // relative path

// always use absolute path !!!