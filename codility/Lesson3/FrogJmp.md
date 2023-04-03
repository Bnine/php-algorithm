# Codility #Lesson3-1 : FrogJmp
Link : https://app.codility.com/programmers/lessons/3-time_complexity/frog_jmp/
## Task Goal
```
Given three integers X, Y and D, returns the minimal number of jumps from position X to a position equal to or greater than Y.

For example, given:
  X = 10
  Y = 85
  D = 30
the function should return 3, because the frog will be positioned as follows:

after the first jump, at position 10 + 30 = 40
after the second jump, at position 10 + 30 + 30 = 70
after the third jump, at position 10 + 30 + 30 + 30 = 100

Write an efficient algorithm for the following assumptions:

X, Y and D are integers within the range [1..1,000,000,000];
X ≤ Y.
```
```
X, Y, Z 세개의 정수가 주어지며 각각 X는 시작점, Y는 도착점 그리고 Z는 개구리가 점프 할 수 있는 거리이다.
시작점(X)에서 도착점(Y)까지 몇번을 점프해야 도착 혹은 도착점을 넘어 갈 수 있는가?
```
```
X、Y、Z　三個の整数が与えられて、Xは出発点、Yは到着点、Zはカエルのジャンプ力の長さです。
出発点(X)から到着点(Y)まで何度をジャンプしたら到着できますか？
```
## How to solve(1st time).
```
1. 우선 X <= Y 경우 중 X == Y 경우가 있을 수 있으므로, 같은 경우 0을 return 한다.
2. Y - X를 통해 남은 거리를 계산한다.
3. 2번에서 계산한 거리가 Z보다 작거나 같을 경우 1을 return 한다.
4. 남은 거리가 Z보다 큰 경우는 남은 거리 / Z를 통한 값을 ceil() 함수로 소숫점 올림 처리를 해서 return 한다.
```
```
1. まず、X <= Y の場合はXとYの整数が同じケースもあるので、同じケースなら０を返します。
2. Y ー Xを通して、残余距離を計算します。
3. 二番の残余距離がZより小さいまたは同じケースなら１を返します。
4. 残余距離がZより大きい場合は残余距離 / Zを通してceil()関数を使って値を返します。
```
## Code(1st time).
```php
function solution($X, $Y, $D) {
    if ($X == $Y) {
        return 0;
    }

    $remainingDistance =  $Y - $X;

    if ($remainingDistance <= $D) {
        return 1;
    }

    return (int)ceil($remainingDistance / $D);
}
```
## Result
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
## Comment
> 이번 레슨도 편-안.  
> 소숫점 올림 내장함수만 알면 크게 무리 없이 구현이 가능한 정도 인듯 하다.  
