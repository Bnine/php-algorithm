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
 * @Link: https://app.codility.com/demo/results/trainingMDUVP9-HAA/
 */
function solution($A, $B, $K) {
    if ($B < $A) {
        return 0;
    }
    
    //available mod between $B and $A
    $betweenVal = (int)floor($B/$K) - (int)floor($A/$K);

    if ($A % $K === 0) {
        $betweenVal++;
    }

    return $betweenVal;
}

/**
 * Lesson 5-2 : CountDiv
 * 
 * @Total score: 50%
 * 
 * Task: 50%
 * Correctness: 100%
 * Performance: 0%
 * 
 * @Detected time complexity: O(B-A)
 * @Link: https://app.codility.com/demo/results/trainingG4KX6H-BWX/
 */
/*
function solution($A, $B, $K) {
    if ($B < $A) {
        return 0;
    }
    
    $divCount = 0;
    for ($i=$A;$i<=$B;$i++) {
        if (($i % $K) === 0) {
            $divCount++;
        }
    }

    return $divCount;
}
*/
var_dump(solution(6,11,2));
?>