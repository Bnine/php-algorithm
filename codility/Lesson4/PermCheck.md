# Codility #Lesson4-2 : PermCheck
Link : https://app.codility.com/programmers/lessons/4-counting_elements/perm_check/
## Task Goal
```
The goal is to check whether array A is a permutation.

Write a function:

function solution($A);

that, given an array A, returns 1 if array A is a permutation and 0 if it is not.

For example, given array A such that:

    A[0] = 4
    A[1] = 1
    A[2] = 3
    A[3] = 2

is a permutation.
the function should return 1.

Given array A such that:

    A[0] = 4
    A[1] = 1
    A[2] = 3

is not a permutation, because value 2 is missing. 
the function should return 0.

Write an efficient algorithm for the following assumptions:

N is an integer within the range [1..100,000];
each element of array A is an integer within the range [1..1,000,000,000].
```
```
N개로 이루어진 배열A이 주어진다.
이때 배열A의 값이 순열이라면 1을 반환하고 그렇지 않으면 0을 반환하라.

예1) [4,1,3,2] -> 1,2,3,4(순열)
예2) [4,1,3,] -> 1,(2가 없다)3,4(2가 없으므로 순열이 아니다)
```
```
N個の整数で構成されている配列Aが与えられます。
この配列Aが順列なら1をなかったら0を返します。

例1) [4,1,3,2] -> 1,2,3,4(順列)
例2) [4,1,3,] -> 1,(2が無し)3,4(2がないので順列じゃないです)
```
## How to solve(1st time).
```
1. 우선 순열이기 때문에 배열A가 1부터 시작하는지 min()함수로 확인해서 1이 아닌 경우 0을 반환한다.
2. sort()함수를 통해 배열A를 오름차순으로 정렬한다.
3. checkingVal 변수를 만들고 Loop문으로 배열A의 값을 확인한다.
4. 이때 checkingVal 변수도 1씩 더해주면서 배열A의 값과 일치 하지 않을 때는 순열이 아니므로 0을 반환한다.
5. 마지막까지 Loop문이 동작 했다면 배열A는 순열이므로 1을 반환한다.
```
```
1. まず、配列Aが順列かどうかを確認するため、min()関数を通して値が1じゃない場合は0を返します。
2. sort()関数を通して昇順で整列します。
3. checkingVal変数を作って反復文で配列Aの値を確認します。
4. この時、checkingValも+1して、配列Aの値と比べて違うなら順列じゃないので0を返します。
5. 最後まで反復文が動作したら、配列Aは順列だから1を返します。
```
## Code(1st time).
```php
function solution($A) {
    if (min($A) !== 1) {
        //echo "array didn't meet condition. passed(not started with 1)".PHP_EOL; 
        return 0;
    }

    sort($A);
    $checkingVal = $A[0];
    foreach ($A as $val) {
        if ($checkingVal !== $val) {
            //echo "found missing value. checkingVal -> ".$checkingVal." & val -> ".$val.PHP_EOL; 
            return 0;
        }
        $checkingVal++;
    }

    return 1;
}
```
## Result
 * Lesson 4-2 : PermCheck
 * 
 * @Total score: 100%
 * 
 * Task: 100%
 * Correctness: 100%
 * Performance: 100%
 * 
 * @Detected time complexity: O(N) or O(N * log(N))
 * @Link: https://app.codility.com/demo/results/training5B8HM6-FW5/
## Comment
> 순열에 대한 이해만 한다면 sort() 함수를 통해 쉽게 구현이 가능한 수준!  
