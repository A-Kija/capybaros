<?php
echo '<pre>';

$arr = ['racoon', 'rabit', 'fox'];

// dont do this!!!!!!!
$badArray = array('racoon', 'rabit', 'fox');

print_r($badArray);

// array yra primityvus tipo, todel nera nuorodos, o yra kopija

$arr2 = $arr;
$arr2[0] = 'dog';

array_push($arr, 'cat'); // lame
$arr[] = 'cat'; // cool
array_unshift($arr, 'mouse');

array_pop($arr2);
array_shift($arr2);


// $arr[19] = 'cow';

$arr['lauke'] = 'lape';
$arr[''] = 'lape2';
$arr[''] = 'lape3';

array_unshift($arr, 'Cool Cat');

$arr[] = 'Cool Cat'; // cool







$arr[true + true] = 'true';
$arr[false] = 'false';

$arr['01'] = '1 stringas';

$arr['8.7'] = '8.7 floatas';

$arr4 = array_values($arr);

// print_r($arr2);

// print_r($arr);
// print_r($arr4);

echo '<br>';

// echo count($arr);


foreach ($arr as $index => &$value) {
    // $arr[$index] = 'kate winslet';
    $value = 'kate winslet';
}

$A = 5;
$B = &$A;

$A++;

echo '<br>';

echo $A, ' ', $B;

echo '<br>';
// print_r($arr);

$colors = ['red', 'green', false, 'blue', 'yellow'];

foreach ($colors as &$color) {}

unset($color); // panaikinam nuoroda i paskutini elementa

foreach ($colors as $color) {}

echo '<br>';

print_r($colors);

echo '<br>';

echo current($colors);

echo '<br>';

// next($colors);
// echo current($colors) . '<br>';
// next($colors);
// echo current($colors) . '<br>';
// next($colors);
// echo current($colors) . '<br>';
// next($colors);
// echo current($colors) . '<br>';
// next($colors);
// echo current($colors) . '<br>';
// next($colors);
// var_dump(current($colors)) . '<br>';

do {
    echo current($colors) . '<br>';
} while (next($colors));




echo '<br>';


for ($i = 1; $i < 6; $i++) {
    echo "$i <br>";
}

foreach(range(1, 5) as $i) {
    echo "$i <br>";
}

