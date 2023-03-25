<?php
function solution($A) {
    //https://app.codility.com/demo/results/trainingF424TR-P7K/
    $arrCnt = 0;
    $discPosition =  array();
    foreach ($A as $key => $val) {
        $discPosition[$key] = [$key - $val, $key + $val];
        $arrCnt++;
    }

    sort($discPosition);
    $intersectionVal = 0;
    foreach ($discPosition as $key => $val) {
        $j = $key+1;
        while ($j < $arrCnt) {
            if ($val[1] < $discPosition[$j][0]) {
                break;
            }
            $intersectionVal++;

            if ($intersectionVal > 10000000) {
                return -1;
            }

            $j++;
        }
    }

    return $intersectionVal;
    /*
    $arrCnt = count($A);
    $discStartPoint =  array();
    $discEndPoint =  array();
    for ($i=0;$i<$arrCnt;$i++) {
        $discStartPoint[] = $i - $A[$i];
        $discEndPoint[] = $i + $A[$i];
    }
    
    sort($discStartPoint);
    sort($discEndPoint);

    $intersectionVal = 0;
    foreach ($discEndPoint as $keyEnd => $valEnd) {
        foreach ($discStartPoint as $keyStart => $valStart) {
            //exceeds 10,000,000. (초과)
            if ($intersectionVal > 10000000) {
                return -1;
            }

            if ($keyStart === $keyEnd) {
                echo "do not count itself. continue loop".PHP_EOL;
                continue;
            }

            if ($valStart <= $valEnd) {
                $intersectionVal++;
            }

            if ($valEnd < $valStart) {
                echo "disc length is over do next loop disc end point -> ".$valEnd." & next disc start point -> ".$valStart.PHP_EOL;
                break;
            }

        }
    }

    return $intersectionVal;
    */
    /*
    $arrCnt = count($A);
    $discPosition =  array();
    foreach ($A as $key => $val) {
        $discPosition[$key] = [$key - $val, $key + $val];
    }

    sort($discPosition);
    $intersectionVal = 0;

    for ($i=0;$i<$arrCnt;$i++) {
        $j = $i+1;
        while ($j < $arrCnt) {
            //echo "j -> ".$j.PHP_EOL;
            if ($discPosition[$i][1] < $discPosition[$j][0]) {
                break;
            }
            $intersectionVal++;
            $j++;
        }

        if ($intersectionVal > 10000000) {
            return -1;
        }
    }
    
    return $intersectionVal;
    */
    //https://app.codility.com/demo/results/trainingA8F93D-SBR/
    /*
    $arrCnt = count($A);
    $discPosition =  array();
    for ($i=0;$i<$arrCnt;$i++) {
        $discPosition[$i] = [$i - $A[$i], $i + $A[$i]];
    }

    sort($discPosition);
    $intersectionVal = 0;
    for ($i=0;$i<$arrCnt;$i++) {
        for ($j=$i+1;$j<$arrCnt;$j++) {
            //echo "intersectionVal key -> ".$i." & start -> ".$discPosition[$i][0]." & end -> ".$discPosition[$i][1].PHP_EOL;
            //exceeds 10,000,000. (초과)
            if ($intersectionVal > 10000000) {
                return -1;
            }

            if ($discPosition[$i][1] < $discPosition[$j][0]) {
                break;
            }

            if ($discPosition[$j][0] <= $discPosition[$i][1]) {
                $intersectionVal++;
            }
        }
    }
    
    return $intersectionVal;
    */
    //https://app.codility.com/demo/results/trainingSYE9M2-E6S/
    /*
    $arrCnt = count($A);
    $discPosition =  array();
    foreach ($A as $key => $val) {
        $discPosition[$key] = [$key - $val, $key + $val];
    }
    sort($discPosition);

    $intersectionVal = 0;
    foreach ($discPosition as $key => $val) {
        //echo "key -> ".$key." & start -> ".$val[0]." & end -> ".$val[1].PHP_EOL;
        for ($i=$key+1; $i<$arrCnt; $i++) {
            //echo "intersectionVal key -> ".$i." & start -> ".$discPosition[$i][0]." & end -> ".$discPosition[$i][1].PHP_EOL;
            //exceeds 10,000,000. (초과)
            if ($intersectionVal > 10000000) {
                return -1;
            }

            if ($val[1] < $discPosition[$i][0]) {
                //echo "disc length is over do next loop disc end point -> ".$val[1]." & next disc start point -> ".$discPosition[$i][0].PHP_EOL;
                break;
            }

            if ($discPosition[$i][0] <= $val[1]) {
                $intersectionVal++;
            }
        }
    }
    
    return $intersectionVal;
    */
    
    /*
    $arrCnt = count($A);
    $discStartPoint =  array();
    $discEndPoint =  array();
    for ($i=0;$i<$arrCnt;$i++) {
        $discStartPoint[] = $i - $A[$i];
        $discEndPoint[] = $i + $A[$i];
    }

    sort($discStartPoint);
    sort($discEndPoint);
    $intersectionVal = 0;
    for ($i=0;$i<$arrCnt;$i++) {
        for ($j=$i+1;$j<$arrCnt;$j++) {
            if ($discPosition[$j][0] <= $discPosition[$i][1]) {
                $intersectionVal++;

                //exceeds 10,000,000. (초과)
                if ($intersectionVal > 10000000) {
                    return -1;
                }
            }
        }
    }

    return $intersectionVal;
    */

    //혹시나 싶어 Foreach문을 전부 For문으로 바꿧더니 오히려 퍼포먼스가 더 떨어짐
    /*
    $arrCnt = count($A);
    $discPosition =  array();
    for ($i=0;$i<$arrCnt;$i++) {
        $discPosition[$i] = [$i - $A[$i], $i + $A[$i]];
    }

    $intersectionVal = 0;
    for ($i=0;$i<$arrCnt;$i++) {
        for ($j=$i+1;$j<$arrCnt;$j++) {
            if ($discPosition[$j][0] <= $discPosition[$i][1]) {
                $intersectionVal++;

                //exceeds 10,000,000. (초과)
                if ($intersectionVal > 10000000) {
                    return -1;
                }
            }
        }
    }

    return $intersectionVal;
    */
    //문제가 이해가 되지 않아서 구글링해서 품...
    //첫번쨰는 역시 퍼포먼스 점수 처참
    //Task 62
    //Correctness 100
    //Performance 25
    //O(N ** 2)
    //https://app.codility.com/demo/results/trainingC7QRJV-WZ9/
    /*
    $arrCnt = count($A);
    $discPosition =  array();
    foreach ($A as $key => $val) {
        $discPosition[$key] = [$key - $val, $key + $val];
    }

    $intersectionVal = 0;
    foreach ($discPosition as $key => $val) {
        //echo "key -> ".$key." & start -> ".$val[0]." & end -> ".$val[1].PHP_EOL;
        for ($i=$key+1; $i<$arrCnt; $i++) {
            //echo "intersectionVal key -> ".$i." & start -> ".$discPosition[$i][0]." & end -> ".$discPosition[$i][1].PHP_EOL;
            if ($discPosition[$i][0] <= $val[1]) {
                $intersectionVal++;

                //exceeds 10,000,000. (초과)
                if ($intersectionVal > 10000000) {
                    return -1;
                }
            }
        }
    }

    return $intersectionVal;
    */
}

