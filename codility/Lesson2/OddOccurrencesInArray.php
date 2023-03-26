<?php
/**
 * Lesson 2-2 : OddOccurrencesInArray
 * 
 * @Total score: 100%
 * 
 * Task: 100%
 * Correctness: 100%
 * Performance: 100%
 * 
 * @Detected time complexity: O(N) or O(N*log(N))
 * @Link: https://app.codility.com/demo/results/trainingXCQZAH-RQN/
 */
function solution($A) {
    //This is Second Code.
    $valArr = array();
    foreach ($A as $val) {
        if (isset($valArr[$val])) {
            //echo "key is exist! key -> ".$val.PHP_EOL;
            unset($valArr[$val]);
        } else {
            //echo "key is not exist! key -> ".$val.PHP_EOL;
            $valArr[$val] = 1;
        }
    }

    return array_key_first($valArr);

    /*
    //This is First Code.
    //https://app.codility.com/demo/results/training4GY3VT-4CF/
    $valArr = array();
    foreach ($A as $val) {
        if (array_key_exists($val, $valArr)) {
            //echo "key is exist! key -> ".$val.PHP_EOL;
            $valArr[$val]++;
        } else {
            //echo "key is not exist! key -> ".$val.PHP_EOL;
            $valArr[$val] = 1;
        }
    }

    //Remove paired data in $valArr
    $valArr = array_filter($valArr, function ($v) {
        return ($v % 2) != 0;
    });

    return array_key_first($valArr);
    */
}

//var_dump(solution([9,3,9,3,9,7,9]));
var_dump(solution([42]));
?>