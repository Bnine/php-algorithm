# Codility #Lesson3-3 : TapeEquilibrium
Link : https://app.codility.com/programmers/lessons/3-time_complexity/tape_equilibrium/
## Task Goal
```
Given a non-empty array A of N integers, returns the minimal difference that can be achieved.

For example, consider array A such that:

  A[0] = 3
  A[1] = 1
  A[2] = 2
  A[3] = 4
  A[4] = 3

We can split this tape in four places:

P = 1, difference = |3 − 10| = 7
P = 2, difference = |4 − 9| = 5
P = 3, difference = |6 − 7| = 1
P = 4, difference = |10 − 3| = 7

the function should return 1, as explained above.

Write an efficient algorithm for the following assumptions:

N is an integer within the range [2..100,000];
each element of array A is an integer within the range [−1,000..1,000].
```
```
비어있지 않은 배열A는 N개의 정수로 이루어져 있다.
해당 배열A를 이용하여 첫번째부분(A[0], A[1], ..., A[P − 1])과 두번째부분(A[P], A[P + 1], ..., A[N − 1])의 절대값 차이가 가장 작은 수는 무엇인가?

예) 
1. A[0] - (A[1] + A[2] + A[3] + A[4]) -> 3 - 10 = 7(절대값)

2. (A[0] + A[1]) - (A[2] + A[3] + A[4]) -> 4 - 9 = 5(절대값)

3. (A[0] + A[1] + A[2]) - (A[3] + A[4]) -> 6 - 7 = 1(절대값)

4. (A[0] + A[1] + A[2] + A[3]) - A[4] -> 10 - 3 = 7(절대값)
```
```
空いてない配列Aは整数のN個で構成されています。
該当配列Aを利用して一番目のパート(A[0], A[1], ..., A[P − 1])と 二番目のパート(A[P], A[P + 1], ..., A[N − 1])の一番小さい絶対値は何ですか？

例) 
1. A[0] - (A[1] + A[2] + A[3] + A[4]) -> 3 - 10 = 7(絶対値)

2. (A[0] + A[1]) - (A[2] + A[3] + A[4]) -> 4 - 9 = 5(絶対値)

3. (A[0] + A[1] + A[2]) - (A[3] + A[4]) -> 6 - 7 = 1(絶対値)

4. (A[0] + A[1] + A[2] + A[3]) - A[4] -> 10 - 3 = 7(絶対値)
```
## How to solve(1st time).
```
1. 우선 배열A의 모든 값을 array_sum() 함수를 통해 구한다.
2. Loop문을 통해 차례대로 previousVal에 더해주고 1번에서 구한 remainingVal을 뺀다.
3. 2번에서 구한 previousVal와 remainingVal의 차이를 abs() 함수를 통해 절대값으로 tapeArr[] 배열에 넣어 준다.
4. Loop는 끝까지 돌 필요가 없기에 N-1 까지만 반복한다.
5. min() 함수를 사용하여 tapeArr[] 베열에서 가장 작은 수를 반환한다.
```
```
1. まず、array_sum()関数を通して配列Aの値を全部加えます。
2. 反復文を通して順番に配列A[N]の値をpreviousValに加えて、一番で加えたremainingValで配列A[N]の値を引きます。
3. 二番のpreviousValとremainingValの違さをabs()関数を通して絶対値をtapeArr[]配列に入れます。
4. 今度の反復文は最後まで反復する必要がないので、N-1まで反復します。
5. min()関数を通してtapeArr[]配列の一番小さい数を返します。
```
## Code(1st time).
```php
function solution($A) {
    $arrCnt = count($A);
    $tapeArr = array();
    $previousVal = 0;
    $remainingVal = array_sum($A);
    
    for ($i = 0;$i < $arrCnt-1;$i++) {
        $previousVal += $A[$i];
        $remainingVal -= $A[$i];

        $tapeArr[] = abs($previousVal - $remainingVal);
    }

    return min($tapeArr);
}
```
## Result
 * Lesson 3-3 : TapeEquilibrium
 * 
 * @Total score: 100%
 * 
 * Task: 100%
 * Correctness: 100%
 * Performance: 100%
 * 
 * @Detected time complexity: O(N)
 * @Link: https://app.codility.com/demo/results/trainingQURTM3-5HU/
## Comment
> abs() 함수를 이용하여 절대값을 구하는 것과 min() 함수를 이용해 배열의 가장 작은 값을 반환하는 컨셉으로 손쉽게 구현이 가능 했다.
