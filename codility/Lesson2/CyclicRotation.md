# Codility #Lesson2-1 : CyclicRotation
Link : https://app.codility.com/programmers/lessons/2-arrays/cyclic_rotation/
## Task Goal
```
array A와 K가 주어졌을때, K의 수만큼 배열의 값을 로테이션하는 로직을 만들어라.
로테이션은 맨 뒤의 숫자가 맨 앞으로 이동한다.
```
```
The goal is to rotate array A K times; that is, each element of A will be shifted to the right K times.
```
## How to solve
```
1. Array 데이터를 먼저 validation 하여 미리 쳐 낼 수 있는 값은 미리 구별하여 return
2. 예를 들어 Array의 값이 모두 같은 경우 및 Array 사이즈랑 $K가 같은 경우는 주어진 Array 그대로 Return
3. Array 사이즈가 $K보다 큰 경우에는 array를 $K의 값에 맞게 짤라서 array_merge() 후 Return
4. 3번의 조건에 맞는 않는 경우에는 Loop문을 통해 맨 뒤에서 부터 $K의 값에 맞게 Array를 가공 후에 Loop가 끝 난 후 Return 한다.
```
## Code
```php
function solution($A, $K) {
    //Is array created with same values?
    if (count(array_unique($A)) === 1) {
        return $A;
    }

    //Are array size and $K value same?
    $cntArr = count($A);
    if ($cntArr === $K) {
        return $A;
    }

    //When $K is less than $A array size
    if ($cntArr > $K) {
        $rotatedNumber = array_slice($A, -$K, $K);
        //var_dump($rotatedNumber);
        $remainNumber = array_slice($A, 0, $cntArr - $K);
        //var_dump($remainNumber);
        return array_merge($rotatedNumber,$remainNumber);
    } else {
        $mergedArr = $A;
        for ($i = 0; $i < $K; $i++) {
            $rotatedNumber = array_slice($mergedArr, -1, 1);
            $remainNumber = array_slice($mergedArr, 0, $cntArr - 1);

            $mergedArr = array_merge($rotatedNumber, $remainNumber);
        }

        return $mergedArr;
    }
}
```
## Result
 * Lesson 2-1 : CyclicRotation
 * 
 * @Total score: 100%
 * 
 * Task: 100%
 * Correctness: 100%
 * Performance: Not assessed
 * 
 * @Detected time complexity: Not assessed
 * @Link: [Result](https://app.codility.com/demo/results/trainingX5PGX9-448/)
## Comment
> 이번 챕터 역시 Array에 친숙하고 각 언어별 Array 내장 함수만 알고 있다면 크게 문제 없이 풀이가 가능한 수준
