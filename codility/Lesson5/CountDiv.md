# Codility #Lesson5-2 : CountDiv
Link : https://app.codility.com/programmers/lessons/5-prefix_sums/count_div/
## Task Goal
```
Write a function:

function solution($A, $B, $K);

that, given three integers A, B and K, returns the number of integers within the range [A..B] that are divisible by K, i.e.:

{ i : A ≤ i ≤ B, i mod K = 0 }

For example, for A = 6, B = 11 and K = 2, your function should return 3, because there are three numbers divisible by 2 within the range [6..11], namely 6, 8 and 10.

Write an efficient algorithm for the following assumptions:

A and B are integers within the range [0..2,000,000,000];
K is an integer within the range [1..2,000,000,000];
A ≤ B.
```
```
3개의 정수 A,B,K가 주어진다.

A ~ B 사이의 값을 K로 나눴을 때 나눠지는 정수의 갯수를 반환하라.
```
```
A,B,Kの三つの整数が与えられる。

A〜Bの間の値をKで割れる整数の数を返します。
```
## How to solve(1st time).
```
#첫번쨰 시도는 총 50%
1. 뭐...일단 설명대로 A-B사이를 Loop를 돌려서 K로 나눠지는 것을 증가시켜서 반환 시켜 봅시다.
2. 당연히 퍼포먼스는 안 나오겠지만...
3. 가즈아!
```
```
#一番目は50%
1. え。。。まぁ反復文を通して１回挑戦しましょう。
2. まぁ。。。パフォーマンスは。。。笑
```
## Code(1st time).
```php
function solution($A, $B, $K) {
    if ($B < $A) {
        return 0;
    }
    
    $divCount = 0;
    for ($i=$A;$i<=$B;$i++) {
        if (($i % $K) === 0) {
            $divCount++;
        }
    }

    return $divCount;
}
```
## Result
 * Lesson 5-2 : CountDiv
 * 
 * @Total score: 50%
 * 
 * Task: 50%
 * Correctness: 100%
 * Performance: 0%
 * 
 * @Detected time complexity: O(B-A)
 * @Link: https://app.codility.com/demo/results/trainingG4KX6H-BWX/
## How to solve(2nd time).
```
1. 당연히 될 턱이 없다.
2. 근데 가만히 생각해보니 만약 A가 0이고 B가 10일때 K가 2면 2,4,6,8,10이다.
3. 다시말해 10/2 = 5 <- 이거랑 같다.
4. 그럼 그냥 B/K의 값에 A/K의 값을 빼면 사이 값이 구해진다는 소리!
5. 다만 A의 경우 K로 나눠질 경우에 +1을 증가시키면 된다.
```
```
1. うまくできるはずがない！笑
2. でも、ちょっと考えみたら、もしAが0でBが10の時、kが2なら、２、４、６、８、１０だ。
3. 言い換えれば、10/2 = 5 <- その意味！
4. B/Kの値にA/Kの値を引けば正しい値が得られると言うことです！
5. もし、AがKで割れる場合は+1を増えましょう。
```
## Code(2nd time).
```php
function solution($A, $B, $K) {
    if ($B < $A) {
        return 0;
    }
    
    //available mod between $B and $A
    $betweenVal = (int)floor($B/$K) - (int)floor($A/$K);

    if ($A % $K === 0) {
        $betweenVal++;
    }

    return $betweenVal;
}
```
## Result
 * Lesson 5-2 : CountDiv
 * 
 * @Total score: 100%
 * 
 * Task: 100%
 * Correctness: 100%
 * Performance: 100%
 * 
 * @Detected time complexity: O(1)
 * @Link: https://app.codility.com/demo/results/trainingMDUVP9-HAA/
## Comment
> 다시 한번 수학책을 펼쳐야 할 시간이 온 것 같다....
