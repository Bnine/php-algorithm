# Codility #Lesson5-1 : PassingCars
Link : https://app.codility.com/programmers/lessons/5-prefix_sums/passing_cars/
## Task Goal
```
Write a function:

function solution($A);

that, given a non-empty array A of N integers, returns the number of pairs of passing cars.

The function should return −1 if the number of pairs of passing cars exceeds 1,000,000,000.

Array A contains only 0s and/or 1s:

0 represents a car traveling east,
1 represents a car traveling west.
The goal is to count passing cars. We say that a pair of cars (P, Q), where 0 ≤ P < Q < N, is passing when P is traveling to the east and Q is traveling to the west.

For example, consider array A such that:

  A[0] = 0
  A[1] = 1
  A[2] = 0
  A[3] = 1
  A[4] = 1
We have five pairs of passing cars: (0, 1), (0, 3), (0, 4), (2, 3), (2, 4).

the function should return 5, as explained above.

Write an efficient algorithm for the following assumptions:

N is an integer within the range [1..100,000];
each element of array A is an integer that can have one of the following values: 0, 1.
```
```
N개로 이루어진 배열[A]가 주어진다.
지나가는 차의 짝을 지어서 총 몇대가 지나 갔는지를 반환하라.

배열A는 오직 0 혹은 1의 값만 가지며,
0은 동쪽으로 가는 차이며, 1은 서쪽으로 가는 차이다.

차의 짝은 (P, Q)로 구성되며 0 ≤ P < Q < N의 공식이다. 
여기서 P는 동쪽으로 가는차(0)
Q는 서쪽으로 가는차(1)이다.
```
```
N個の整数で構成されている配列Aが与えられる。
車をペアにしてそのペアの数を返します。

配列Aの値はただ0と1だけで、
0は東の方に行く車(0)、1は西の方に行く車(1)です。

車のペアは(P, Q)で構成され、0 ≤ P < Q < Nの公式です。
ここでPは東の方に行く車(0)、Qは西の方に行く車(1)です。
```
## How to solve(1st time).
```
#첫번쨰 시도는 총 80%
1. eastCarArr, westCarArr배열을 만들어서 0이면 동쪽, 1이면 서쪽으로 가는 차를 배열A의 key값을 넣는다.(0 ≤ P < Q < N)
2. 모든 자동차가 동쪽 혹은 서쪽만 존재하는 경우도 있을 수 있으니 count()함수를 이용해 0을 반환한다.
3. eastCarArr[] 배열을 Loop문을 돌려준다.
4. eastCarArr[] 배열의 값(배열A의key값)이 westCarArr[] 배열의 값(배열A의key값)보다 큰 경우 (0 ≤ P < Q < N) 공식에 의해 짝이 성립되지 않는다.
5. Loop문을 통해 eastCarArr[] 배열의 값(배열A의key값)이 westCarArr[] 배열의 값(배열A의key값)보다 작을 때까지 lessWestCarArrKey 변수를 +1씩 증가 시켜준다.
6. break문을 통해 Loop이 끝난 뒤 array_splice()함수를 통해 westCarArr[] 배열을 lessWestCarArrKey값 만큼 제거한다.
7. 그 후 westCarArr[] 배열의 갯수만큼 계속 carPairCnt를 증가 시켜준다.
```
```
#一番目は80%
1. eastCarArr、 westCarArr配列を作って0なら東、1なら西の車を配列Aのkeyの値を入れます。(0 ≤ P < Q < N)
2. 全ての車が東の方または西の方だけのケースもあるから、count()関数を通して0を返します。
3. eastCarArr[]配列を利用して反復文を作ります。
4. eastCarArr[]配列の値(配列Aのkeyの値)がwestCarArr[]配列の値(配列Aのkeyの値)より大きい場合は(0 ≤ P < Q < N)の公式によってペアが成立できません。
5. 反復文を通してeastCarArr[]配列の値(配列Aのkeyの値)がwestCarArr[]配列の値(配列Aのkeyの値)より小くまでlessWestCarArrKey変数を+1増えします。
6. break文を通して反復文が終わったら、array_splice()関数を通してwestCarArr[]配列をlessWestCarArrKeyの値程除去します。
7. その後、westCarArr[]配列の個数ほどcarPairCntを増えします。
```
## Code(1st time).
```php
function solution($A) {
    $eastCarArr = array();
    $westCarArr = array();
    foreach ($A as $key => $val) {
        if ($val === 0) {
            $eastCarArr[] = $key;
        } else {
            $westCarArr[] = $key;
        }
    }
    
    $eastCarArrCnt = count($eastCarArr);
    $westCarArrCnt = count($westCarArr);
    if ($eastCarArrCnt === 0 || $westCarArrCnt === 0) {
        return 0;
    }
    
    $carPairCnt = 0;
    foreach ($eastCarArr as $val) {
        //echo "eastCarArr-val -> ".$val.PHP_EOL;
        if ($val > $westCarArr[0]) {
            //echo "westCarArr-val is less than eastCarArr-val -> ".$westCarArr[0].PHP_EOL;
            $lessWestCarArrKey = 0;
            foreach ($westCarArr as $westVal) {
                if ($val < $westVal) {
                    //echo "break!".PHP_EOL;
                    break;
                } else {
                    $lessWestCarArrKey++;
                }
            }
            //echo "lessWestCarArrKey -> ".$lessWestCarArrKey.PHP_EOL;
            array_splice($westCarArr, 0, $lessWestCarArrKey);

            if (count($westCarArr) === 0) {
                break;
            }
        }

        $carPairCnt += count($westCarArr);

        if ($carPairCnt > 1000000000) {
            return -1;
        }
    }

    return $carPairCnt;
}
```
## Result
 * Lesson 5-1 : PassingCars
 * 
 * @Total score: 80%
 * 
 * Task: 80%
 * Correctness: 100%
 * Performance: 60%
 * 
 * @Detected time complexity: O(N)
 * @Link: https://app.codility.com/demo/results/trainingZSAHR4-SVB/
