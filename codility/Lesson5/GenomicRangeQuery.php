<?php
/**
 * Lesson 5-3 : GenomicRangeQuery
 * 
 * @Total score: 100%
 * 
 * Task: 100%
 * Correctness: 100%
 * Performance: 100%
 * 
 * @Detected time complexity: O(N + M)
 * @Link: https://app.codility.com/demo/results/training3NCTRB-EKC/
 */
function solution($S, $P, $Q) {
    $dnaArr = array(
        'A' => 1, 
        'C' => 2,
        'G' => 3,
        'T' => 4
    );

    $arrCnt = count($P);
    $chkStringArr = array();
    $returnArr = array();
    for ($i=0;$i<$arrCnt;$i++) {
        $chkStringArr = substr($S, $P[$i], ($Q[$i]-$P[$i])+1);
        foreach ($dnaArr as $key => $val) {
            if (strpos($chkStringArr, $key) !== false) {
                $returnArr[] = $val;
                break;
            }
        }
    }

    return $returnArr;
}

var_dump(solution('CAGCCTA', [2,5,0], [4,5,6]));
?>