<?php
/**
 * Lesson 3-2 : PermMissingElem
 * 
 * @Total score: 100%
 * 
 * Task: 100%
 * Correctness: 100%
 * Performance: 100%
 * 
 * @Detected time complexity: O(N) or O(N * log(N))
 * @Link: https://app.codility.com/demo/results/trainingVJEUHR-JZB/
 */
function solution($A) {
    //when　array A is empty.
    if (count($A) === 0) {
        return 1;
    }

    //when array A has only 1 element.
    if (count($A) === 1) {
        if ($A[0] <= 1) {
            //if N is 0, return 1
            //if N is 1, return 2
            return $A[0] + 1;
        } else {
            return $A[0] - 1;
        }
    }

    sort($A);
    $previousVal = 0;
    foreach ($A as $val) {
        //if current array A's value is more than (N + 1)
        if (($val - 1) > $previousVal) {
            //echo "more than 1 val -> ".$val." & previousVal -> ".$previousVal.PHP_EOL; 
            return $val-1;
        } else {
            $previousVal++;
        }
    }

    return $previousVal+1;
}

var_dump(solution([2,3,1,5]));
?>