<?php
declare(strict_types = 1);
echo '<pre>';

function noReturn() :void {
    echo 'I have no return value.<br>';
}

$noReturnValue = noReturn();
var_dump($noReturnValue);

function returnInt() :int|string {
    return 1;
}

echo '<br>';

$returnIntValue = returnInt();
var_dump($returnIntValue);


$canIseeIt = 'Yes, you can see me!';

function tryToSeeMe() {
 
    // Per nagus už global naudojimą!
    global $canIseeIt, $imInFunction;

    $imInFunction = 'I am in function, you can not see me!';
    return $canIseeIt;
}

echo '<br>';

$tryToSeeMeValue = tryToSeeMe();
var_dump($tryToSeeMeValue);
var_dump($imInFunction);


function sum(int $a, int $b) :int {
    return $a;
}

echo '<br>';
$sumResult = sum(-8, 5, 7);

var_dump($sumResult);


function sumAll($a, ...$numbers) :int {
    $sum = 0;
    foreach ($numbers as $number) {
        $sum += $number;
    }
    return $sum;
}

echo '<br>';
$sumAllResult = sumAll(1, 2, 3, 4, 7, 8, 9, 10);
$myDigits = [7, 7, 7];

var_dump($sumAllResult);
var_dump(sumAll(...$myDigits));


function withStatic() {
    static $static = 0; // only once
    $static++;
    echo $static . '<br>';
}

withStatic();
withStatic();
withStatic();
withStatic();

echo '<br><br><br>';

function withRecursive($a) {
    if ($a <= 3) {
        echo 'IN:' . $a . '<br>';
        withRecursive($a + 1);
    }
    echo 'OUT:' . $a . '<br>';
}

withRecursive(1);




