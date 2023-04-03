# Codility #Lesson2-2 : OddOccurrencesInArray
Link : https://app.codility.com/programmers/lessons/2-arrays/odd_occurrences_in_array/
## Task Goal
```
Given an array A consisting of N integers fulfilling the above conditions, returns the value of the unpaired element.
#Assumptions
1. N is an odd integer within the range [1..1,000,000];
2. each element of array A is an integer within the range [1..1,000,000,000];
3. all but one of the values in A occur an even number of times.
```
```
N개의 정수로 구성된 배열A가 주어졌을때, 배열A의 값 중 짝을 이루지 않은 값을 반환하라.
#Assumptions
1. N은 [1..1,000,000] 범위 내의 홀수로 이루어진 정수입니다.
2. 배열A의 각 요소는 [1..1,000,000,000] 범위 내의 정수입니다.
3. 배열A의 값 중 단 하나를 제외하고 짝수(짝을 이룸)로 발생합니다.
```
```
整数のN個で構成されている配列Aが与えられたら、配列Aの値の中で対になっていない要素を返します。
1. Nは[1..1,000,000]の範囲内の奇数の整数です。
2. 配列Aの要素は[1..1,000,000]範囲内の整数です。
3. 配列Aの値の中にはただ一個だけが対になっていません。
```
## How to solve(1st time).
```
1. 배열A를 우선 Loop를 돌리면서 $valArr 배열에 데이터를 생성한다.
2. 단 이때 생성되는 배열은 key에는 A[N]의 Value 값으로 생성하고, 만약 짝이 발생한 경우 Value를 1씩 증가 시킨다.
3. 예를 들어 배열A의 0번 인덱스의 값이 9라면 $valArr[9] = 1의 데이터를 생성하고 그 후 배열A의 2번 인덱스 값이 9일 경우 $valArr[9]의 값을 1 증가 시켜 $valArr[9]의 값은 2가 된다.
4. Loop가 완료 된 후에 array_filter() 내장 함수를 이용하여 짝을 이룬 $valArr의 데이터를 제거한다.
5. Assumptions의 내용에 따르면 짝을 이루지 않는 데이터는 한개 이므로, array_key_first() 내장 함수를 이용하여 key 값을 반환한다.
```
```
1. まず、配列Aを反復文を通して$valArr配列データを生成します。
2. ただ、生成される配列のindexには配列Aの値を入れます。
3. 例えば、配列Aの0番目の値が9なら、$valArr[9]　= 1のデータを生成して、その後配列Aの二番目の値が9なら、$valArr[9]の値を1増えして$valArr[9]の値を2に作ります。
4. 反復文が終わったら、array_filter()を通して対になっている$valArrのデータを除去します。
5. array_key_first()関数を使用して返します。
```
## Code(1st time).
```php
function solution($A) {
    $valArr = array();
    foreach ($A as $val) {
        if (array_key_exists($val, $valArr)) {
            //echo "key is exist! key -> ".$val.PHP_EOL;
            $valArr[$val]++;
        } else {
            //echo "key is not exist! key -> ".$val.PHP_EOL;
            $valArr[$val] = 1;
        }
    }

    //Remove paired data in $valArr
    $valArr = array_filter($valArr, function ($v) {
        return ($v % 2) != 0;
    });

    return array_key_first($valArr);
}
```
## How to solve(2nd time).
```
#Extra Comment 
#그런데 Git에 올리기전에 코드를 다시 살펴보니 쓸모없는 로직이 몇개 있는 것 같았다.
1. 배열A를 우선 Loop를 돌리면서 $valArr 배열에 데이터를 생성한다. (동일)
2. 단 이때 생성되는 배열은 key에는 A[N]의 Value 값으로 생성하고, 만약 짝이 발생한 경우 해당 $valArr[key] 데이터를 unset해서 없애준다.
3. 왜? 없어냐? -> 어차피 짝이 이루어진 데이터는 이 시점에서 더 이상 필요 없기 때문
4. 2번에서 unset을 해줌으로써 array_filter() 함수는 더 이상 필요 없어진다.
5. array_key_first() 내장 함수를 이용하여 key 값을 반환한다.
```
```
#Extra Comment
#でも、、、なんか、githubにアップロードする前にもう一度コードを見たら、要らないロジックがある気がする、、、
1. まず、配列Aを反復文を通して$valArr配列データを生成します。(同上)
2. ただ、生成される配列のindexには配列Aの値を入れて、もし対になった場合は該当配列をunset()を通して除去します。
3. なんで、除去しますか？->対になった時点からもう要らないデータになります。
4. 二番目でunset()したからもうarray_filter()関数は要らないです。
5. array_key_first()関数を使用して返します。(同上)
```
## Code(2nd time).
```php
function solution($A) {
    $valArr = array();
    foreach ($A as $val) {
        if (isset($valArr[$val])) {
            //echo "key is exist! key -> ".$val.PHP_EOL;
            unset($valArr[$val]);
        } else {
            //echo "key is not exist! key -> ".$val.PHP_EOL;
            $valArr[$val] = 1;
        }
    }

    return array_key_first($valArr);
}
```
## Result
 * Lesson 2-2 : OddOccurrencesInArray
 * 
 * @Total score: 100%
 * 
 * Task: 100%
 * Correctness: 100%
 * Performance: 100%
 * 
 * @Detected time complexity: O(N) or O(N*log(N))
 * @Link: [Result](https://app.codility.com/demo/results/trainingXCQZAH-RQN/)
## Comment
> 조금만 더 생각해보면 아름답고 크-린한 코드를 구현할 수 있다...  
> 이번 챕터부터 요구사항이 추가되고 Performance를 측정하는 등 난이도가 올라가는 듯 하다.  
> 아! 그리고 이번 챕터 역시 배열에 익숙한 분들이면 크게 어렵지 않게 구현이 가능한 수준인 듯 하다.  
