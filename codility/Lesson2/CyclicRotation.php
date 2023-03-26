<?php
/**
 * Lesson 2-1 : CyclicRotation
 * 
 * @Total score: 100%
 * 
 * Task: 100%
 * Correctness: 100%
 * Performance: Not assessed
 * 
 * @Detected time complexity: Not assessed
 * @Link: https://app.codility.com/demo/results/trainingX5PGX9-448/
 */
function solution($A, $K) {
    //Is array created with same values?
    if (count(array_unique($A)) === 1) {
        return $A;
    }

    //Are array size and $K value same?
    $cntArr = count($A);
    if ($cntArr === $K) {
        return $A;
    }

    //When $K is less than $A array size
    if ($cntArr > $K) {
        $rotatedNumber = array_slice($A, -$K, $K);
        //var_dump($rotatedNumber);
        $remainNumber = array_slice($A, 0, $cntArr - $K);
        //var_dump($remainNumber);
        return array_merge($rotatedNumber,$remainNumber);
    } else {
        $mergedArr = $A;
        for ($i = 0; $i < $K; $i++) {
            $rotatedNumber = array_slice($mergedArr, -1, 1);
            $remainNumber = array_slice($mergedArr, 0, $cntArr - 1);

            $mergedArr = array_merge($rotatedNumber, $remainNumber);
        }

        return $mergedArr;
    }
}

//var_dump(solution([1, 1, 2, 3, 5],6));
var_dump(solution([3,8,9,7,6],3));
?>