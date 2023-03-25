<?php
/*
An array A consisting of N integers is given. Rotation of the array means that each element is shifted right by one index, and the last element of the array is moved to the first place. For example, the rotation of array A = [3, 8, 9, 7, 6] is [6, 3, 8, 9, 7] (elements are shifted right by one index and 6 is moved to the first place).

The goal is to rotate array A K times; that is, each element of A will be shifted to the right K times.

Write a function:

function solution($A, $K);

that, given an array A consisting of N integers and an integer K, returns the array A rotated K times.

For example, given

    A = [3, 8, 9, 7, 6]
    K = 3
the function should return [9, 7, 6, 3, 8]. Three rotations were made:

    [3, 8, 9, 7, 6] -> [6, 3, 8, 9, 7]
    [6, 3, 8, 9, 7] -> [7, 6, 3, 8, 9]
    [7, 6, 3, 8, 9] -> [9, 7, 6, 3, 8]
For another example, given

    A = [0, 0, 0]
    K = 1
the function should return [0, 0, 0]

Given

    A = [1, 2, 3, 4]
    K = 4
the function should return [1, 2, 3, 4]

Assume that:

N and K are integers within the range [0..100];
each element of array A is an integer within the range [−1,000..1,000].
In your solution, focus on correctness. The performance of your solution will not be the focus of the assessment.

Copyright 2009–2023 by Codility Limited. All Rights Reserved. Unauthorized copying, publication or disclosure prohibited.

*/

function solution($A, $K) {
    if (count(array_unique($A)) == 1) {
        return $A;
    }

    $cntArr = count($A);
    if ($cntArr == $K) {
        return $A;
    }

    if ($cntArr > $K) {
        $replacedNumber = array_slice($A, -$K, $K);
        $remainNumber = array_slice($A, 0, $cntArr - $K);
        //var_dump($replacedNumber);
        //var_dump($remainNumber);
        return array_merge($replacedNumber,$remainNumber);
    } else {
        $mergedArr = $A;
        for ($i = 0; $i < $K; $i++) {
            $replacedNumber = array_slice($mergedArr, -1, 1);
            $remainNumber = array_slice($mergedArr, 0, $cntArr - 1);

            $mergedArr = array_merge($replacedNumber,$remainNumber);
        }

        return $mergedArr;
    }
}

var_dump(solution([1, 1, 2, 3, 5],6));
?>