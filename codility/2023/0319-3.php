<?php
/*
A non-empty array A consisting of N integers is given. Array A represents numbers on a tape.

Any integer P, such that 0 < P < N, splits this tape into two non-empty parts: A[0], A[1], ..., A[P − 1] and A[P], A[P + 1], ..., A[N − 1].

The difference between the two parts is the value of: |(A[0] + A[1] + ... + A[P − 1]) − (A[P] + A[P + 1] + ... + A[N − 1])|

In other words, it is the absolute difference between the sum of the first part and the sum of the second part.

For example, consider array A such that:

  A[0] = 3
  A[1] = 1
  A[2] = 2
  A[3] = 4
  A[4] = 3
We can split this tape in four places:

P = 1, difference = |3 − 10| = 7
P = 2, difference = |4 − 9| = 5
P = 3, difference = |6 − 7| = 1
P = 4, difference = |10 − 3| = 7
Write a function:

function solution($A);

that, given a non-empty array A of N integers, returns the minimal difference that can be achieved.

For example, given:

  A[0] = 3
  A[1] = 1
  A[2] = 2
  A[3] = 4
  A[4] = 3
the function should return 1, as explained above.

Write an efficient algorithm for the following assumptions:

N is an integer within the range [2..100,000];
each element of array A is an integer within the range [−1,000..1,000].
Copyright 2009–2023 by Codility Limited. All Rights Reserved. Unauthorized copying, publication or disclosure prohibited.
*/
/*
function solution($A) {
    // Implement your solution here
    $tapeArr = array();
    $currentVal = 0;
    $remainVal = 0;
    $givenArrCnt = count($A);

    foreach ($A as $key => $val) {
        //echo "key -> ".$key." & val -> ".$val.PHP_EOL; 
        if (($key + 1) == $givenArrCnt) {
            continue;
        }

        for($i=0;$i<$key+1;$i++){
            $currentVal += abs($A[$i]);
        }
        for($k=$key+1;$k<$givenArrCnt;$k++){
            $remainVal += abs($A[$k]);
        }

        //$minusVal = abs(abs($currentVal) - abs($remainVal));
        //echo "currentVal -> ".$currentVal." & remainVal -> ".$remainVal." minusVal -> ".$minusVal.PHP_EOL; 
        $tapeArr[] = abs(abs($currentVal) - abs($remainVal));
        $currentVal = 0;
        $remainVal = 0;
    }

    return min($tapeArr);
}
*/

function solution($A) {
    // Implement your solution here
    $tapeArr = array();
    $currentVal = 0;
    $remainVal = 0;
    $givenArrCnt = count($A);

    foreach ($A as $key => $val) {
        //echo "key -> ".$key." & val -> ".$val.PHP_EOL; 
        if (($key + 1) == $givenArrCnt) {
            continue;
        }

        if ($key == 0) {
            $currentVal = $val;
            for($k=$key+1;$k<$givenArrCnt;$k++){
                $remainVal += $A[$k];
            }
        } else {
            $currentVal += $val;
            $remainVal -= $val;
        }

        //$minusVal = abs(abs($currentVal) - abs($remainVal));
        //echo "currentVal -> ".$currentVal." & remainVal -> ".$remainVal." minusVal -> ".$minusVal.PHP_EOL; 
        $tapeArr[] = abs($currentVal - $remainVal);
    }

    return min($tapeArr);
}
var_dump(solution([3,1,2,4,3]));
?>