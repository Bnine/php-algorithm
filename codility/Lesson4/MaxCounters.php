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
 * @Link: https://app.codility.com/demo/results/trainingQRVCXU-P75/
 */
function solution($N, $A) {
    $resultArr = array();
    $currentMaxCnt = 0;
    $lastMaxVal = 0;
    $updTime = 0;
    $afterUpdatedArr = array();

    foreach ($A as $val) {
        if ($val === ($N + 1)) {
            $lastMaxVal = $currentMaxCnt;
            $updTime++;
        } else {
            if (isset($resultArr[$val-1])) {
                if ($afterUpdatedArr[$val-1] === $updTime) {
                    $resultArr[$val-1]++;
                } else {
                    $resultArr[$val-1] = 1 + $lastMaxVal;
                }
            } else {
                $resultArr[$val-1] = 1 + $lastMaxVal;
            }

            $afterUpdatedArr[$val-1] = $updTime;
            
            if ($resultArr[$val-1] > $currentMaxCnt) {
                //echo "Change currentMaxCnt value! resultArr-val -> ".$resultArr[$val-1]." & N -> ".$currentMaxCnt.PHP_EOL; 
                $currentMaxCnt++;
            }
        }
    }

    for ($i=0;$i<$N;$i++) {
        if (!isset($resultArr[$i]) || !isset($afterUpdatedArr[$i]) || $afterUpdatedArr[$i] !== $updTime) {
            $resultArr[$i] = $lastMaxVal;
        }
    }

    ksort($resultArr);
    return $resultArr;
}

var_dump(solution(5,[3,4,4,6,1,4,4]));
?>