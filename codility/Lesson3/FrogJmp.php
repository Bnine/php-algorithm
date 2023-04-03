<?php
/**
 * Lesson 3-1 : FrogJmp
 * 
 * @Total score: 100%
 * 
 * Task: 100%
 * Correctness: 100%
 * Performance: 100%
 * 
 * @Detected time complexity: O(1)
 * @Link: https://app.codility.com/demo/results/training67KWX9-U3T/
 */
function solution($X, $Y, $D) {
    if ($X === $Y) {
        return 0;
    }

    $remainingDistance =  $Y - $X;

    if ($remainingDistance <= $D) {
        return 1;
    }

    return (int)ceil($remainingDistance / $D);
}

var_dump(solution(10, 10, 10));
?>