var_dump(solution([1,5,2,1,4,0]));
/*
We draw N discs on a plane. The discs are numbered from 0 to N − 1. An array A of N non-negative integers, specifying the radiuses of the discs, is given. The J-th disc is drawn with its center at (J, 0) and radius A[J].

We say that the J-th disc and K-th disc intersect if J ≠ K and the J-th and K-th discs have at least one common point (assuming that the discs contain their borders).

The figure below shows discs drawn for N = 6 and A as follows:

  A[0] = 1
  A[1] = 5
  A[2] = 2
  A[3] = 1
  A[4] = 4
  A[5] = 0


There are eleven (unordered) pairs of discs that intersect, namely:

discs 1 and 4 intersect, and both intersect with all the other discs;
disc 2 also intersects with discs 0 and 3.
Write a function:

function solution($A);

that, given an array A describing N discs as explained above, returns the number of (unordered) pairs of intersecting discs. The function should return −1 if the number of intersecting pairs exceeds 10,000,000.

Given array A shown above, the function should return 11, as explained above.

Write an efficient algorithm for the following assumptions:

N is an integer within the range [0..100,000];
each element of array A is an integer within the range [0..2,147,483,647].
Copyright 2009–2023 by Codility Limited. All Rights Reserved. Unauthorized copying, publication or disclosure prohibited.

*/
?>