<?php
/**
 * Lesson 6-2 : MaxProductOfThree
 * 
 * @Total score: 100%
 * 
 * Task: 100%
 * Correctness: 100%
 * Performance: 100%
 * 
 * @Detected time complexity: O(N * log(N))
 * @Link: https://app.codility.com/demo/results/trainingWYZRBJ-47T/
 */
function solution($A) {
    sort($A);
    $arrCnt = count($A);
    $calVal = 0;

    $calVal = $A[$arrCnt-3] * $A[$arrCnt-2] * $A[$arrCnt-1];
    //만약 앞에 음수 두개를 곱 했을때 맨끝의 배열의 값보다 클 수도 있기 때문
    if ($calVal < $A[0] * $A[1] * $A[$arrCnt-1]) {
        $calVal = $A[0] * $A[1] * $A[$arrCnt-1];
    }

    return $calVal;

    //처음에 The product of triplet (P, Q, R) equates to A[P] * A[Q] * A[R] (0 ≤ P < Q < R < N).
    //이 의미가 sorting을 하지 않고 그냥 배열 그대로 해서 찾는 문제 인 줄 알고 삽질을 많이 했다.
    //생각해보니 이번 챕터 레슨 제목이 Sorting 이었다... 하....
    //당연히 퍼포먼스 조지고~
    /*
    $arrCnt = count($A);
    $maxVal = $A[0] * $A[1] * $A[2];
    for ($i=0;$i<$arrCnt-2;$i++) {
        for ($j=$i+1;$j<$arrCnt-1;$j++) {
            $thridMax = max(array_slice($A,$j+1));

            $calVal = $A[$i] * $A[$j] * $thridMax;
            if ($maxVal < $calVal) {
                $maxVal = $calVal;
            }
        }
    }

    return $maxVal;
    */
    /*
    $arrCnt = count($A);
    $maxVal = $A[0] * $A[1] * $A[2];
    for ($i=0;$i<$arrCnt;$i++) {
        for ($j=$i+1;$j<$arrCnt;$j++) {
            for ($k=$j+1;$k<$arrCnt;$k++) {
                $calVal = $A[$i] * $A[$j] * $A[$k];
                if ($maxVal < $calVal) {
                    $maxVal = $calVal;
                }
            }
        }
    }

    return $maxVal;
    */
    /*
    $maxVal = 0;
    $calVal = 1;
    for ($i=0;$i<3;$i++) {
        $maxVal = max($A);
        $calVal = $calVal * $maxVal;
        array_splice($A, array_search($maxVal, $A), 1);
    }

    return $calVal;
    */

    /*
    if (count($A) === 0) {
        return 0;
    }

    $arrCnt = count($A);
    $maxVal = $A[0] * $A[1] * $A[2];
    for  ($i=2; $i<$arrCnt; $i++) {
        $calVal = $A[$i-2] * $A[$i-1] * $A[$i];
        if ($maxVal < $calVal) {
            $maxVal = $calVal;
        }
    }

    return $maxVal;
    */
    /*
    if (count($A) === 0) {
        return 0;
    }

    $positiveArr = array_values(array_filter($A, function ($v) {
        return $v > 0;
    }));

    $arrCnt = count($positiveArr);
    $maxVal = $A[0] * $A[1] * $A[2];
    for  ($i=2; $i<$arrCnt; $i++) {
        $calVal = $positiveArr[$i-2] * $positiveArr[$i-1] * $positiveArr[$i];
        if ($maxVal < $calVal) {
            $maxVal = $calVal;
        }
    }

    return $maxVal;
    */
}
var_dump(solution([1,1,2,2,2,5,6]));
//var_dump(solution([-3,1,2,-2,5,6]));
//var_dump(solution([-7,-1,-5,-3]));
//var_dump(solution([-5,5,-5,4]));

/*
A non-empty array A consisting of N integers is given. The product of triplet (P, Q, R) equates to A[P] * A[Q] * A[R] (0 ≤ P < Q < R < N).

For example, array A such that:

  A[0] = -3
  A[1] = 1
  A[2] = 2
  A[3] = -2
  A[4] = 5
  A[5] = 6
contains the following example triplets:

(0, 1, 2), product is −3 * 1 * 2 = −6
(1, 2, 4), product is 1 * 2 * 5 = 10
(2, 4, 5), product is 2 * 5 * 6 = 60
Your goal is to find the maximal product of any triplet.

Write a function:

function solution($A);

that, given a non-empty array A, returns the value of the maximal product of any triplet.

For example, given array A such that:

  A[0] = -3
  A[1] = 1
  A[2] = 2
  A[3] = -2
  A[4] = 5
  A[5] = 6
the function should return 60, as the product of triplet (2, 4, 5) is maximal.

Write an efficient algorithm for the following assumptions:

N is an integer within the range [3..100,000];
each element of array A is an integer within the range [−1,000..1,000].
Copyright 2009–2023 by Codility Limited. All Rights Reserved. Unauthorized copying, publication or disclosure prohibited.
*/
?>