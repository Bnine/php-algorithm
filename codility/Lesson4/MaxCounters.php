<?php
/**
 * Lesson 4-3 : MaxCounters
 * 
 * @Total score: 100%
 * 
 * Task: 100%
 * Correctness: 100%
 * Performance: 100%
 * 
 * @Detected time complexity: O(N + M)
 * @Link: https://app.codility.com/demo/results/trainingYWJRYB-VHM/
 */
function solution($N, $A) {
    // Implement your solution here
    //$resultArr = array_fill(0, $N, 0);
    $resultArr = array();
    $currentMaxCnt = 0;
    $lastMaxVal = 0;
    $updTime = 0;
    $afterUpdateArr = array();

    foreach ($A as $val) {
        /*
        if ($val === ($N + 1)) {
            //echo "Change maxium value! val -> ".$val." & N -> ".$N.PHP_EOL; 
            //$resultArr = array_fill(0, $N, max($resultArr)); //too slow
            //$resultArr = array_fill(0, $N, $currentMaxCnt); //too slow
            for ($i=0;$i<$N;$i++) {
                $resultArr[$i] = $currentMaxCnt;
            }
        } else {
            //$resultArr[$val-1]++;
            
            if (isset($resultArr[$val-1])) {
                $resultArr[$val-1]++;
            } else {
                $resultArr[$val-1] = 1;
            }
            
            if ($resultArr[$val-1] > $currentMaxCnt) {
                //echo "Change currentMaxCnt value! resultArr-val -> ".$resultArr[$val-1]." & N -> ".$currentMaxCnt.PHP_EOL; 
                $currentMaxCnt++;
            }
        }
        */
        /*
        if ($val === ($N + 1)) {
            for ($i=0;$i<$N;$i++) {
                if (isset($resultArr[$i])) {
                    echo "key -> ".$i." is setted! value -> ".$currentMaxCnt.PHP_EOL; 
                    $resultArr[$i] = $currentMaxCnt; // too slow
                }
            }
        } else {
            if (isset($resultArr[$val-1])) {
                $resultArr[$val-1]++;
            } else {
                $resultArr[$val-1] = $currentMaxCnt;
            }
            
            if ($resultArr[$val-1] > $currentMaxCnt) {
                echo "Change currentMaxCnt value! resultArr-val -> ".$resultArr[$val-1]." & N -> ".$currentMaxCnt.PHP_EOL; 
                $currentMaxCnt++;
            }
        }
        */
        if ($val === ($N + 1)) {
            $lastMaxVal = $currentMaxCnt;
            $updTime++;
        } else {
            if (isset($resultArr[$val-1])) {
                if ($afterUpdateArr[$val-1] === $updTime) {
                    $resultArr[$val-1]++;
                } else {
                    $resultArr[$val-1] = 1 + $lastMaxVal;
                }
            } else {
                $resultArr[$val-1] = 1 + $lastMaxVal;
            }

            $afterUpdateArr[$val-1] = $updTime;
            
            if ($resultArr[$val-1] > $currentMaxCnt) {
                //echo "Change currentMaxCnt value! resultArr-val -> ".$resultArr[$val-1]." & N -> ".$currentMaxCnt.PHP_EOL; 
                $currentMaxCnt++;
            }
        }
    }

    for ($i=0;$i<$N;$i++) {
        if (!isset($resultArr[$i]) || !isset($afterUpdateArr[$i]) || $afterUpdateArr[$i] !== $updTime) {
            $resultArr[$i] = $lastMaxVal;
        }
    }

    ksort($resultArr);
    return $resultArr;
}

var_dump(solution(5,[3,4,4,6,1,4,4]));

/*
You are given N counters, initially set to 0, and you have two possible operations on them:

increase(X) − counter X is increased by 1,
max counter − all counters are set to the maximum value of any counter.
A non-empty array A of M integers is given. This array represents consecutive operations:

if A[K] = X, such that 1 ≤ X ≤ N, then operation K is increase(X),
if A[K] = N + 1 then operation K is max counter.
For example, given integer N = 5 and array A such that:

    A[0] = 3
    A[1] = 4
    A[2] = 4
    A[3] = 6
    A[4] = 1
    A[5] = 4
    A[6] = 4
the values of the counters after each consecutive operation will be:

    (0, 0, 1, 0, 0)
    (0, 0, 1, 1, 0)
    (0, 0, 1, 2, 0)
    (2, 2, 2, 2, 2)
    (3, 2, 2, 2, 2)
    (3, 2, 2, 3, 2)
    (3, 2, 2, 4, 2)
The goal is to calculate the value of every counter after all operations.

Write a function:

function solution($N, $A);

that, given an integer N and a non-empty array A consisting of M integers, returns a sequence of integers representing the values of the counters.

Result array should be returned as an array of integers.

For example, given:

    A[0] = 3
    A[1] = 4
    A[2] = 4
    A[3] = 6
    A[4] = 1
    A[5] = 4
    A[6] = 4
the function should return [3, 2, 2, 4, 2], as explained above.

Write an efficient algorithm for the following assumptions:

N and M are integers within the range [1..100,000];
each element of array A is an integer within the range [1..N + 1].
Copyright 2009–2023 by Codility Limited. All Rights Reserved. Unauthorized copying, publication or disclosure prohibited.
*/
?>