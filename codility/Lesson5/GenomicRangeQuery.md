# Codility #Lesson5-3 : GenomicRangeQuery
Link : https://app.codility.com/programmers/lessons/5-prefix_sums/genomic_range_query/
## Task Goal
```
A DNA sequence can be represented as a string consisting of the letters A, C, G and T, which correspond to the types of successive nucleotides in the sequence. Each nucleotide has an impact factor, which is an integer. Nucleotides of types A, C, G and T have impact factors of 1, 2, 3 and 4, respectively. You are going to answer several queries of the form: What is the minimal impact factor of nucleotides contained in a particular part of the given DNA sequence?

The DNA sequence is given as a non-empty string S = S[0]S[1]...S[N-1] consisting of N characters. There are M queries, which are given in non-empty arrays P and Q, each consisting of M integers. The K-th query (0 ≤ K < M) requires you to find the minimal impact factor of nucleotides contained in the DNA sequence between positions P[K] and Q[K] (inclusive).

For example, consider string S = CAGCCTA and arrays P, Q such that:

    P[0] = 2    Q[0] = 4
    P[1] = 5    Q[1] = 5
    P[2] = 0    Q[2] = 6
The answers to these M = 3 queries are as follows:

The part of the DNA between positions 2 and 4 contains nucleotides G and C (twice), whose impact factors are 3 and 2 respectively, so the answer is 2.
The part between positions 5 and 5 contains a single nucleotide T, whose impact factor is 4, so the answer is 4.
The part between positions 0 and 6 (the whole string) contains all nucleotides, in particular nucleotide A whose impact factor is 1, so the answer is 1.
Write a function:

function solution($S, $P, $Q);

that, given a non-empty string S consisting of N characters and two non-empty arrays P and Q consisting of M integers, returns an array consisting of M integers specifying the consecutive answers to all queries.

Result array should be returned as an array of integers.

For example, given the string S = CAGCCTA and arrays P, Q such that:

    P[0] = 2    Q[0] = 4
    P[1] = 5    Q[1] = 5
    P[2] = 0    Q[2] = 6
the function should return the values [2, 4, 1], as explained above.

Write an efficient algorithm for the following assumptions:

N is an integer within the range [1..100,000];
M is an integer within the range [1..50,000];
each element of arrays P and Q is an integer within the range [0..N - 1];
P[K] ≤ Q[K], where 0 ≤ K < M;
string S consists only of upper-case English letters A, C, G, T.
```
```
문자열S와 배열P,Q가 주어진다.

문자열은 영어대문자 A,C,G,T로만 구성되어있으며
A는 1, C는 2, G는 3, T는 4의 값을 가진다.

P배열의 값과 Q배열의 값의 사이의 문자열S의 문자값중 가장 작은 값을 반환하라.

예)
0번째의 P와 Q에 해당하는 문자열S는 (2~4)[GCC]이기에 가장 작은 값은 C의 값인 2
1번째의 P와 Q에 해당하는 문자열S는 (5)[T]이기에 가장 작은 값은 T의 값인 4
2번째의 P와 Q에 해당하는 문자열S는 (0~6)[CAGCCTA]이기에 가장 작은 값은 A의 값인 1

따라서 [2,4,1]의 값이 반환된다.
```
```
文字列Sと配列P,Qが与えられます。
文字列は英語大文字A,C,G,Tだけで構成されています。
Aは1、Cは2、Gは3、Tは4の値を持っています。
P配列の値とQ配列の値の間の文字列Sの文字の中で最も小さい値を返しなさい。

例）
0番目のPとQに該当する文字列Sは(2~4)[GCC]ので最も小さい値はCの値の2
1番目のPとQに該当する文字列Sは(5)[T]ので最も小さい値はTの値の4
2番目のPとQに該当する文字列Sは(0~6)[CAGCCTA]ので最も小さい値はAの値の1

だから、[2,4,1]が返されます。
```
## How to solve(1st time).
```
1. dnaArr배열을 만들어서 A,C,G,T key값과 value값을 넣는다.
2. 반복문을 통해 배열P와 Q사이의 문자열을 substr()을 통해 추출한다.
3. dnaArr배열을 foreach문을 통해 2번에서 추출한 문자열과 일치하는 문자가 있는지 strpos()문을 통해 확인한다.
4. 3번에서 일치하는 문자가 나왔다면 해당 값이 제일 작은 값이므로 returnArr배열에 넣는다.
5. 2번의 반복문이 끝났다면 returnArr배열을 반환한다.
```
```
1. dnaArr配列を作って、A,C,G,Tのkeyとvalueを入れます。
2. 反復文を通して配列PとQの間の文字列をsubstr()関数を通して抽出します。
3. dnaArr配列をforeach()関数を通して2ばんで抽出した文字列と一致する文字があるかどうかstrpos()関数を通して確認します。
4. 3番で一致された文字があったら、該当値が最も小さい値だから、returnArr配列に入れます。
5. 2番の反復文が終わったら、returnArrを返しましょう。
```
## Code(1st time).
```php
function solution($S, $P, $Q) {
    $dnaArr = array(
        'A' => 1, 
        'C' => 2,
        'G' => 3,
        'T' => 4
    );

    $arrCnt = count($P);
    $chkStringArr = array();
    $returnArr = array();
    for ($i=0;$i<$arrCnt;$i++) {
        $chkStringArr = substr($S, $P[$i], ($Q[$i]-$P[$i])+1);
        foreach ($dnaArr as $key => $val) {
            if (strpos($chkStringArr, $key) !== false) {
                $returnArr[] = $val;
                break;
            }
        }
    }

    return $returnArr;
}
```
## Result
 * Lesson 5-3 : GenomicRangeQuery
 * 
 * @Total score: 100%
 * 
 * Task: 100%
 * Correctness: 100%
 * Performance: 100%
 * 
 * @Detected time complexity: O(N + M)
 * @Link: https://app.codility.com/demo/results/training3NCTRB-EKC/
## Comment
> 첫 줄에 갑자기 DNA 시퀀스라는 말이 나와서 당황했다. 이게 무슨 말이지???  
> 그렇게 당황했더니 문제 이해하는게 더 힘들었다...  
> 사실 문제는 그렇게 힘들지 않았음...  
