<?php

//二分查找
function twoFind($array, $target)
{
   if(empty($array)){
       return false;
   }

   $length = count($array);
   $left = 0;
   $right = $length - 1;

   while ($left <= $right){
       $middle = ceil($left + $right) / 2;

       if($array[$middle] == $target){
           return $middle;
       }

       if($array[$middle] > $target){
           $right = $middle - 1;
       }

       if($array[$middle] < $target){
           $left = $middle + 1;
       }
   }

    return false;
}

$array = [10, 3, 5, 2, 1, 10, 19, 70, 60, 24, 90];

//echo twoFind($array, 900);

//快排
function quickSort($array)
{
    if(count($array) < 2){
        return $array;
    }

    $target = array_shift($array);
    $leftArray = $rightArray = [];

    foreach ($array as $item){
        if($item <= $target){
            $leftArray[] = $item;
        }

        if($item > $target){
            $rightArray[] = $item;
        }
    }

    $leftArray = quickSort($leftArray);
    $rightArray = quickSort($rightArray);

    return array_merge($leftArray, [$target], $rightArray);
}

//print_r(quickSort($array));

print_r($array);
echo "<br/>";
print_r(maopao($array));

//冒泡
function maopao($array){

    for($i=1;$i < count($array); $i++){
        for($j=0; $j < count($array) - $i; $j++){
            if($array[$j] > $array[$j+1]){
                $array = swap($array, $j, $j+1);
            }
        }

        print_r($array);
        echo "<br/>";
    }

    return $array;
}

function swap($array, $a, $b){
    $temp = $array[$a];
    $array[$a] = $array[$b];
    $array[$b] = $temp;
    return $array;
}

?>