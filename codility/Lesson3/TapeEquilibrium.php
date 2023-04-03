<?php
/**
 * Lesson 3-3 : TapeEquilibrium
 * 
 * @Total score: 100%
 * 
 * Task: 100%
 * Correctness: 100%
 * Performance: 100%
 * 
 * @Detected time complexity: O(N)
 * @Link: https://app.codility.com/demo/results/trainingQURTM3-5HU/
 */
function solution($A) {
    $arrCnt = count($A);
    $tapeArr = array();
    $previousVal = 0;
    $remainingVal = array_sum($A);
    
    for ($i = 0;$i < $arrCnt-1;$i++) {
        $previousVal += $A[$i];
        $remainingVal -= $A[$i];

        $tapeArr[] = abs($previousVal - $remainingVal);
    }

    return min($tapeArr);
}

var_dump(solution([3,1,2,4,3]));
?>