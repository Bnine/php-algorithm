# Codility #Lesson4-1 : FrogRiverOne
Link : https://app.codility.com/programmers/lessons/4-counting_elements/frog_river_one/
## Task Goal
```
A small frog wants to get to the other side of a river. The frog is initially located on one bank of the river (position 0) and wants to get to the opposite bank (position X+1). Leaves fall from a tree onto the surface of the river.

You are given an array A consisting of N integers representing the falling leaves. A[K] represents the position where one leaf falls at time K, measured in seconds.

The goal is to find the earliest time when the frog can jump to the other side of the river. The frog can cross only when leaves appear at every position across the river from 1 to X (that is, we want to find the earliest moment when all the positions from 1 to X are covered by leaves). You may assume that the speed of the current in the river is negligibly small, i.e. the leaves do not change their positions once they fall in the river.

Write a function:

function solution($X, $A);

that, given a non-empty array A consisting of N integers and integer X, returns the earliest time when the frog can jump to the other side of the river.

If the frog is never able to jump to the other side of the river, the function should return −1.

For example, given X = 5 and array A such that:

  A[0] = 1
  A[1] = 3
  A[2] = 1
  A[3] = 4
  A[4] = 2
  A[5] = 3
  A[6] = 5
  A[7] = 4

the function should return 6, because In second 6, a leaf falls into position 5. 
This is the earliest time when leaves appear in every position across the river.

Write an efficient algorithm for the following assumptions:

N and X are integers within the range [1..100,000];
each element of array A is an integer within the range [1..X].
```
```
N개로 이루어진 배열A와 도착점 X가 주어진다.
개구리는 강물 위에 나뭇잎(배열A[N]의 값)이 도착점 X의 값까지 전부 떨어지면 건널 수 있고
만약 개구리가 도착점 X에 도착 할 수 없는 경우에는 1을 반환한다.

예)
A[0] -> 1
나뭇잎의 위치 -> 1
A[1] -> 3
나뭇잎의 위치 -> 1,3
A[2] -> 1
나뭇잎의 위치 -> 1,3
A[3] -> 4
나뭇잎의 위치 -> 1,3,4
A[4] -> 2 
나뭇잎의 위치 -> 1,2,3,4
A[5] -> 3
나뭇잎의 위치 -> 1,2,3,4
A[6] -> 5
나뭇잎의 위치 -> 1,2,3,4,5(가즈아~~~~~!)
```
```
N個の整数で構成されている配列Aと到着点Xが与えられます。
カエルは川の上に木の葉が全部落ちたら、川を渡ることができます。
もし、川を渡ることができなかったら1を返しましょう。

例)
A[0] -> 1
木の葉の位置 -> 1
A[1] -> 3
木の葉の位置 -> 1,3
A[2] -> 1
木の葉の位置 -> 1,3
A[3] -> 4
木の葉の位置 -> 1,3,4
A[4] -> 2 
木の葉の位置 -> 1,2,3,4
A[5] -> 3
木の葉の位置 -> 1,2,3,4
A[6] -> 5
木の葉の位置 -> 1,2,3,4,5(よし！行くぞ！！！)
```
## How to solve(1st time).
```
1. 우선 currentArr[] 배열과 currentPosition 변수를 만든다.
2. currentArr[배열A[N]의 값]의 형대로 배열을 만들 예정.
3. Loop문을 통해 array_key_exists() 함수를 사용하여 currentArr[] 중복이 있는 지 확인한다.
4. 중복되지 않은 경우 currentArr[] 배열에 배열A의 값을 key값으로 넣어서 배열을 만들고 currentPosition을 1을 더한다.
5. currentPosition의 값과 도착점 X의 값이 같을 경우 배열A[N]의 key값을 반환한다.
6. Loop가 끝날 때 까지 return이 되지 않았다면, 그냥 -1을 반환한다.
```
```
1. まず、currentArr[]配列とcurrentPosition変数を作ります。
2. currentArr[]はcurrentArr[配列A[N]の値]この形で作る予定です。
3. 反復文を通してarray_key_exists()関数を通してcurrentArr[]に重複があるかどうか確認します。
4. 重複ない場合はcurrentArr[]配列に配列Aの値をkeyに入れて配列を作ってcurrentPosition+1します。
5. currentPositionの値と到着点Xの値と同じになったら配列Aのkeyを返します。
6. 反復文が終わるまで何も返さなかったら-1を返します。
```
## Code(1st time).
```php
function solution($X, $A) {
    $currentPosition = 0;
    $currentArr = array();
    foreach ($A as $key=>$val) {
        //echo "key -> ".$key." & val -> ".$val.PHP_EOL; 
        if (!array_key_exists($val, $currentArr)) {
            $currentArr[$val] = 0;
            $currentPosition++;
        }

        if ($currentPosition === $X) {
            //echo "frog can cross the river! key -> ".$key.PHP_EOL; 
            return $key;
        }
    }

    return -1;
}
```
## Result
 * Lesson 4-1 : FrogRiverOne
 * 
 * @Total score: 100%
 * 
 * Task: 100%
 * Correctness: 100%
 * Performance: 100%
 * 
 * @Detected time complexity: O(N)
 * @Link: https://app.codility.com/demo/results/trainingNU8ZRW-3YN/
## Comment
> 이번 레슨은 알고리즘 구현보다 문제 이해하는게 더 헷갈렸다...  
> 문제만 잘 이해한다면 어렵지 않게 구현이 가능한 수준 인듯!  
