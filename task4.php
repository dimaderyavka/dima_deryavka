<?php
//Дан массив $arr. С помощью цикла foreach
// запишите английские названия в массив $en,
// а русские - в массив $ru.

$arr = ['green'=>'зеленый', 'red'=>'красный', 'blue'=>'голубой'];
foreach ($arr as $key => $elem){
    $en[] = $key;
    $ru[] = $elem;
}

/*foreach ($en as $elem){
    echo $elem.' ';
}
foreach ($ru as $elem){
    echo $elem.' ';
}*/





