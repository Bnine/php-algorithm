<?php
function solution($A) {
    $arrCnt = count($A);

    $firstSum = array_fill(0, $arrCnt, 0);
    //진행 방향 ->>
    for ($i=1;$i<$arrCnt-1;$i++) {
        $firstSum[$i] = max(0, $firstSum[$i-1]+$A[$i]);
    }

    $scndSum = array_fill(0, $arrCnt, 0);
    //진행 방향 <<-
    for ($i=$arrCnt-2;$i>0;$i--) {
        $scndSum[$i] = max(0, $scndSum[$i+1]+$A[$i]);
    }

    $maxSum = 0;
    for ($i=1;$i<$arrCnt-1;$i++) { 
        $maxSum = max($maxSum, $firstSum[$i-1] + $scndSum[$i+1]);
    }

    return $maxSum;
}
var_dump(solution([3,2,6,-1,4,5,-1,2]));
/*
For example, array A such that:

    A[0] = 3
    A[1] = 2
    A[2] = 6
    A[3] = -1
    A[4] = 4
    A[5] = 5
    A[6] = -1
    A[7] = 2
contains the following example double slices:

double slice (0, 3, 6), sum is 2 + 6 + 4 + 5 = 17,
double slice (0, 3, 7), sum is 2 + 6 + 4 + 5 − 1 = 16,
double slice (3, 4, 5), sum is 0.
The goal is to find the maximal sum of any double slice.

Write a function:

function solution($A);

that, given a non-empty array A consisting of N integers, returns the maximal sum of any double slice.

For example, given:

    A[0] = 3
    A[1] = 2
    A[2] = 6
    A[3] = -1
    A[4] = 4
    A[5] = 5
    A[6] = -1
    A[7] = 2
the function should return 17, because no double slice of array A has a sum of greater than 17.

Write an efficient algorithm for the following assumptions:

N is an integer within the range [3..100,000];
each element of array A is an integer within the range [−10,000..10,000].
*/
?>