<?php
/**
 * Lesson 5-2 : CountDiv
 * 
 * @Total score: 100%
 * 
 * Task: 100%
 * Correctness: 100%
 * Performance: 100%
 * 
 * @Detected time complexity: O(1)
 * @Link: https://app.codility.com/demo/results/training6YURKU-6JA/
 */
function solution($A, $B, $K) {
    if ($B < $A) {
        return 0;
    }
    
    //available mod between $B and $A
    $betweenVal = (int)floor($B/$K) - (int)floor($A/$K);
    //echo "betweenVal -> ".$betweenVal.PHP_EOL; 

    if ($A % $K === 0) {
        $betweenVal++;
    }

    return $betweenVal;
    /*
    //why? { i : A ≤ i ≤ B,
    if (($B - $A) < $K) {
        return 0;
    }
    */
    /*
    //Performance is low
    //task 50
    //Correctness 100
    //Performance 0
    $divCount = 0;
    for ($i=$A;$i<=$B;$i++) {
        if (($i % $K) === 0) {
            $divCount++;
        }
    }
    */
}

var_dump(solution(6,11,2));
/*
Write a function:

function solution($A, $B, $K);

that, given three integers A, B and K, returns the number of integers within the range [A..B] that are divisible by K, i.e.:

{ i : A ≤ i ≤ B, i mod K = 0 }

For example, for A = 6, B = 11 and K = 2, your function should return 3, because there are three numbers divisible by 2 within the range [6..11], namely 6, 8 and 10.

Write an efficient algorithm for the following assumptions:

A and B are integers within the range [0..2,000,000,000];
K is an integer within the range [1..2,000,000,000];
A ≤ B.
Copyright 2009–2023 by Codility Limited. All Rights Reserved. Unauthorized copying, publication or disclosure prohibited.
*/
?>