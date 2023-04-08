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
 * @Link: https://app.codility.com/demo/results/trainingWWR5NM-2A7/
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
    if ($arrCnt === 1 && $uniqueArr[0] === 1) {
        return 2;
    }

    $smallestNo = 1;
    for ($i=1;$i<$arrCnt;$i++) {
        if (($uniqueArr[$i] - $uniqueArr[$i-1]) > 1) {
            return $smallestNo+1;
        }

        $smallestNo++;
    }

    return $smallestNo+1;
}

var_dump(solution([1, 3, 6, 4, 1, 2]));
var_dump(solution([1, 3, 6, 4, 1, 2, 5]));
var_dump(solution([2,3]));
var_dump(solution([-1, -3, 6, 4, 1, 2, 5]));
?>