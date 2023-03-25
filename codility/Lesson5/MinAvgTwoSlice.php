<?php
/**
 * Lesson 5-4 : MinAvgTwoSlice
 * 
 * @Total score: 100%
 * 
 * Task: 100%
 * Correctness: 100%
 * Performance: 100%
 * 
 * @Detected time complexity: O(N)
 * @Link: https://app.codility.com/demo/results/training6WYBD9-65P/
 */
function solution($A) {
    //두번째시도
    //때려 죽여도 모르겠다 ㅠㅠ...
    //구글을 찾아보니 수학관련해서 알고 있으면 아주 쉽게 푼다고 한다...
    //2개의 그룹에서 평균을 구하면 4개의 그룹은 / 2로 하면 결국 2개 + 2개 이기 때문에 4개는 고려 할 필요가 없고
    //예외로 3개인 그룹을 생각해서 3개의 평균까지 구해서 푸는 문제...
    $arrCnt = count($A);
    $minPval = 0;
    $smallestVal = ($A[0] + $A[1]) / 2; 
    for ($i=2;$i<$arrCnt;$i++) {
        $avg = (float)(($A[$i-2] + $A[$i-1] + $A[$i]) / 3);
        if ($avg < $smallestVal) {
            $smallestVal = $avg;
            $minPval = $i-2;
        }

        $avg = (float)(($A[$i-1] + $A[$i]) / 2);
        if ($avg < $smallestVal) {
            $smallestVal = $avg;
            $minPval = $i-1;
        }
    }

    return $minPval;

    //첫시도 60% 
    //Task 60
    //Correctness 100
    //Performance 20
    //O(N ** 2)
    //우선은 정확도 100인거에 만족 하자
    /*
    $arrCnt = count($A);
    $minPval = 0;
    $smallestVal = 0;
    $sumVal = 0;
    $divVal = 0;
    foreach ($A as $key => $val) {
        if (($key + 1) === $arrCnt) {
            //echo "this is last key! break logic".PHP_EOL; 
            break;
        }
        $sumVal = $val;
        for($i=$key+1;$i<$arrCnt;$i++) {
            $sumVal += $A[$i];
            $divVal = $sumVal / (($i - $key) + 1);
            if ($key === 0 && $i === 1) {
                //echo "this is first loop".PHP_EOL; 
                $smallestVal = $divVal;
                $minPval = $key;
            } else {
                if ($divVal < $smallestVal) {
                    //echo "this is lower than smallestVal! smallestVal -> ".$smallestVal." & divVal -> ".$divVal.PHP_EOL;
                    $smallestVal = $divVal;
                    $minPval = $key;
                }
            }
        }
    }

    return $minPval;
    */
}

var_dump(solution([4,2,2,5,1,5,8]));
/*
A non-empty array A consisting of N integers is given. A pair of integers (P, Q), such that 0 ≤ P < Q < N, is called a slice of array A (notice that the slice contains at least two elements). The average of a slice (P, Q) is the sum of A[P] + A[P + 1] + ... + A[Q] divided by the length of the slice. To be precise, the average equals (A[P] + A[P + 1] + ... + A[Q]) / (Q − P + 1).

For example, array A such that:

    A[0] = 4
    A[1] = 2
    A[2] = 2
    A[3] = 5
    A[4] = 1
    A[5] = 5
    A[6] = 8
contains the following example slices:

slice (1, 2), whose average is (2 + 2) / 2 = 2;
slice (3, 4), whose average is (5 + 1) / 2 = 3;
slice (1, 4), whose average is (2 + 2 + 5 + 1) / 4 = 2.5.
The goal is to find the starting position of a slice whose average is minimal.

Write a function:

function solution($A);

that, given a non-empty array A consisting of N integers, returns the starting position of the slice with the minimal average. If there is more than one slice with a minimal average, you should return the smallest starting position of such a slice.

For example, given array A such that:

    A[0] = 4
    A[1] = 2
    A[2] = 2
    A[3] = 5
    A[4] = 1
    A[5] = 5
    A[6] = 8
the function should return 1, as explained above.

Write an efficient algorithm for the following assumptions:

N is an integer within the range [2..100,000];
each element of array A is an integer within the range [−10,000..10,000].
Copyright 2009–2023 by Codility Limited. All Rights Reserved. Unauthorized copying, publication or disclosure prohibited.
*/
?>