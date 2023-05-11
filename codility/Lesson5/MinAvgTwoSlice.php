<?php
/**
 * Lesson 5-4 : MinAvgTwoSlice
 * 
 * @Total score: 100%
 * 
 * Task: 100%
 * Correctness: 100%
 * Performance: 100%
 * 
 * @Detected time complexity: O(N)
 * @Link: https://app.codility.com/demo/results/training6WYBD9-65P/
 */
function solution($A) {
    $arrCnt = count($A);
    $minPval = 0;
    $smallestVal = ($A[0] + $A[1]) / 2; 
    for ($i=2;$i<$arrCnt;$i++) {
        $avg = (float)(($A[$i-2] + $A[$i-1] + $A[$i]) / 3);
        if ($avg < $smallestVal) {
            $smallestVal = $avg;
            $minPval = $i-2;
        }

        $avg = (float)(($A[$i-1] + $A[$i]) / 2);
        if ($avg < $smallestVal) {
            $smallestVal = $avg;
            $minPval = $i-1;
        }
    }

    return $minPval;
}

var_dump(solution([4,2,2,5,1,5,8]));
?>