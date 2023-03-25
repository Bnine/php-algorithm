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
 * @Detected time complexity: O(N)
 * @Link: https://app.codility.com/demo/results/trainingCQPR7K-RVV/
 */
function solution($H) {    
    //루프 돌릴때마다 array_sum으로 퍼포먼스에 악영향이 있었음
    //array_sum 없이, 현재 돌의 높이 구하는 totalHeight 추가
    $arrCnt = count($H);
    $totalHeight = 0;
    $blockArr = array();
    $newBlock = 0;
    for ($i = 0; $i < $arrCnt; $i++) {
        //echo "i -> ".$i." & val -> ".$H[$i]." & totalHeight -> ".$totalHeight.PHP_EOL;
        $blockArrCnt = count($blockArr);
        if ($blockArrCnt === 0) {
            $blockArr[] = $H[$i];
            $totalHeight = $H[$i];
            $newBlock++;
        } else {
            for ($j=$blockArrCnt-1; $j >= -1; $j--) {
                //echo "totalHeight -> ".$totalHeight.PHP_EOL;
                if ($totalHeight == $H[$i]) {
                    //echo "Same Height Break!".PHP_EOL;
                    break;
                } else {
                    if ($totalHeight > $H[$i]) {
                        $totalHeight = $totalHeight - $blockArr[$j];
                        array_pop($blockArr);
                    } else {
                        $blockArr[] = $H[$i] - $totalHeight;
                        $totalHeight = $H[$i];
                        $newBlock++;
                        break;
                    }
                }
            }
        }
    }

    return $newBlock;

    //정확도는 100%인데 
    //퍼포먼스 점수가 낮은 걸 보니 어딘가에 삽질 했나봄
    //다시 가자
    //Task 85
    //Correctness 100
    //Performance 77
    //O(N ** 2)
    /*
    $arrCnt = count($H);
    $blockArr = array();
    $totalBlock = 0;
    $newBlock = 0;
    for ($i = 0; $i < $arrCnt; $i++) {
        echo "i -> ".$i." & val -> ".$H[$i]." & totalHeight -> ".array_sum($blockArr).PHP_EOL;
        $blockArrCnt = count($blockArr);
        if ($blockArrCnt === 0) {
            $blockArr[] = $H[$i];
            $newBlock++;
        } else {
            for ($j=$blockArrCnt; $j >= 0; $j--) {
                $totalBlock = array_sum($blockArr);
                //echo "blockArr -> ".$blockArr[$j].PHP_EOL;
                echo "totalBlock -> ".$totalBlock.PHP_EOL;
                if ($totalBlock === $H[$i]) {
                    break;
                } else {
                    if ($totalBlock > $H[$i]) {
                        array_pop($blockArr);
                    } else {
                        $blockArr[] = $H[$i] - $totalBlock;
                        $newBlock++;
                        break;
                    }
                }
            }
        }
    }
    
    return $newBlock;
    */
}

var_dump(solution([8,8,5,7,9,8,7,4,8]));
/*
You are going to build a stone wall. The wall should be straight and N meters long, and its thickness should be constant; however, it should have different heights in different places. The height of the wall is specified by an array H of N positive integers. H[I] is the height of the wall from I to I+1 meters to the right of its left end. In particular, H[0] is the height of the wall's left end and H[N−1] is the height of the wall's right end.

The wall should be built of cuboid stone blocks (that is, all sides of such blocks are rectangular). Your task is to compute the minimum number of blocks needed to build the wall.

Write a function:

function solution($H);

that, given an array H of N positive integers specifying the height of the wall, returns the minimum number of blocks needed to build it.

For example, given array H containing N = 9 integers:

  H[0] = 8    H[1] = 8    H[2] = 5
  H[3] = 7    H[4] = 9    H[5] = 8
  H[6] = 7    H[7] = 4    H[8] = 8
the function should return 7. The figure shows one possible arrangement of seven blocks.



Write an efficient algorithm for the following assumptions:

N is an integer within the range [1..100,000];
each element of array H is an integer within the range [1..1,000,000,000].
Copyright 2009–2023 by Codility Limited. All Rights Reserved. Unauthorized copying, publication or disclosure prohibited.
*/
?>