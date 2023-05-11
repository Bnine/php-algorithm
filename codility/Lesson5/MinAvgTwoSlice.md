# Codility #Lesson5-4 : MinAvgTwoSlice
Link : https://app.codility.com/programmers/lessons/5-prefix_sums/min_avg_two_slice/
## Task Goal
```
A non-empty array A consisting of N integers is given. A pair of integers (P, Q), such that 0 ≤ P < Q < N, is called a slice of array A (notice that the slice contains at least two elements). The average of a slice (P, Q) is the sum of A[P] + A[P + 1] + ... + A[Q] divided by the length of the slice. To be precise, the average equals (A[P] + A[P + 1] + ... + A[Q]) / (Q − P + 1).

For example, array A such that:

    A[0] = 4
    A[1] = 2
    A[2] = 2
    A[3] = 5
    A[4] = 1
    A[5] = 5
    A[6] = 8
contains the following example slices:

slice (1, 2), whose average is (2 + 2) / 2 = 2;
slice (3, 4), whose average is (5 + 1) / 2 = 3;
slice (1, 4), whose average is (2 + 2 + 5 + 1) / 4 = 2.5.
The goal is to find the starting position of a slice whose average is minimal.

Write a function:

function solution($A);

that, given a non-empty array A consisting of N integers, returns the starting position of the slice with the minimal average. If there is more than one slice with a minimal average, you should return the smallest starting position of such a slice.

For example, given array A such that:

    A[0] = 4
    A[1] = 2
    A[2] = 2
    A[3] = 5
    A[4] = 1
    A[5] = 5
    A[6] = 8
the function should return 1, as explained above.

Write an efficient algorithm for the following assumptions:

N is an integer within the range [2..100,000];
each element of array A is an integer within the range [−10,000..10,000].
```
```
N개의 정수로 이루어진 배열A가 주어진다.
해당 배열A의 인덱스 중 0 ≤ P < Q < N의 조건을 만족하는 배열 slice 중
평균값이 가장 작은 값의 P값을 반환하라.
배열 slice는 최소한 두개이상으로 구성된다.

예)
1. 배열slice(A[1], A[2])는 2+2 / 2 = 2
2. 배열slice(A[2], A[3])는 2+5 / 2 = 3.5
3. 배열slice(A[3], A[4], A[5], A[6])는 5+1+5+8 / 4 = 4.75

배열A의 배열slice중 평균값이 가장 작은 것은 1번의 A[1], A[2] 이므로 1을 반환한다.
```
```
N個で構成されている配列Aが与えられます。
該当配列Aのindexの中で(0 ≤ P < Q < N)の条件を満足する配列sliceで平均値が最も小さいsliceのPの値を返しなさい。

例)
1. 配列slice(A[1], A[2])は、2+2 / 2 = 2
2. 配列slice(A[2], A[3])は、2+5 / 2 = 3.5
3. 配列slice(A[3], A[4], A[5], A[6])は、5+1+5+8 / 4 = 4.75

配列Aの配列sliceで平均値が最も小さいのは一番のA[1],A[2]だから、1を返します。
```
## How to solve(1st time).
```
#이번 문제는 구글 검색을 통해 풀었으므로, 해당 내용을 서술합니다.
1. a <= b 일 때, a와 b의 평균은 a 이상이 된다.
1-1. 1,2인 경우 1+2 / 2 는 1.5 이므로 a 이상이 된다.
2. a = b 일 때는 평균값은 a 혹은 b가 된다.
2-1. 1,1인 경우 1+1 / 2 는 1 이므로 a 혹은 b가 된다.
3. 이어서 (a + b) <= (c + d) 일 때, (a,b)와 (c,d)의 평균은 (a + b) 이상이 된다.
3-1. 예를 들어 (1,2,3,4)가 있다고 가정해보자.
3-2. (1,2)는 1+2 / 2 = 1.5이고 (3,4)는 3+4 / 2 = 3.5이고
3-3. (1,2,3,4)는 1+2+3+4 / 4 = 2.5가 된다.
3-4. 3-2에서 구한 값인 1.5 + 3.5 / 2 = 2.5가 되므로 4개의 그룹은 생각 할 필요가 없어진다. (2개의 그룹만으로도 충분)
4. 다만 3개의 그룹 범위일 경우도 생각해야 한다.
4-1. 예를들어 (2,6,1)이 있다고 가정 할 때
4-2. (2,6)는 2+6 / 2 = 4이고 (6,1)는 6+1 / 2 = 3.5이고
4-3. (2,6,1)은 2+6+1 / 3 = 3가 된다.
4-4. 4-2에서 구한 값인 4 + 3.5 / 2 = 3.75가 되므로 3개의 그룹의 평균 값이 더 작아지므로 3개의 그룹도 생각해야 한다.
5. 배열slice를 2개와 3개씩 묶어서 평균값을 구하며 최소값을 구한 뒤 반환하자. 
```
```
1. a <= bの場合は、aとbの平均はa値の以上になります。
1-1. 1,2のケースは1+2 / 2 = 1.5でa値以上になります。
2. a = bの場合は、平均値はaまたはbになります。
2-1. 1,1のケースは1+1 / 2 = 1でaまたはbになります。
3. 続けて、(a+b) <= (c+b)の場合は、(a,b)と(c,d)の平均は(a+b)以上になります。
3-1. 例えば、(1,2,3,4)のケースは
3-2. (1,2)は 1+2 / 2 = 1.5、(3,4)は　3+4 / 2 = 3.5
3-3. (1,2,3,4)は　1+2+3+4 / 4 = 2.5
3-4. 3-2の値の1.5 + 3.5 / 2 = 2.5で四つのグループは考えなくても大丈夫です。(二つのグループで十分です)
4. でも、三つのグループは例外です。
4-1. なぜなら、例えば、(2,6,1)のケースは
4-2. (2,6)は 2+6 / 2 = 4, (6,1)は 6+1 / 2 = 3.5
4-3. (2,6,1)は 2+6+1 / 3 = 3
4-4. 4-2の値の 4 + 3.5 / 2 = 3.75になるので、三つのグループの平均値がもっと小さくなるので三つのグループのケースも考えなければなりません。
5. 配列sliceを二つ、三つのグループの平均値を求めましょう。
```
## Code(1st time).
```php
function solution($A) {
    $arrCnt = count($A);
    $minPval = 0;
    $smallestVal = ($A[0] + $A[1]) / 2; 
    for ($i=2;$i<$arrCnt;$i++) {
        $avg = (float)(($A[$i-2] + $A[$i-1] + $A[$i]) / 3);
        if ($avg < $smallestVal) {
            $smallestVal = $avg;
            $minPval = $i-2;
        }

        $avg = (float)(($A[$i-1] + $A[$i]) / 2);
        if ($avg < $smallestVal) {
            $smallestVal = $avg;
            $minPval = $i-1;
        }
    }

    return $minPval;
}
```
## Result
 * Lesson 5-4 : MinAvgTwoSlice
 * 
 * @Total score: 100%
 * 
 * Task: 100%
 * Correctness: 100%
 * Performance: 100%
 * 
 * @Detected time complexity: O(N)
 * @Link: https://app.codility.com/demo/results/training6WYBD9-65P/
## Comment
> 이번 문제는 사실 수학적으로 다가가지 않으면 반복문을 중첩해서 풀어야 하는데  
> 그럴 경우 퍼포먼스 점수가 낮아서 시간복잡도O(N)을 만족하지 못한다.  
> 인터넷 검색해보니 수학적으로 푼 사람은 쉽게 풀었고  
> 나 같은 경우는 반복문 지옥에 빠져서 좌절하다가 구글에 검색해서 구현하신 것 같다.  
> 수학책 어디 짱박아놨더라...  