## How to solve(2nd time).
```
1. 배열A를 이용해 반복문을 통해 동쪽으로 가는 차일 경우 eastCarCnt변수를 1씩 증가 시킨다.
2. 그 후에 서쪽으로 가는 차를 만난 경우 eastCarCnt 변수값을 carPairCnt변수에 더해준다.
3. carPairCnt변수가 1,000,000,000을 넘을 경우 -1을 반환.
4. 반복문이 끝났다면 carPairCnt 변수를 반환한다.
```
```
1. 配列Aを利用して反復文を通して東の方の車なら、eastCarCnt変数を+1増えします。
2. その後、もし西の方の車なら、eastCarCnt変数の値をcarPairCnt変数に増えします。
3. carPairCnt変数が1,000,000,000より大きいなら-1を返します。
4. 反復文が終わったらcarPairCnt変数を返します。
```
## Code(2nd time).
```php
function solution($A) {
    $carPairCnt = 0;
    $eastCarCnt = 0;
    foreach ($A as $val) {
        if ($val === 0) {
            $eastCarCnt++;
        } else {
            $carPairCnt += $eastCarCnt;
        }

        if ($carPairCnt > 1000000000) {
            return -1;
        }
    }

    return $carPairCnt;
}
```
## Result
 * Lesson 5-1 : PassingCars
 * 
 * @Total score: 100%
 * 
 * Task: 100%
 * Correctness: 100%
 * Performance: 100%
 * 
 * @Detected time complexity: O(N)
 * @Link: https://app.codility.com/demo/results/training6RFZPS-V4E/
## Comment
> 알고리즘 공부가 왜 필요한가?  
> 1번의 경우는 정말 그냥 문제만 보고 풀었을 때의 퍼포먼스  
> 2번의 경우는 더 좋은 로직으로 구현 했을 떄의 퍼포먼스  
> 2개의 차이를 확인해보면 답은 정해져 있다.  
