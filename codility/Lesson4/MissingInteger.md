# Codility #Lesson4-4 : MissingInteger
Link : https://app.codility.com/programmers/lessons/4-counting_elements/missing_integer/
## Task Goal
```
Write a function:

function solution($A);

that, given an array A of N integers, returns the smallest positive integer (greater than 0) that does not occur in A.

For example, given A = [1, 3, 6, 4, 1, 2], the function should return 5.

Given A = [1, 2, 3], the function should return 4.

Given A = [−1, −3], the function should return 1.

Write an efficient algorithm for the following assumptions:

N is an integer within the range [1..100,000];
each element of array A is an integer within the range [−1,000,000..1,000,000].
```
```
N개로 이루어진 배열[A]가 주어진다.
해당 배열A에서 빠져있는 가장 작은 양수(0보다큼)를 반환하라.

예)
Given A = [1, 3, 6, 4, 1, 2]
[1,2,3,4,(5가 없음),6] -> 5를 반환한다.

Given A = [1, 2, 3]
[1,2,3](다음은 4) -> 4를 반환한다. 

Given A = [−1, −3]
[-3, -1] -> 배열의 모든 값이 0보다 작으므로 1을 반환한다.
```
```
N個の整数で構成されている配列Aが与えられる。
該当配列Aに入っていない一番小さい整数(0より大きい整数)を返します。

例)
Given A = [1, 3, 6, 4, 1, 2]
[1,2,3,4,(5が無し),6] -> 5を返します。

Given A = [1, 2, 3]
[1,2,3](次は4) -> 4を返します。 

Given A = [−1, −3]
[-3, -1] -> 配列の全ての値が0より小さいから1を返します。
```
## How to solve(1st time).
```
1. 우선 기본 조건 중의 하나인 음수로 이루어진 배열 혹은 가장 큰 값이 0인 배열인 경우가 있으므로 max()함수를 이용하여 확인 후 1을 반환한다.
2. 1번의 경우가 아니라면 array_unique()함수를 통해 중복값을 제거 한 후 array_filter()함수를 이용하여 1보다 작은 값을 제거후 uniqueArr[] 배열에 값을 넣는다.
3. min()함수를 통해 uniqueArr[] 배열의 가장 작은 값이 1보다 크다면 1을 반환한다.
4. 3번의 경우가 아니라면 sort()함수를 통해 오름차순으로 정렬한다.
5. 만약, uniqueArr[] 배열의 요소가 1개이고 해당 값이 1이라면 2를 반환한다.
6. Loop문을 통해 smallestNo변수 값을 1씩 더해가면서 배열을 검사한다.
7. 만약 배열의 두값(uniqueArr[N] <-> uniqueArr[N+1])이 1보다 큰 값이 있는 경우 smallestNo변수를 + 1해서 반환한다.
8. Loop문이 끝까지 돌았다면 배열 값이 모두 정상이므로 smallestNo변수 + 1을 하여 반환한다.
```
```
1. まず、基本条件の一つの負数だけで構成されている配列Aの場合または一番大きい数が0かどうかを確認するため、max()関数を通して確認して1を返します。
2. 二番のケースじゃない場合はarray_unique()関数を通して重複している値を除去して、array_filter()関数を通して1より小さい値を除去して、uniqueArr[]配列に入れます。
3. min()関数を通してunqiqueArr[]配列の一番小さい値が1より大きい場合は1を返します。
4. 三番のケースじゃない場合はsort()関数を通して昇順に整列します。
5. もし、unqiqueArr[]配列の要素が一個で該当要素の値が1なら2を返します。
6. 反復文を通してsmallestNo変数を+1しながら、uniqueArr[]配列の値を検査します。
7. もし、uniqueArr[]配列の値(uniqueArr[N] <-> uniqueArr[N+1])が1より大きい場合はsmallestNo変数+1して返します。
8. 反復文が無事に終わったら、smallestNo変数+1して返しましょう！
```
## Code(1st time).
```php
function solution($A) {
    if (max($A) <= 0) {
        return 1;
    }

    $uniqueArr = array_unique($A);
    $uniqueArr = array_filter($uniqueArr, function ($v) {
        return $v > 0;
    });

    if (min($uniqueArr) > 1) {
        return 1;
    }

    sort($uniqueArr);
    $arrCnt = count($uniqueArr);
    if ($arrCnt === 1 && $uniqueArr[0] === 1) {
        return 2;
    }

    $smallestNo = 1;
    for ($i=1;$i<$arrCnt;$i++) {
        if (($uniqueArr[$i] - $uniqueArr[$i-1]) > 1) {
            return $smallestNo+1;
        }

        $smallestNo++;
    }

    return $smallestNo+1;
}
```
## Result
 * Lesson 4-4 : MissingInteger
 * 
 * @Total score: 100%
 * 
 * Task: 100%
 * Correctness: 100%
 * Performance: 100%
 * 
 * @Detected time complexity: O(N) or O(N * log(N))
 * @Link: https://app.codility.com/demo/results/trainingWWR5NM-2A7/
## Comment
> 이번 문제는 벨리데이션으로 예외 배열들을 빠르게 반환해주자.  
> 일단 핵심이 전의 배열값과 비교하여 각각의 값들이 +1 씩 증가하느냐 아니냐기 때문에 array_unique()로 중복값을 제거해주고  
> 앞에서 음수의 경우는 1을 반환하는 벨리데이션이 있기에 반복문에서는 음수가 굳이 필요 없음으로 array_filter()로 음수(0포함)을 제거한다.  
> min(), max(), array_unique(), array_filter()와 같은 배열쪽 처리하는 PHP 내부 함수만 알고 있다면 충분히 구현 가능 한 듯 하다.  
