<?php

$jonas = rand(5, 25);
$petras = rand(10, 20);

echo "Jonas: $jonas Petras: $petras <br>";

if ($jonas > $petras) {
    echo 'Laimejo Jonas';
} elseif ($jonas < $petras) {
    echo 'Laimejo Petras';
} else {
    echo 'Lygiosios';
}

echo '<br>';

$vienas = 12;

$rezultatas = 1 == $vienas ? '1' : (2 == $vienas ? '2' : 'DoNotKnow');

echo $rezultatas;

echo '<br>';

$kas = null;

var_dump(isset($kas));

echo '<br>';

var_dump($kas2 ?? 8 === null);

echo '<br>';

// for ($k = 1; $k <= 15; $k++) {

//     echo "didelis: $k<br>";

//     for ($i = 1; $i <= 15; $i++) {
//         if (rand(0, 10) > 9){
//             continue 2; // break 1;
//         }
//         echo "mažas: $i<br>";
//     }
//     echo 'Ciklo pabaiga<br>';
// }

echo '<br>';

for ($k = 1; $k <= 7; $k++) {

    switch($k) {
        case 1:
            echo 'Vienas<br>';
        case 2:
            echo 'Du<br>';
        case 3:
            echo 'Trys<br>';
            break 2;
        case 4:
            echo 'Keturi<br>';
        case 5:
            echo 'Penki<br>';
        default:
            echo 'Nera<br>';
    }
}

echo '<br>';

$k = 3;

$skaicius = match(true) {
    $k == 2 => 'Du',
    $k == 3 => 'Trys',
    $k > 5 && $k < 10 => 'Daugiau nei penki, bet iki 10',
    $k > 10 => 'Daugiau nei 10',
    default => 'mažiau nei 5',
};
echo $skaicius;



