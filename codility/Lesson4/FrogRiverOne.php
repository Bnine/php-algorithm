<?php
/**
 * Lesson 4-1 : FrogRiverOne
 * 
 * @Total score: 100%
 * 
 * Task: 100%
 * Correctness: 100%
 * Performance: 100%
 * 
 * @Detected time complexity: O(N)
 * @Link: https://app.codility.com/demo/results/trainingNU8ZRW-3YN/
 */
function solution($X, $A) {
    $currentPosition = 0;
    $currentArr = array();
    foreach ($A as $key=>$val) {
        //echo "key -> ".$key." & val -> ".$val.PHP_EOL; 
        if (!array_key_exists($val, $currentArr)) {
            $currentArr[$val] = 0;
            $currentPosition++;
        }

        if ($currentPosition === $X) {
            //echo "frog can cross the river! key -> ".$key.PHP_EOL; 
            return $key;
        }
    }

    return -1;
}

var_dump(solution(5, [1,3,1,4,2,3,5,4]));
var_dump(solution(2, [2, 2, 2, 2, 2]));
var_dump(solution(5, [3]))
?>