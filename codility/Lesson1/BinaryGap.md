# Codility #Lesson1-1 : BinaryGap
Link : https://app.codility.com/programmers/lessons/1-iterations/binary_gap/
## Task Goal
```
Given a positive integer N, returns the length of its longest binary gap.
The function should return 0 if N doesn't contain a binary gap.
```
```
양수로 이루어진 N이 주어지면, 그중 가장 긴 이진간격(Binary Gap)의 길이를 반환한다.  
만약 이진간격(Binary Gap)이 없는 N이라면, 0을 반환하라.
```
```
陽数のNの一番長いバイナリギャップを返す。
もし、Nにバイナリギャップがない場合は、０を返す。
```
## How to solve
```
1. 우선 N을 PHP 내장함수인 decbin()을 통해 이진수로 변경한다.
2. trim() 함수로 앞 뒤로 0으로 이루어진 값을 제거해준다.
3. 그후 explode() 내장함수로 0으로만 이루어진 배열을 만든다.
4. Loop문을 통해 $zeroCnt의 값과 비교하면서 기존 값보다 크면 새로 갱신
5. return $zeroCnt
```
```
1. まず、NをPHPの内蔵関数のdecbin()を使用して二陣数に変更します。
2. trim()内蔵関数を使用して前と後ろの0を除去します。
3. explode()内蔵関数を使用して0で構成している配列を作ります。
4. 反復文を通して$zeroCntのデータと比べて、既存のデータより大きい場合は、$zeroCntのデータを変更します。
5. $zeroCntのデータを返します。
```
## Code
```php
function solution($N) {
    //Change Integer to Binary by PHP API.
    $nVal = decbin($N);
    //var_dump($nVal);

    //Delete 0 value at Start and Back
    $nVal=trim($nVal, "0");
    //var_dump($nVal);

    //Create array with explode() PHP API.
    $nValArr = explode(1, $nVal);
    //var_dump($nValArr);

    $zeroCnt = 0;
    foreach($nValArr as $key => $val) {
        //echo "nValArr key -> ".$key." val -> ".$val.PHP_EOL;
        //Checking Condition.
        //1.Is val more than zeroCnt?
        if ($zeroCnt <= strlen($val)) {
            //echo "update zero counting! zeroCnt ->".$zeroCnt." value length -> ".strlen($val).PHP_EOL;
            $zeroCnt = strlen($val);
        }
    }

    return $zeroCnt;
}
```
## Result
 * Lesson 1-1 : BinaryGap
 * 
 * @Total score: 100%
 * 
 * Task: 100%
 * Correctness: 100%
 * Performance: Not assessed
 * 
 * @Detected time complexity: Not assessed
 * @Link: [Result](https://app.codility.com/demo/results/training4M9NVX-946/)
## Comment
> 적절하게 각 언어들의 내장함수를 이용해서 구현하는데 문제가 없는 수준.  
> 딱히 크게 힘들지 않게 구현
