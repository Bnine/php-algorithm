<?php
/*
An array A consisting of N different integers is given. The array contains integers in the range [1..(N + 1)], which means that exactly one element is missing.

Your goal is to find that missing element.

Write a function:

function solution($A);

that, given an array A, returns the value of the missing element.

For example, given array A such that:

  A[0] = 2
  A[1] = 3
  A[2] = 1
  A[3] = 5
the function should return 4, as it is the missing element.

Write an efficient algorithm for the following assumptions:

N is an integer within the range [0..100,000];
the elements of A are all distinct;
each element of array A is an integer within the range [1..(N + 1)].
Copyright 2009–2023 by Codility Limited. All Rights Reserved. Unauthorized copying, publication or disclosure prohibited.
*/
function solution($A) {
    // Implement your solution here
    if (count($A) == 0) {
        return 1;
    }

    if (count($A) == 1) {
        if ($A[0] <= 1) {
            return $A[0] + 1;
        } else {
            return $A[0] - 1;
        }
    }

    sort($A);
    $currentVal = 0;
    foreach ($A as $key=>$val) {
        //echo "key -> ".$key." & val -> ".$val.PHP_EOL; 
        if (($val - 1) > $currentVal) {
            //echo "more than 1 val -> ".$val." & currentVal -> ".$currentVal.PHP_EOL; 
            return $val-1;
        } else {
            $currentVal++;
        }
    }

    return $currentVal+1;
}

var_dump(solution([]));
?>