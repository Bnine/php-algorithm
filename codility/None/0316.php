<?php
/*
that, given an array A of N integers, returns the smallest positive integer (greater than 0) that does not occur in A.

For example, given A = [1, 3, 6, 4, 1, 2], the function should return 5.

Given A = [1, 2, 3], the function should return 4.

Given A = [−1, −3], the function should return 1.

Write an efficient algorithm for the following assumptions:

N is an integer within the range [1..100,000];
each element of array A is an integer within the range [−1,000,000..1,000,000].
*/
/*
function solution($A) {
    if (max($A) <= 0) {
        return 1;
    } 

    $unique_arr = array_unique($A);
    sort($unique_arr);
    var_dump($unique_arr);
    $cnt = count($unique_arr);
    for ($i = 0, $k = 1; $i < $cnt; $i++, $k++) {  
        if ($k == $cnt) {
            return $unique_arr[$i] + 1;
        } else {
            if (($unique_arr[$k] - $unique_arr[$i]) > 1) {
                return $unique_arr[$i] + 1;
            } 
        }
    }
}
*/
/*
function solution($A) {
    if (max($A) <= 0) {
        return 1;
    } 

    sort($A);
    var_dump($A);
    $cnt = count($A);
    for ($i = 0, $k = 1; $i < $cnt; $i++, $k++) {  
        echo "No.".$k.PHP_EOL;

        if ($A[$i] <= 0) {
            echo "under 0! pass loop!".PHP_EOL;
            continue;
        }

        if ($A[$k] == $A[$i]) {
            echo "same value! pass loop!".PHP_EOL;
            continue;
        }

        if ($k == $cnt) {
            return $A[$i] + 1;
        } else {
            if (($A[$k] - $A[$i]) > 1) {
                echo "over 1!! current -> ".$A[$i]." next -> ".$A[$k].PHP_EOL;
                return $A[$i] + 1;
            } 
        }
    }
}
*/
/*
function solution($A) {
    if (max($A) <= 0) {
        return 1;
    } 

    $unique_arr = array_unique($A);
    sort($unique_arr);
    $cnt = count($unique_arr);

    if ($cnt == 1) {
        return $unique_arr[0] + 1;
    }

    for ($i = 0, $k = 1; $i < $cnt; $i++, $k++) {  
        echo "No.".$k." & array value -> ".$unique_arr[$i].PHP_EOL;        
        if ($k == $cnt) {
            if (($unique_arr[$i] - $unique_arr[$i-1]) > 1) {
                if ($unique_arr[$i-1] <= 0 && $unique_arr[$i] > 1) {
                    return 1;
                }

                if ($unique_arr[$i] == 1) {
                    return 2;
                }

                return $unique_arr[$i-1] + 1;
            }
            return $unique_arr[$i] + 1;
        } else {
            if ($unique_arr[$i] < 0) {
                echo "under 0! pass loop!".PHP_EOL;
                continue;
            }
            if (($unique_arr[$k] - $unique_arr[$i]) > 1) {
                echo "over 1!! current -> ".$unique_arr[$i]." next -> ".$unique_arr[$k].PHP_EOL;
                if ($unique_arr[$i] <= 0) {
                    echo "before value is less then 0 -> ".$unique_arr[$i]." return zero!".PHP_EOL;
                    return 1;
                }
                return $unique_arr[$i] + 1;
            } 
        }
    }
}
*/
function solution($A) {
    if (max($A) <= 0) {
        return 1;
    } 

    $unique_arr = array_unique($A);
    $unique_arr = array_filter($unique_arr, function ($v) {
        return $v > 0;
    });
    $cnt = count($unique_arr);
    sort($unique_arr);
    if ($cnt == 1) {
        if ($unique_arr[0] == 1) {
            return 2;
        } else {
            return 1;
        }
    }

    for ($i = 0, $k = 1; $i < $cnt; $i++) {  
        if ($unique_arr[$i] == $k) {
            $k++;
        } else {
            return $k;
        }
    }

    return $k;
}
var_dump(solution([1,3,6,4,1,2]));
var_dump(solution([1,2,3]));
var_dump(solution([-1, -2]));
//var_dump(solution([1,2,5]));
//var_dump(solution([-10000, -2, -1, 0, 2, 5]));
//var_dump(solution([0, 4]));
//var_dump(solution([1, 4]));
//var_dump(solution([3, 4, 9]));
//var_dump(solution([-10000,0,1]));
//var_dump(solution([-1000000, -1, 3, 9,-1,-2,-3]));
//var_dump(solution([-5000000, 7, 1000000]));
//var_dump(solution([0,20,0,20]));
//var_dump(solution([-1000000, -1, 0,1,-1,-2,-3]));
?>