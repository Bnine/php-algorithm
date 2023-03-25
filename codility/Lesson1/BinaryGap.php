<?php
/**
 * Lesson 1-1 : BinaryGap
 * 
 * @Total score: 100%
 * 
 * Task: 100%
 * Correctness: 100%
 * Performance: Not assessed
 * 
 * @Detected time complexity: Not assessed
 * @Link: https://app.codility.com/demo/results/training4M9NVX-946/
 */
function solution($N) {
    //Change Integer to Binary by PHP API.
    $nVal = decbin($N);
    //var_dump($nVal);

    //Delete 0 value at Start and Back
    $nVal=trim($nVal, "0");
    //var_dump($nVal);

    //Create array with explode() PHP API.
    $nValArr = explode(1, $nVal);
    //var_dump($nValArr);

    $zeroCnt = 0;
    foreach($nValArr as $key => $val) {
        //echo "nValArr key -> ".$key." val -> ".$val.PHP_EOL;
        //Checking Condition.
        //1.Is val more than zeroCnt?
        if ($zeroCnt <= strlen($val)) {
            //echo "update zero counting! zeroCnt ->".$zeroCnt." value length -> ".strlen($val).PHP_EOL;
            $zeroCnt = strlen($val);
        }
    }

    return $zeroCnt;
}

var_dump(solution(2147983647));
var_dump(solution(1041));
var_dump(solution(32));
var_dump(solution(328));
var_dump(solution(9));
var_dump(solution(529));
var_dump(solution(20));
var_dump(solution(15));
?>