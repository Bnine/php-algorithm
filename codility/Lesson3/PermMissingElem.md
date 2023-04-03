# Codility #Lesson3-2 : PermMissingElem
Link : https://app.codility.com/programmers/lessons/3-time_complexity/perm_missing_elem/
## Task Goal
```
Given an array A, returns the value of the missing element.

For example, given array A such that:

  A[0] = 2
  A[1] = 3
  A[2] = 1
  A[3] = 5
the function should return 4, as it is the missing element.

Write an efficient algorithm for the following assumptions:

N is an integer within the range [0..100,000];
the elements of A are all distinct;
each element of array A is an integer within the range [1..(N + 1)].
```
```
배열A는 N의 정수의 값을 가지고 있으며 배열A[N]은 [1..(N + 1)]의 값을 가지고 있다.
N은 0 ~ 100,000 사이의 값이다.
배열A의 값은 중복되지 않는 값이다.

예를 들어 [2,3,1,5]의 배열A가 주어졌을때, [1,2,3,(4가 없음!),5] 이므로 4를 반환한다.
```
```
配列Aは整数のN個で構成されています。
配列A[N]は[1..(N + 1)]の値を持っています。
Nは0~100,000間の値です。
配列Aの値は重複していません。

例えば[2,3,1,5]の配列が与えられたら、[1,2,3,(4がなし！),5]で4を返します。
```
## How to solve(1st time).
```
1. 배열A가 empty 일 수도 있기 때문에 count()를 이용해 0인 경우 1을 반환한다.
2. 만약 배열A가 1개이고 배열A[N]의 값이 0, 혹은 1일 경우에는 배열A[N]의 값 + 1를 반환하고 만약 배열A가 1개이고 배열A[N]의 값이 2이상일 경우에는 배열A[N]의 값 - 1을 반환한다.
3. 2번의 경우가 아닐 경우에는 우선 sort()함수를 통해 오름차순으로 정렬한다.
4. Loop문을 통해 배열A[N]의 값과 previousVal의 값과 비교한다.
5. 만약 배열A[N]의 값 - 1가 perviousVal의 값보다 클 경우에는 배열A[N]값 - 1을 반환한다.(previousVal + 1 값을 반환해도 상관 없다.)
6. 5번의 경우가 아니라면 previousVal + 1을 해준다.
7. Loop가 끝까지 돌았다면 previousVal + 1을 반환한다.
```
```
1. まず、配列Aが空いた場合もあるからcount()関数を通して空いた場合は1を返します。
2. もし配列Aが一個で配列A[N]の値が0または1の場合は配列A[N]+1の値を返します。もしNの値が2以上の場合は配列A[N]-1の値を返します。
3. 二番のケースがなかったら、sort()関数を通して昇順で整列します。
4. 反復文を通して配列A[N]とpreviousValの値と比べます。
5. もし配列A[N]の値-1がpreviousValの値より大きい場合は配列A[N]の値-1を返します。(previousVal+1の値を返しても構いません。大丈夫です。)
6. 五番のケースじゃなかったらpreviousVal+1します。
7. 最後まで反復文が終わったら、previousVal+1して返します。
```
## Code(1st time).
```php
function solution($A) {
    //when　array A is empty.
    if (count($A) === 0) {
        return 1;
    }

    //when array A has only 1 element.
    if (count($A) === 1) {
        if ($A[0] <= 1) {
            //if N is 0, return 1
            //if N is 1, return 2
            return $A[0] + 1;
        } else {
            return $A[0] - 1;
        }
    }

    sort($A);
    $previousVal = 0;
    foreach ($A as $val) {
        //if current array A's value is more than (N + 1)
        if (($val - 1) > $previousVal) {
            //echo "more than 1 val -> ".$val." & previousVal -> ".$previousVal.PHP_EOL; 
            return $val-1;
        } else {
            $previousVal++;
        }
    }

    return $previousVal+1;
}
```
## Result
 * Lesson 3-2 : PermMissingElem
 * 
 * @Total score: 100%
 * 
 * Task: 100%
 * Correctness: 100%
 * Performance: 100%
 * 
 * @Detected time complexity: O(N) or O(N * log(N))
 * @Link: https://app.codility.com/demo/results/trainingVJEUHR-JZB/
## Comment
> sort()함수를 통해 오름차순으로 정렬하는 것만 하면 크게 문제 없이 알고리즘 구현이 가능한 수준 인듯 하다.
