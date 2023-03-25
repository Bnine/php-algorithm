<?php
/**
 * Lesson 7-3 : Nesting
 * 
 * @Total score: 100%
 * 
 * Task: 100%
 * Correctness: 100%
 * Performance: 100%
 * 
 * @Detected time complexity: O(N)
 * @Link: https://app.codility.com/demo/results/training5J8Z75-KBH/
 */
function solution($S) {
    //뭐지...? 7-1 테스트가 더 어려웠던거 같은데...
    $arrCnt = strlen($S);
    
    $chkArr = array(
        0 => "(",
        1 => ")"
    );
    $strArr = array();
    for ($i=0;$i<$arrCnt;$i++) {
        $strArrCnt = count($strArr);
        $chkStr = array_search(substr($S, $i, 1), $chkArr);
        if ($strArrCnt > 0) {
            if ($strArr[$strArrCnt - 1] === $chkStr) {
                $strArr[] = $chkStr;
            } else {
                array_pop($strArr);
            }
        } else {
            if ($chkStr === 1) {
                return 0;
            }
            $strArr[] = $chkStr;
        }
    }

    if (count($strArr) === 0) {
        return 1;
    } else {
        return 0;
    }
}

var_dump(solution("())"));
/*
A string S consisting of N characters is called properly nested if:

S is empty;
S has the form "(U)" where U is a properly nested string;
S has the form "VW" where V and W are properly nested strings.
For example, string "(()(())())" is properly nested but string "())" isn't.

Write a function:

function solution($S);

that, given a string S consisting of N characters, returns 1 if string S is properly nested and 0 otherwise.

For example, given S = "(()(())())", the function should return 1 and given S = "())", the function should return 0, as explained above.

Write an efficient algorithm for the following assumptions:

N is an integer within the range [0..1,000,000];
string S is made only of the characters '(' and/or ')'.
Copyright 2009–2023 by Codility Limited. All Rights Reserved. Unauthorized copying, publication or disclosure prohibited.

*/
?>