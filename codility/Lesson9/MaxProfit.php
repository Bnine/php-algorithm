<?php
function solution($A) {
    //카데인 알고리즘
    $arrCnt = count($A);
    if ($arrCnt <= 1) {
        return 0;
    }

    $lowestVal = $A[0];
    $localMaxProfit = 0;
    $globalMaxProfit = 0;
    for ($i=1;$i<$arrCnt;$i++) {
        //echo "val -> ".$A[$i].PHP_EOL;
        //echo "lowestVal -> ".$lowestVal.PHP_EOL;
        //echo "localMaxProfit -> ".$localMaxProfit.PHP_EOL;
        //echo "globalMaxProfit -> ".$globalMaxProfit.PHP_EOL;
        $localMaxProfit = $A[$i] - $lowestVal;

        if ($A[$i] < $lowestVal) {
            $lowestVal = $A[$i];
        }

        $globalMaxProfit = max(array($globalMaxProfit, $localMaxProfit));
        //echo "2. lowestVal -> ".$lowestVal.PHP_EOL;
        //echo "2. localMaxProfit -> ".$localMaxProfit.PHP_EOL;
        //echo "2. globalMaxProfit -> ".$globalMaxProfit.PHP_EOL;
    }

    if ($globalMaxProfit < 0) {
        return 0;
    }

    return $globalMaxProfit;

    /*
    $arrCnt = count($A);
    $lowestVal = min($A);
    $lastArrIdx = $arrCnt - 1;
    $remainArr = array();
    for ($i = $arrCnt-1; $i >= 0; $i--) {
        if ($A[$i] == $lowestVal) {
            if ($i == $lastArrIdx) {
                return 0;
            } else {
                $remainArr = array_slice($A, $i+1);
                break;
            }
        }
    }    
    //var_dump($lowestVal);
    //var_dump($remainArr);

    return max($remainArr) - $lowestVal;
    */
}

//var_dump(solution([23171,21011,21123,21366,21013,21367]));
var_dump(solution([8, 9, 3, 6, 1, 2]));
/*
An array A consisting of N integers is given. It contains daily prices of a stock share for a period of N consecutive days. If a single share was bought on day P and sold on day Q, where 0 ≤ P ≤ Q < N, then the profit of such transaction is equal to A[Q] − A[P], provided that A[Q] ≥ A[P]. Otherwise, the transaction brings loss of A[P] − A[Q].

For example, consider the following array A consisting of six elements such that:

  A[0] = 23171
  A[1] = 21011
  A[2] = 21123
  A[3] = 21366
  A[4] = 21013
  A[5] = 21367
If a share was bought on day 0 and sold on day 2, a loss of 2048 would occur because A[2] − A[0] = 21123 − 23171 = −2048. If a share was bought on day 4 and sold on day 5, a profit of 354 would occur because A[5] − A[4] = 21367 − 21013 = 354. Maximum possible profit was 356. It would occur if a share was bought on day 1 and sold on day 5.

Write a function,

function solution($A);

that, given an array A consisting of N integers containing daily prices of a stock share for a period of N consecutive days, returns the maximum possible profit from one transaction during this period. The function should return 0 if it was impossible to gain any profit.

For example, given array A consisting of six elements such that:

  A[0] = 23171
  A[1] = 21011
  A[2] = 21123
  A[3] = 21366
  A[4] = 21013
  A[5] = 21367
the function should return 356, as explained above.

Write an efficient algorithm for the following assumptions:

N is an integer within the range [0..400,000];
each element of array A is an integer within the range [0..200,000].
Copyright 2009–2023 by Codility Limited. All Rights Reserved. Unauthorized copying, publication or disclosure prohibited.

*/
?>