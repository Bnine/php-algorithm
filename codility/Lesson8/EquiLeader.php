<?php
//https://app.codility.com/demo/results/trainingWCRFQC-2NS/
function findLeaderData($A, $arrCnt) {
    sort($A);
    $leaderVal = null;
    $leaderCnt = 0;
    foreach ($A as $key => $val) {
        if ($key == 0) {
            $leaderVal = $val;
            $leaderCnt = 1;
        } else {
            if ($val == $leaderVal) {
                $leaderCnt++;
            } else {
                $leaderCnt--;
            }

            if ($leaderCnt == 0) {
                $leaderVal = $val;
                $leaderCnt = 1;
            }
        }

        if ($leaderCnt > floor($arrCnt / 2)) {
            break;
        }
    }

    $totalLeaderCnt = 0;
    foreach ($A as $val) {
        if ($val > $leaderVal) {
            break;
        }
        if ($val == $leaderVal) {
            $totalLeaderCnt++;
        }
    } 

    return array(
        'leaderVal' => $leaderVal,
        'totalLeaderCnt' => $totalLeaderCnt
    );
}

function solution($A) {
    // Implement your solution here
    $arrCnt = count($A);
    if ($arrCnt === 1) {
        return 0;
    }

    $leaderDataArr = findLeaderData($A, $arrCnt);
    $leaderVal = $leaderDataArr['leaderVal'];
    $totalLeaderCnt = $leaderDataArr['totalLeaderCnt'];
    //echo "leaderVal -> ".$leaderVal." & totalLeaderCnt -> ".$totalLeaderCnt.PHP_EOL;
    if ($totalLeaderCnt <= floor($arrCnt / 2)) {
        return 0;
    }

    $equalVal = 0;
    $leftLength = 0;
    $rightLength = $totalLeaderCnt;
    for ($i=0; $i<$arrCnt-1; $i++) {
        $tempVal[] = array_shift($A);
        if ($tempVal[$i] === $leaderVal) {
            $leftLength++;
            $rightLength--;
        }

        if ($leftLength > floor(count($tempVal)/2) && $rightLength > floor(count($A)/2)) {
            $equalVal++;
        }
    }

    return $equalVal;
    /*
    $arrCnt = count($A);
    if ($arrCnt === 1) {
        return 0;
    }

    $leaderVal = $A[0];
    $leaderCnt = 1;
    for ($i = 1; $i < $arrCnt; $i++) {
        if ($A[$i] == $leaderVal) {
            $leaderCnt++;
        } else {
            $leaderCnt--;
        }

        if ($leaderCnt == 0) {
            $leaderVal = $A[$i];
            $leaderCnt = 1;
        }
    }

    $totalLeaderCnt = 0;
    for ($i = 0; $i < $arrCnt; $i++) {
        if ($A[$i] == $leaderVal) {
            $totalLeaderCnt++;
        }
    } 
    //echo "leaderVal -> ".$leaderVal." & totalLeaderCnt -> ".$totalLeaderCnt.PHP_EOL;

    if ($totalLeaderCnt <= floor($arrCnt / 2)) {
        return 0;
    }

    $equalVal = 0;
    $leftLength = 0;
    $rightLength = $totalLeaderCnt;
    for ($i=0; $i<$arrCnt-1; $i++) {
        $tempVal[] = array_shift($A);
        if ($tempVal[$i] === $leaderVal) {
            $leftLength++;
            $rightLength--;
        }

        if ($leftLength > floor(count($tempVal)/2) && $rightLength > floor(count($A)/2)) {
            $equalVal++;
        }
    }

    return $equalVal;
    */
    /*
    $arrCnt = count($A);
    if ($arrCnt === 1) {
        return 0;
    }

    $leaderArr = array();
    foreach ($A as $val) {
        if (!isset($leaderArr[$val])) {
            $leaderArr[$val] = 0;
        }
        $leaderArr[$val]++;
    }
    $leaderVal = array_search(max($leaderArr), $leaderArr);
    $totalLeaderCnt = $leaderArr[$leaderVal];
    echo "leaderVal -> ".$leaderVal." & totalLeaderCnt -> ".$totalLeaderCnt.PHP_EOL;

    if ($leaderArr[$leaderVal] <= floor($arrCnt / 2)) {
        return 0;
    }

    $equalVal = 0;
    $leftLength = 0;
    $rightLength = $arrCnt;
    for ($i=0; $i<$arrCnt-1; $i++) {
        $matchedLeaderVal = 0;
        $tempVal[] = array_shift($A);
        foreach ($tempVal as $val) {
            if ($val === $leaderVal) {
                $matchedLeaderVal++;
            }
        }
        $leftLength++;

        $matchedRightLeaderVal = 0;
        foreach ($A as $val) {
            if ($val === $leaderVal) {
                $matchedRightLeaderVal++;
            }
        }
        $rightLength--;

        if ($matchedLeaderVal > floor($leftLength/2) && $matchedRightLeaderVal > floor($rightLength/2)) {
            $equalVal++;
        }
    }

    return $equalVal;
    */
    /*
    $arrCnt = count($A);
    if ($arrCnt === 1) {
        return 0;
    }

    //$leaderVal = max($A);
    $leftArr = array();
    $rightArr =  array();
    $equalVal = 0;

    $leaderArr = array();
    foreach ($A as $val) {
        if (!isset($leaderArr[$val])) {
            $leaderArr[$val] = 0;
        }
        $leaderArr[$val]++;
    }
    $leaderVal = array_search(max($leaderArr), $leaderArr);
    //echo "leaderVal -> ".$leaderVal.PHP_EOL;

    $leftLength = 0;
    $rightLength = $arrCnt;
    for ($i=0; $i<$arrCnt-1; $i++) {
        $matchedLeaderVal = 0;
        $tempVal[] = array_shift($A);
        foreach ($tempVal as $val) {
            if ($val === $leaderVal) {
                $matchedLeaderVal++;
            }
        }
        $leftLength++;
        $leftArr[$i] = array(
            $leftLength,
            $matchedLeaderVal
        );

        $matchedLeaderVal = 0;
        foreach ($A as $val) {
            if ($val === $leaderVal) {
                $matchedLeaderVal++;
            }
        }
        $rightLength--;
        $rightArr[$i] = array(
            $rightLength,
            $matchedLeaderVal
        );
    }

    for ($i=0; $i<count($leftArr); $i++) {
        $halfLeftVal = floor($leftArr[$i][0]/2);
        $halfRightVal = floor($rightArr[$i][0]/2);
        //echo "halfLeftVal -> ".$halfLeftVal." & leftArrVal -> ".$leftArr[$i][1].PHP_EOL;
        //echo "halfRightVal -> ".$halfRightVal." & rightArrVal -> ".$rightArr[$i][1].PHP_EOL;

        if ($leftArr[$i][1] > $halfLeftVal && $rightArr[$i][1] > $halfRightVal) {
            $equalVal++;
        }
    }

    return $equalVal;
    */
    /*
    $arrCnt = count($A);
    if ($arrCnt === 1) {
        return 0;
    }

    //$leaderVal = max($A);
    $leftArr = array();
    $rightArr =  array();
    $equalVal = 0;

    $leftLength = 0;
    $rightLength = $arrCnt;
    for ($i=0; $i<$arrCnt-1; $i++) {
        $matchedLeaderVal = 0;
        $leftLeader = null;
            $rightLeader = null; 
        $tempVal[] = array_shift($A);
        foreach ($tempVal as $val) {
            if ($val === $leaderVal) {
                $matchedLeaderVal++;
            }

            $leftLeader = null;
            $rightLeader = null;    
            $leftArr[] = array_shift($A);
            $leftArrCnt = count($leftArr);
            $rightArrCnt = count($A);
            
            if ($leftArrCnt % 2 == 0 || $rightArrCnt % 2 == 0) {
                $i++;
                continue;
            }
            
            $halfLeftVal = floor($leftArrCnt/2);
            foreach ($leftArr as $leftVal) {
                $j = 0;
                $chkArrCnt = 0;
                while ($j < $leftArrCnt) {
                    if ($leftVal == $leftArr[$j]) {
                        $chkArrCnt++;
                    }
                    $j++;
                }

                if ($chkArrCnt > $halfLeftVal) {
                    $leftLeader = $leftVal;
                    break;
                }
            }
        }
        $leftLength++;
        $leftArr[$i] = array(
            $leftLength,
            $matchedLeaderVal
        );

        $matchedLeaderVal = 0;
        foreach ($A as $val) {
            if ($val === $leaderVal) {
                $matchedLeaderVal++;
            }
        }
        $rightLength--;
        $rightArr[$i] = array(
            $rightLength,
            $matchedLeaderVal
        );
    }

    for ($i=0; $i<count($leftArr); $i++) {
        $halfLeftVal = floor($leftArr[$i][0]/2);
        $halfRightVal = floor($rightArr[$i][0]/2);
        echo "halfLeftVal -> ".$halfLeftVal." & leftArrVal -> ".$leftArr[$i][1].PHP_EOL;
        echo "halfRightVal -> ".$halfRightVal." & rightArrVal -> ".$rightArr[$i][1].PHP_EOL;

        if ($leftArr[$i][1] > $halfLeftVal && $rightArr[$i][1] > $halfRightVal) {
            $equalVal++;
        }
    }

    return $equalVal;
    */
    /*
    $i=0;
    while ($i < $arrCnt) {
        $leftArr[] = array_shift($A);
        $leftArrCnt = count($leftArr);
        $rightArrCnt = count($A);

    }


    $leftArr = array();
    $equalVal = 0;
    $i=0;
    while ($i < $arrCnt) {
        $leftLeader = null;
        $rightLeader = null;    
        $leftArr[] = array_shift($A);
        $leftArrCnt = count($leftArr);
        $rightArrCnt = count($A);
        
        if ($leftArrCnt % 2 == 0 || $rightArrCnt % 2 == 0) {
            $i++;
            continue;
        }
        
        $halfLeftVal = floor($leftArrCnt/2);
        foreach ($leftArr as $leftVal) {
            $j = 0;
            $chkArrCnt = 0;
            while ($j < $leftArrCnt) {
                if ($leftVal == $leftArr[$j]) {
                    $chkArrCnt++;
                }
                $j++;
            }

            if ($chkArrCnt > $halfLeftVal) {
                $leftLeader = $leftVal;
                break;
            }
        }

        $halfRightVal = floor($rightArrCnt/2);
        foreach ($A as $rightVal) {
            $k = 0;
            $chkArrCnt = 0;
            while ($k < $rightArrCnt) {
                if ($rightVal == $A[$k]) {
                    $chkArrCnt++;
                }
                $k++;
            }

            if ($chkArrCnt > $halfRightVal) {
                $rightLeader = $rightVal;
                break;
            }
        }

        if ((int)$leftLeader === (int)$rightLeader) {
            $equalVal++;
        }
        $i++;
    }

    return $equalVal;
    */
    /*
    $arrCnt = count($A);

    if ($arrCnt === 1) {
        return 0;
    }

    if ($arrCnt % 2 != 0) {
        return 0;
    }

    $leftArr = array();
    $equalVal = 0;
    $i=0;
    while ($i < $arrCnt) {
        $leftLeader = null;
        $rightLeader = null;    
        $leftArr[] = array_shift($A);
        $leftArrCnt = count($leftArr);
        $rightArrCnt = count($A);
        
        if ($leftArrCnt % 2 == 0 || $rightArrCnt % 2 == 0) {
            $i++;
            continue;
        }
        
        $halfLeftVal = floor($leftArrCnt/2);
        foreach ($leftArr as $leftVal) {
            $j = 0;
            $chkArrCnt = 0;
            while ($j < $leftArrCnt) {
                if ($leftVal == $leftArr[$j]) {
                    $chkArrCnt++;
                }
                $j++;
            }

            if ($chkArrCnt > $halfLeftVal) {
                $leftLeader = $leftVal;
                break;
            }
        }

        $halfRightVal = floor($rightArrCnt/2);
        foreach ($A as $rightVal) {
            $k = 0;
            $chkArrCnt = 0;
            while ($k < $rightArrCnt) {
                if ($rightVal == $A[$k]) {
                    $chkArrCnt++;
                }
                $k++;
            }

            if ($chkArrCnt > $halfRightVal) {
                $rightLeader = $rightVal;
                break;
            }
        }

        if ((int)$leftLeader === (int)$rightLeader) {
            $equalVal++;
        }
        $i++;
    }

    return $equalVal;
    */
    /*
    $arrCnt = count($A);
    $leftArr = array();
    $equalVal = 0;

    $i=0;
    while ($i < $arrCnt) {
        $leftLeader = 0;
        $rightLeader = 0;    
        $leftArr[] = array_shift($A);
        //var_dump($leftArr);
        //var_dump($A);
        $halfLeftVal = floor(count($leftArr)/2);
        foreach ($leftArr as $leftVal) {
            //echo "leftVal -> ".$leftVal.PHP_EOL;
            $j = 0;
            $chkArrCnt = 0;
            while ($j < count($leftArr)) {
                if ($leftVal == $leftArr[$j]) {
                    $chkArrCnt++;
                }
                $j++;
            }

            //echo "chkArrCnt -> ".$chkArrCnt." & halfLeftVal -> ".$halfLeftVal.PHP_EOL;
            if ($chkArrCnt > $halfLeftVal) {
                //echo "checking leftLeader -> ".$leftLeader.PHP_EOL;
                $leftLeader = $leftVal;
                break;
            }
        }

        $halfRightVal = floor(count($A)/2);
        foreach ($A as $rightVal) {
            //echo "rightVal -> ".$rightVal.PHP_EOL;
            $k = 0;
            $chkArrCnt = 0;
            while ($k < count($A)) {
                if ($rightVal == $A[$k]) {
                    $chkArrCnt++;
                }
                $k++;
            }

            //echo "chkArrCnt -> ".$chkArrCnt." & halfRightVal -> ".$halfRightVal.PHP_EOL;
            if ($chkArrCnt > $halfRightVal) {
                //echo "checking rightLeader -> ".$rightLeader.PHP_EOL;
                $rightLeader = $rightVal;
                break;
            }
        }

        if (($leftLeader > 0 && $rightLeader > 0) && ($leftLeader == $rightLeader)) {
            //echo "update equalVal!!!! leftLeader -> ".$leftLeader." & rightLeader -> ".$rightLeader.PHP_EOL;
            $equalVal++;
        }
        $i++;
    }

    return $equalVal;
    */
}
var_dump(solution([4, 4, 2, 5, 3, 4, 4, 4]));
//var_dump(solution([4,3,4,4,4,2]));
//var_dump(solution([0,0]));

/*
A non-empty array A consisting of N integers is given.

The leader of this array is the value that occurs in more than half of the elements of A.

An equi leader is an index S such that 0 ≤ S < N − 1 and two sequences A[0], A[1], ..., A[S] and A[S + 1], A[S + 2], ..., A[N − 1] have leaders of the same value.

For example, given array A such that:

    A[0] = 4
    A[1] = 3
    A[2] = 4
    A[3] = 4
    A[4] = 4
    A[5] = 2
we can find two equi leaders:

0, because sequences: (4) and (3, 4, 4, 4, 2) have the same leader, whose value is 4.
2, because sequences: (4, 3, 4) and (4, 4, 2) have the same leader, whose value is 4.
The goal is to count the number of equi leaders.

Write a function:

function solution($A);

that, given a non-empty array A consisting of N integers, returns the number of equi leaders.

For example, given:

    A[0] = 4
    A[1] = 3
    A[2] = 4
    A[3] = 4
    A[4] = 4
    A[5] = 2
the function should return 2, as explained above.

Write an efficient algorithm for the following assumptions:

N is an integer within the range [1..100,000];
each element of array A is an integer within the range [−1,000,000,000..1,000,000,000].
*/
?>