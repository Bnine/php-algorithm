<?php
/**
 * Lesson 7-1 : Brackets
 * 
 * @Total score: 100%
 * 
 * Task: 100%
 * Correctness: 100%
 * Performance: 100%
 * 
 * @Detected time complexity: O(N)
 * @Link: https://app.codility.com/demo/results/trainingZG4NUZ-HMA/
 */
function solution($S) {
    //처음에 문제를 잘못 생각함....
    $strLength = strlen($S);
    if ($strLength % 2 != 0) {
        return 0;
    }

    $chkArr = array(
        '-1' => '(',
        '-2' => '{',
        '-3' => '[',
        '1' => ')',
        '2' => '}',
        '3' => ']',
    );    

    $stringArr = array();
    for ($i=0; $i<$strLength; $i++) {
        $startKey = array_search(substr($S, $i, 1), $chkArr);
        $arrCnt = count($stringArr);
        if ($arrCnt === 0 && $startKey > 0) {
            return 0;
        }

        if ($arrCnt === 0) {
            $stringArr[0] = $startKey;
        } else {
            if ($stringArr[$arrCnt-1] + $startKey === 0) {
                array_pop($stringArr);
            } else {
                $stringArr[] = $startKey;
            }
        }
    }

    if (count($stringArr) === 0) {
        return 1;
    } else {
        return 0;
    }

    /*
    $strLength = strlen($S);
    if ($strLength % 2 != 0) {
        return 0;
    }

    $chkArr = ['(', '{', '[', ')', '}',']'];
    
    for ($i=0;$i<$strLength/2;$i++) {
        //$strArr[] = substr($S, $i, 1);

        //$startStr = substr($S, $i, 1);
        //$endStr = substr($S, ($strLength - 1) - $i, 1);
        // "startStr -> ".$startStr." & endStr -> ".$endStr.PHP_EOL;
        $startKey = array_search(substr($S, $i, 1), $chkArr);
        $endKey = array_search(substr($S, ($strLength - 1) - $i, 1), $chkArr);
        //echo "startKey -> ".$startKey." & endKey -> ".$endKey.PHP_EOL;
        if ($startKey - 3 === $endKey || $startKey === $endKey - 3) {
            continue;
        } else {
            return 0;
        }
    }

    return 1;
    */
    /*
    $strLength = strlen($S);
    if ($strLength === 0) {
        return 0;
    }

    if ($strLength % 2 != 0) {
        return 0;
    }

    $chkArr = ['(', '{', '[', ')', '}',']'];
    
    for ($i=0;$i<$strLength;$i++) {
        $strArr[] = substr($S, $i, 1);
    }
    
    $resultArr = array();
    foreach ($strArr as $val) {
        $searchedKey = array_search($val, $chkArr);
        //echo "searchedKey -> ".$searchedKey.PHP_EOL;
        $resultKey = $searchedKey > 2 ? $searchedKey - 3 : $searchedKey;
        //echo "resultKey -> ".$resultKey.PHP_EOL;
        if (isset($resultArr[$resultKey])) {
            //echo "plus value".PHP_EOL;
            $resultArr[$resultKey]++;
        } else {
            //echo "setting value".PHP_EOL;
            $resultArr[$resultKey] = 1;
        }
    }
    //var_dump($resultArr);
    foreach ($resultArr as $val) {
        if ($val % 2 != 0) {
            return 0;
        }
    }

    return 1;
    */
}

var_dump(solution("{[()()]}"));
var_dump(solution("([)()]"));
var_dump(solution(''));
var_dump(solution(')('));
/*
A string S consisting of N characters is considered to be properly nested if any of the following conditions is true:

S is empty;
S has the form "(U)" or "[U]" or "{U}" where U is a properly nested string;
S has the form "VW" where V and W are properly nested strings.
For example, the string "{[()()]}" is properly nested but "([)()]" is not.

Write a function:

function solution($S);

that, given a string S consisting of N characters, returns 1 if S is properly nested and 0 otherwise.

For example, given S = "{[()()]}", the function should return 1 and given S = "([)()]", the function should return 0, as explained above.

Write an efficient algorithm for the following assumptions:

N is an integer within the range [0..200,000];
string S is made only of the following characters: '(', '{', '[', ']', '}' and/or ')'.
Copyright 2009–2023 by Codility Limited. All Rights Reserved. Unauthorized copying, publication or disclosure prohibited.
*/
?>