<?php
/**
 * Lesson 7-4 : StoneWall
 * 
 * @Total score: 100%
 * 
 * Task: 100%
 * Correctness: 100%
 * Performance: 100%
 * 
 * @Detected time complexity: O(N*log(N)) or O(N) or O(N**2)
 * @Link: https://app.codility.com/demo/results/training8UBJN3-W5Y/
 */

//https://app.codility.com/demo/results/trainingKN7VM6-CQC/
//O(N*log(N)) or O(N) or O(N**2)
function solution($A) {
    $arrCnt = count($A);
    if ($arrCnt === 1) {
        return 0;
    }

    //$uniqueArr = array_unique($A);
    $halfVal = floor($arrCnt/2);
    $finishedVal = array();
    foreach ($A as $key => $val) {
        if (in_array($val, $finishedVal)) {
            continue;
        }

        $j = 0;
        $chkArrCnt = 0;
        while ($j < $arrCnt) {
            if ($val == $A[$j]) {
                $chkArrCnt++;
            }

            $j++;
        }

        if ($chkArrCnt > $halfVal) {
            return $key;
        }
        $finishedVal[] = $val;
    }

    return -1;
    /*
    $arrCnt = count($A);
    if ($arrCnt === 1) {
        return 0;
    }

    $uniqueArr = array_unique($A);
    $halfVal = floor($arrCnt/2);
    foreach ($uniqueArr as $key => $val) {
        $j = 0;
        $chkArrCnt = 0;
        while ($j < $arrCnt) {
            if ($val == $A[$j]) {
                $chkArrCnt++;
            }

            if ($chkArrCnt > $halfVal) {
                return $key;
            }

            $j++;
        }
    }

    return -1;
    */
    /*
    $arrCnt = count($A);
    if ($arrCnt === 1) {
        return 0;
    }

    $uniqueArr = array_unique($A);
    $uniqueArr = array_filter($uniqueArr, function ($v) {
        return $v > 0;
    });

    $chkArr = array();
    $finishedVal = array();
    $halfVal = floor($arrCnt/2);
    for ($i=0; $i < $arrCnt; $i++){
        //퍼포먼스 상승을 위해 추가
        if (in_array($A[$i], $finishedVal)) {
            continue;
        }

        $val = $A[$i];
        $j = 0;
        $chkArrCnt = 0;
        $idxVal = 0;

        //$chkArr = array_filter($A, function ($v) use ($val) {
            //return $v == $val;
        //});
        
        //퍼포먼스 상승을 위해 추가
        while ($j < $arrCnt) {
            if ($val == $A[$j]) {
                $chkArr[$j] = $A[$j];
                $idxVal = $j;
                $chkArrCnt++;
            }
            $j++;
        }

        $finishedVal[] = $val;
        if ($chkArrCnt > $halfVal) {
            //$result = array_flip($chkArr);
            return $idxVal;
        }
    }

    return -1;
    */
}
var_dump(solution([3,4,3,2,3,-1,3,3]));
var_dump(solution([2,1,1,3]));
/*
An array A consisting of N integers is given. The dominator of array A is the value that occurs in more than half of the elements of A.

For example, consider array A such that

 A[0] = 3    A[1] = 4    A[2] =  3
 A[3] = 2    A[4] = 3    A[5] = -1
 A[6] = 3    A[7] = 3
The dominator of A is 3 because it occurs in 5 out of 8 elements of A (namely in those with indices 0, 2, 4, 6 and 7) and 5 is more than a half of 8.

Write a function

function solution($A);

that, given an array A consisting of N integers, returns index of any element of array A in which the dominator of A occurs. The function should return −1 if array A does not have a dominator.

For example, given array A such that

 A[0] = 3    A[1] = 4    A[2] =  3
 A[3] = 2    A[4] = 3    A[5] = -1
 A[6] = 3    A[7] = 3
the function may return 0, 2, 4, 6 or 7, as explained above.

Write an efficient algorithm for the following assumptions:

N is an integer within the range [0..100,000];
each element of array A is an integer within the range [−2,147,483,648..2,147,483,647].
Copyright 2009–2023 by Codility Limited. All Rights Reserved. Unauthorized copying, publication or disclosure prohibited.
*/
?>