# Codility #Lesson4-３ : MaxCounters
Link : https://app.codility.com/programmers/lessons/4-counting_elements/max_counters/
## Task Goal
```
You are given N counters, initially set to 0, and you have two possible operations on them:

increase(X) − counter X is increased by 1,
max counter − all counters are set to the maximum value of any counter.
A non-empty array A of M integers is given. This array represents consecutive operations:

if A[K] = X, such that 1 ≤ X ≤ N, then operation K is increase(X),
if A[K] = N + 1 then operation K is max counter.
For example, given integer N = 5 and array A such that:

    A[0] = 3
    A[1] = 4
    A[2] = 4
    A[3] = 6
    A[4] = 1
    A[5] = 4
    A[6] = 4
the values of the counters after each consecutive operation will be:

    (0, 0, 1, 0, 0)
    (0, 0, 1, 1, 0)
    (0, 0, 1, 2, 0)
    (2, 2, 2, 2, 2)
    (3, 2, 2, 2, 2)
    (3, 2, 2, 3, 2)
    (3, 2, 2, 4, 2)
The goal is to calculate the value of every counter after all operations.

Write a function:

function solution($N, $A);

that, given an integer N and a non-empty array A consisting of M integers, returns a sequence of integers representing the values of the counters.

Result array should be returned as an array of integers.

For example, given:

    A[0] = 3
    A[1] = 4
    A[2] = 4
    A[3] = 6
    A[4] = 1
    A[5] = 4
    A[6] = 4
the function should return [3, 2, 2, 4, 2], as explained above.

Write an efficient algorithm for the following assumptions:

N and M are integers within the range [1..100,000];
each element of array A is an integer within the range [1..N + 1].
```
```
M개로 이루어진 배열A과 정수 N이 주어진다.
구현해야 할 알고리즘은 두가지의 동작과 룰이 있다.
동작)
1. 증가 -> 배열[M]의 값이 N보다 작을 때 해당 값을 1 증가 시킨다.
2. 최대값으로 업데이트 -> 만약 배열[M]의 값이 N보다 크다면 해당 시점에 가장 큰 수로 모든 값을 업데이트 한다.

예)
N -> 5
returnArr[] -> [0,0,0,0,0]

1. A[0]-> 3, [0,0,1,0,0] #3번째 값을 + 1 시킨다.

2. A[1]-> 4, [0,0,1,1,0] #4번째 값을 + 1 시킨다.

3. A[2]-> 4, [0,0,1,2,0] #4번째 값을 + 1 시킨다.

4. A[3]-> 6, [2,2,2,2,2] #3번째의 returnArr 값중 가장 큰 값은 2이므로 모든 값을 2로 업데이트 한다.

5. A[4]-> 1, [3,2,2,2,2] #1번째 값을 + 1 시킨다.

6. A[5]-> 4, [3,2,2,3,2] #4번째 값을 + 1 시킨다.

7. A[6]-> 4, [3,2,2,4,2] #4번째 값을 + 1 시킨다.

[3,2,2,4,2]를 반환 한다.
```
```
M個の整数で構成されている配列Aと整数Nが与えられます。
具現することは二つの動作とルールがあります。
動作）
1. 増加　-> 配列[M]の値がNより小さい場合は+1します。
2. 最大値にアップデート -> もし、配列[M]の値がNより大きい場合は該当時点で一番大きい数に全部アップデートします。

例)
N -> 5
returnArr[] -> [0,0,0,0,0]

1. A[0]-> 3, [0,0,1,0,0] #3番目の値を + 1 します.

2. A[1]-> 4, [0,0,1,1,0] #4番目の値を + 1 します.

3. A[2]-> 4, [0,0,1,2,0] #4番目の値を + 1 します.

4. A[3]-> 6, [2,2,2,2,2] #3番目の時点のreturnArrの値で一番大きい値は2だから、全ての値を2にアップデートします。

5. A[4]-> 1, [3,2,2,2,2] #1番目の値を + 1 します.

6. A[5]-> 4, [3,2,2,3,2] #4番目の値を + 1 します.

7. A[6]-> 4, [3,2,2,4,2] #4番目の値を + 1 します.

[3,2,2,4,2]を返します。
```
## How to solve(1st time).
```
1. 우선 반환을 위한 resultArr[] 배열과 afterUpdatedArr[] 배열을 만든다.
2. resultArr[] 배열 중 가장 큰 값을 설정하기 위한 currentMaxCnt 변수를 만든다.
3. Loop문을 돌리는데 여기에서 조건문을 만들자.
4. 우선은 배열[M]의 값이 N보다 클때는 lastMaxVal 변수에 currentMaxCnt 변수 값을 넣고, updTime변수를 + 1 시킨다.
5. 배열[M]의 값이 N보다 작을 때는 우선 isset()함수로 resultArr[] 배열에 배열[M]의 값이 key값으로 설정 되어 있는지 확인한다.
6. resultArr[배열[M]의값]이 존재한다면 afterUpdatedArr[배열[M]의값]의 값(뭔가 복잡해보이지만... 천천히... 합시다...)과 updTime변수가 일치하는지 확인한다.
7. 여기서 왜 updTime변수랑 비교를 하냐면, 4번에서 최대값으로 모든 값으로 업데이트 하는 과정에서 updTime변수를 + 1 증가를 시켰는데 간단히 말하면 이건 회차라고 생각하자.
8. 이 회차에 대한 정보는 afterUpdatedArr[] 배열에 저장이 되는데 만약 회차가 같다면 resultArr[배열[M]의값]의 값은 이미 최대값으로 업데이트가 되었다는 뜻이므로 + 1을 시켜준다.
9. 만약 6번의 조건문에서 일치하지 않으면 최대값으로 업데이트가 안되었다는 뜻이므로 lastMaxVal변수값 + 1을 시켜 준다.
10. 5번 조건문에서 resultArr[] 배열에 존재하지 않으면 배열을 생성하면서 lastMaxVal변수값 + 1 값을 넣어준다.
11. 만약 해당 resultArr[배열[M]의값]의 값이 currentMaxCnt보다 크다면 currentMaxCnt + 1을 시켜준다.
12. Loop문이 끝나고 나면 이제 한번더 loop문을 통해 resultArr[], afterUpdatedArr[]에 없거나, afterUpdatedArr[]의 회차 정보와 updTime의 값이 일치 하지 않을 때 배열을 생성 혹은 해당 배열에 lastMaxVal의 값을 넣어준다.
```
```
1. まず、resultArr[]配列とafterUpdatedArr[]配列を作ります。
2. resultArr[]配列の一番大きい数を設定するため、currentMaxCnt変数を作ります。
3. 反復文の中で使う粗件文を作りましょう。
4. まずは配列[M]の値がNより大きい場合はlastMaxVal変数にcurrentMaxCntの変数の値を入れて、updTime変数を+1します。
5. 配列[M]の値がNより小さい場合はまず、isset()関数を通してresultArr[]配列に配列[M]の値が設定しているかどうか確認します。
6. resultArr[配列[M]の値]が存在しているなら、afterUpdatedArr[配列[M]の値]の値（まぁ。。。ちょっと複雑ですが。。。頑張りましょう！）とupdTime変数が一致するか確認します。
7. ここで、なぜupdTime変数と比べるなら、4番目で最大値で全ての値をアップデートする過程でupdTime変数を+1させましたが、これは回次だと考えましょう。
8. この回次の情報はafterUpdatedArr[]配列に貯蔵されてもし回次が同じならresultArr[配列[M]の値]の値はもう最大値にアップデートされたの意味で、+1します。
9. もし6番目の粗件文で一致しなかったら最大値にアップデートされませんでしたの意味だからlastMaxVal変数の値+1します。
10. 5番目の粗件文でresultArr[]配列が存在しないなら配列を作ってlastMaxVal変数の値+1を入れます。
11. もしresultArr[配列[M]の値]の値がcurrentMaxCntより大きい場合はcurrentMaxCnt+1します。
12. 1回次の反復文が終わったら2回次の反復文を通してresultArr[], afterUpdatedArr[]にないか、afterUpdatedArr[]の回次情報とupdTimeの値が違う場合は該当配列を生成または該当配列にlastMaxValの値を入れます。
```
## Code(1st time).
```php
function solution($N, $A) {
    $resultArr = array();
    $currentMaxCnt = 0;
    $lastMaxVal = 0;
    $updTime = 0;
    $afterUpdatedArr = array();

    foreach ($A as $val) {
        if ($val === ($N + 1)) {
            $lastMaxVal = $currentMaxCnt;
            $updTime++;
        } else {
            if (isset($resultArr[$val-1])) {
                if ($afterUpdatedArr[$val-1] === $updTime) {
                    $resultArr[$val-1]++;
                } else {
                    $resultArr[$val-1] = 1 + $lastMaxVal;
                }
            } else {
                $resultArr[$val-1] = 1 + $lastMaxVal;
            }

            $afterUpdatedArr[$val-1] = $updTime;
            
            if ($resultArr[$val-1] > $currentMaxCnt) {
                //echo "Change currentMaxCnt value! resultArr-val -> ".$resultArr[$val-1]." & N -> ".$currentMaxCnt.PHP_EOL; 
                $currentMaxCnt++;
            }
        }
    }

    for ($i=0;$i<$N;$i++) {
        if (!isset($resultArr[$i]) || !isset($afterUpdatedArr[$i]) || $afterUpdatedArr[$i] !== $updTime) {
            $resultArr[$i] = $lastMaxVal;
        }
    }

    ksort($resultArr);
    return $resultArr;
}
```
## Result
 * Lesson 4-3 : MaxCounters
 * 
 * @Total score: 100%
 * 
 * Task: 100%
 * Correctness: 100%
 * Performance: 100%
 * 
 * @Detected time complexity: O(N + M)
 * @Link: https://app.codility.com/demo/results/trainingQRVCXU-P75/
## Comment
> 오 이번 문제는 문제 이해하는 데도 조금 시간이 걸렸고 실제로 구현 하는 데도 조금 시간이 걸린 것 같다.  
> 하지만 천천히 문제를 다시 읽고 예제를 노트에 그려가면서 하다보면 구현을 어떻게 할 지 감이 온다.  
> 배열의 key(index)와 value를 적절하게 사용하며 ksort() 함수로 적절하게 정렬 할 수 알면 크게 어렵지 않게 구현 가능 할 수준.  
