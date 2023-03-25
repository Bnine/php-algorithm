<?php
/*
A non-empty array A consisting of N integers is given.

A permutation is a sequence containing each element from 1 to N once, and only once.

For example, array A such that:

    A[0] = 4
    A[1] = 1
    A[2] = 3
    A[3] = 2
is a permutation, but array A such that:

    A[0] = 4
    A[1] = 1
    A[2] = 3
is not a permutation, because value 2 is missing.

The goal is to check whether array A is a permutation.

Write a function:

function solution($A);

that, given an array A, returns 1 if array A is a permutation and 0 if it is not.

For example, given array A such that:

    A[0] = 4
    A[1] = 1
    A[2] = 3
    A[3] = 2
the function should return 1.

Given array A such that:

    A[0] = 4
    A[1] = 1
    A[2] = 3
the function should return 0.

Write an efficient algorithm for the following assumptions:

N is an integer within the range [1..100,000];
each element of array A is an integer within the range [1..1,000,000,000].
Copyright 2009–2023 by Codility Limited. All Rights Reserved. Unauthorized copying, publication or disclosure prohibited.
*/

function solution($A) {
    // Implement your solution here
    $arrCnt = count($A);
    if ($arrCnt < 1) {
        //echo "array didn't meet condition. passed".PHP_EOL; 
        return 0;
    }    

    if (min($A) != 1) {
        //echo "array didn't meet condition. passed(not started with 1)".PHP_EOL; 
        return 0;
    }

    sort($A);
    $checkingVal = $A[0];
    foreach ($A as $val) {
        if ($checkingVal !== $val) {
            //echo "found missing value. checkingVal -> ".$checkingVal." & val -> ".$val.PHP_EOL; 
            return 0;
        }
        $checkingVal++;
    }

    return 1;
}

var_dump(solution([3,2]));
?>