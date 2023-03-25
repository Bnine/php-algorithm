<?php
/**
 * Lesson 4-4 : MissingInteger
 * 
 * @Total score: 100%
 * 
 * Task: 100%
 * Correctness: 100%
 * Performance: 100%
 * 
 * @Detected time complexity: O(N) or O(N * log(N))
 * @Link: https://app.codility.com/demo/results/trainingTZGWX5-NMX/
 */
function solution($A) {
    if (max($A) <= 0) {
        return 1;
    }

    $uniqueArr = array_unique($A);
    $uniqueArr = array_filter($uniqueArr, function ($v) {
        return $v > 0;
    });

    if (min($uniqueArr) > 1) {
        return 1;
    }

    sort($uniqueArr);
    $arrCnt = count($uniqueArr);
    if ($arrCnt == 1) {
        if ($uniqueArr[0] == 1) {
            return 2;
        } else {
            return 1;
        }
    }

    $smallestNo = 1;
    foreach ($uniqueArr as $key => $val) {
        //echo "key -> ".$key." & val -> ".$val.PHP_EOL; 

        if ($arrCnt === ($key + 1)) {
            //echo "Reached to Max!".PHP_EOL;
            return $smallestNo+1;
        }

        if (($uniqueArr[$key + 1] - $uniqueArr[$key]) > 1) {
            return $smallestNo+1;
        }

        $smallestNo++;
    }

    return $smallestNo;
}

var_dump(solution([1, 3, 6, 4, 1, 2]));
var_dump(solution([1, 3, 6, 4, 1, 2, 5]));
var_dump(solution([2,3]));
var_dump(solution([-1, -3, 6, 4, 1, 2, 5]));
/*
This is a demo task.

Write a function:

function solution($A);

that, given an array A of N integers, returns the smallest positive integer (greater than 0) that does not occur in A.

For example, given A = [1, 3, 6, 4, 1, 2], the function should return 5.

Given A = [1, 2, 3], the function should return 4.

Given A = [−1, −3], the function should return 1.

Write an efficient algorithm for the following assumptions:

N is an integer within the range [1..100,000];
each element of array A is an integer within the range [−1,000,000..1,000,000].
Copyright 2009–2023 by Codility Limited. All Rights Reserved. Unauthorized copying, publication or disclosure prohibited.
*/
?>