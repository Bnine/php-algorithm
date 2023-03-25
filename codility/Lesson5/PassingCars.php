<?php
/**
 * 
 * https://app.codility.com/demo/results/training8HJXQ7-AS6/
 */
function solution($A) {
    // Implement your solution here
    $carPairCnt = 0;
    $eastCarCnt = 0;
    foreach ($A as $val) {
        if ($val === 0) {
            $eastCarCnt++;
        } else {
            $carPairCnt += $eastCarCnt * $val;
        }

        if ($carPairCnt > 1000000000) {
            return -1;
        }
    }

    return $carPairCnt;
    /*
    $eastCarArr = array();
    $westCarArr = array();

    foreach ($A as $key => $val) {
        if ($val % 2 == 0) {
            $eastCarArr[] = $key;
        } else {
            $westCarArr[] = $key;
        }
    }

    $carPairCnt = 0;
    foreach ($eastCarArr as $valEast) {
        foreach ($westCarArr as $valWest) {
            if ($valWest > $valEast) {
                echo "valEast -> ".$valEast." & valWest -> ".$valWest.PHP_EOL; 
                $carPairCnt++;
            }

            if ($carPairCnt >= 1000000000) {
                return -1;
            }
        }
    }

    return $carPairCnt;
    */
    /*
    $carPairCnt = 0;
    foreach ($A as $keyEast => $valEast) {
        echo "keyEast -> ".$keyEast." & valEast -> ".$valEast.PHP_EOL; 
        if ($valEast % 2 != 0) {
            echo "keyEast is odd passed! -> ".$keyEast.PHP_EOL;
            continue;
        }
        foreach ($A as $keyWest => $valWest) {
            //echo "keyWest -> ".$keyWest." & valWest -> ".$valWest.PHP_EOL; 
            if ($valWest % 2 == 0) {
                echo "keyEast is even passed! -> ".$keyEast.PHP_EOL;
                continue;
            }

            if ($keyWest > $keyEast) {
                echo "keyEast -> ".$valEast." & keyWest -> ".$keyWest.PHP_EOL; 
                $carPairCnt++;
            }

            if ($carPairCnt >= 1000000000) {
                return -1;
            }
        }
    }

    return $carPairCnt;
    */
    /*
    $carPairCnt = 0;
    foreach ($A as $keyEast => $valEast) {
        if ($valEast === 0) {
            foreach ($A as $keyWest => $valWest) {
                if ($valWest === 1) {
                    if ($keyWest > $keyEast) {
                        //echo "keyEast -> ".$valEast." & keyWest -> ".$keyWest.PHP_EOL; 
                        $carPairCnt++;
                    }

                    if ($carPairCnt >= 1000000000) {
                        return -1;
                    }
                }
            }
        }
    }

    return $carPairCnt;
    */
    /*
    $eastCarArr = array();
    $westCarArr = array();
    foreach ($A as $key => $val) {
        if ($val === 0) {
            $eastCarArr[] = $key;
        } else {
            $westCarArr[] = $key;
        }
    }

    if (count($eastCarArr) === 0 || count($westCarArr) === 0) {
        return 0;
    }

    $carPairCnt = 0;
    foreach ($eastCarArr as $val) {
        if (min($westCarArr) < $val) {
            $westCarArr = array_filter($westCarArr, function ($v) use ($val) {
                return $v > $val;
            });

            if (count($westCarArr) === 0 ) {
                continue;
            }
        }
        $carPairCnt += 1 * count($westCarArr);

        if ($carPairCnt >= 1000000000) {
            return -1;
        }
    }
 
    return $carPairCnt;
    */

    /*
    //Performance is low
    //task 80
    //Correctness 100
    //Performance 60
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
            for ($i=0;$i<$westCarArrCnt;$i++) {
                if ($val < $westCarArr[$i]) {
                    //echo "break!".PHP_EOL;
                    break;
                } else {
                    $lessWestCarArrKey++;
                    //echo "lessWestCarArrKey -> ".$lessWestCarArrKey.PHP_EOL;
                }
            }
            //$westCarArr = array_splice($westCarArr, 0, $lessWestCarArrKey);
            array_splice($westCarArr, 0, $lessWestCarArrKey);
        }

        $carPairCnt += 1 * count($westCarArr);

        if ($carPairCnt > 1000000000) {
            return -1;
        }
    }

    return $carPairCnt;
    */
}

var_dump(solution([0,1,0,1,1]));
//var_dump(solution([0,1]));
/*
A non-empty array A consisting of N integers is given. The consecutive elements of array A represent consecutive cars on a road.

Array A contains only 0s and/or 1s:

0 represents a car traveling east,
1 represents a car traveling west.
The goal is to count passing cars. We say that a pair of cars (P, Q), where 0 ≤ P < Q < N, is passing when P is traveling to the east and Q is traveling to the west.

For example, consider array A such that:

  A[0] = 0
  A[1] = 1
  A[2] = 0
  A[3] = 1
  A[4] = 1
We have five pairs of passing cars: (0, 1), (0, 3), (0, 4), (2, 3), (2, 4).

Write a function:

function solution($A);

that, given a non-empty array A of N integers, returns the number of pairs of passing cars.

The function should return −1 if the number of pairs of passing cars exceeds 1,000,000,000.

For example, given:

  A[0] = 0
  A[1] = 1
  A[2] = 0
  A[3] = 1
  A[4] = 1
the function should return 5, as explained above.

Write an efficient algorithm for the following assumptions:

N is an integer within the range [1..100,000];
each element of array A is an integer that can have one of the following values: 0, 1.
Copyright 2009–2023 by Codility Limited. All Rights Reserved. Unauthorized copying, publication or disclosure prohibited.
*/
?>