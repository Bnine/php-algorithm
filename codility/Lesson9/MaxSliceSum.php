<?php
function solution($A) {
    $arrCnt = count($A);
    $maxiumVal = $A[0];
    $sum = $A[0];
    for ($i=1;$i<$arrCnt;$i++) {
        $sum = max(array($A[$i], $sum+$A[$i])); //현재 어레이까지의 부분합 구하는 알고리즘
        $maxiumVal = max(array($maxiumVal, $sum)); //전체 합중 가장 큰 값 구하는 알고리즘
    }

    return $maxiumVal;
}

var_dump(solution([3,2,-6,4,0]));
var_dump(solution([10]));
?>