<?php
/**
 * Lesson 5-1 : PassingCars
 * 
 * @Total score: 100%
 * 
 * Task: 100%
 * Correctness: 100%
 * Performance: 100%
 * 
 * @Detected time complexity: O(N)
 * @Link: https://app.codility.com/demo/results/training6RFZPS-V4E/
 */
function solution($A) {
    $carPairCnt = 0;
    $eastCarCnt = 0;
    foreach ($A as $val) {
        if ($val === 0) {
            $eastCarCnt++;
        } else {
            $carPairCnt += $eastCarCnt;
        }

        if ($carPairCnt > 1000000000) {
            return -1;
        }
    }

    return $carPairCnt;
}

//1st Code
/**
 * Lesson 5-1 : PassingCars
 * 
 * @Total score: 80%
 * 
 * Task: 80%
 * Correctness: 100%
 * Performance: 60%
 * 
 * @Detected time complexity: O(N)
 * @Link: https://app.codility.com/demo/results/trainingZSAHR4-SVB/
 */
/*
function solution($A) {
    $eastCarArr = array();
    $westCarArr = array();
    foreach ($A as $key => $val) {
        if ($val === 0) {
            $eastCarArr[] = $key;
        } else {
            $westCarArr[] = $key;
        }
    }
    
    $eastCarArrCnt = count($eastCarArr);
    $westCarArrCnt = count($westCarArr);
    if ($eastCarArrCnt === 0 || $westCarArrCnt === 0) {
        return 0;
    }
    
    $carPairCnt = 0;
    foreach ($eastCarArr as $val) {
        //echo "eastCarArr-val -> ".$val.PHP_EOL;
        if ($val > $westCarArr[0]) {
            //echo "westCarArr-val is less than eastCarArr-val -> ".$westCarArr[0].PHP_EOL;
            $lessWestCarArrKey = 0;
            foreach ($westCarArr as $westVal) {
                if ($val < $westVal) {
                    //echo "break!".PHP_EOL;
                    break;
                } else {
                    $lessWestCarArrKey++;
                }
            }
            //echo "lessWestCarArrKey -> ".$lessWestCarArrKey.PHP_EOL;
            array_splice($westCarArr, 0, $lessWestCarArrKey);

            if (count($westCarArr) === 0) {
                break;
            }
        }

        $carPairCnt += count($westCarArr);

        if ($carPairCnt > 1000000000) {
            return -1;
        }
    }

    return $carPairCnt;
}
*/
var_dump(solution([0,1,0,1,1]));
//var_dump(solution([0,1]));
?>