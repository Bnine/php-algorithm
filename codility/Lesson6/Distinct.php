<?php
/**
 * Lesson 6-1 : Distinct
 * 
 * @Total score: 100%
 * 
 * Task: 100%
 * Correctness: 100%
 * Performance: 100%
 * 
 * @Detected time complexity: O(N*log(N)) or O(N)
 * @Link: https://app.codility.com/demo/results/trainingQQFFZ6-FEJ/
 */
function solution($A) {
    //할말 없음 
    //Pass
    if (count($A) === 0) {
        //echo "array is zero -> ".count($A).PHP_EOL;
        return 0;
    }

    return count(array_unique($A));
}

var_dump(solution([2,1,1,2,3,1]));
/*
Write a function

function solution($A);

that, given an array A consisting of N integers, returns the number of distinct values in array A.

For example, given array A consisting of six elements such that:

 A[0] = 2    A[1] = 1    A[2] = 1
 A[3] = 2    A[4] = 3    A[5] = 1
the function should return 3, because there are 3 distinct values appearing in array A, namely 1, 2 and 3.

Write an efficient algorithm for the following assumptions:

N is an integer within the range [0..100,000];
each element of array A is an integer within the range [−1,000,000..1,000,000].
Copyright 2009–2023 by Codility Limited. All Rights Reserved. Unauthorized copying, publication or disclosure prohibited.
*/
?>