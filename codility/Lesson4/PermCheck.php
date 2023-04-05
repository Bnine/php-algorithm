<?php
/**
 * Lesson 4-2 : PermCheck
 * 
 * @Total score: 100%
 * 
 * Task: 100%
 * Correctness: 100%
 * Performance: 100%
 * 
 * @Detected time complexity: O(N) or O(N * log(N))
 * @Link: https://app.codility.com/demo/results/training5B8HM6-FW5/
 */
function solution($A) {
    if (min($A) !== 1) {
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