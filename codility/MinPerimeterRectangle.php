<?php
function solution($N) {
    $side = 1;

    if ($N == 1) {
        return $side * 4;
    }

    $chkVal = intval(sqrt($N));
    echo "chkVal -> ".$chkVal.PHP_EOL;
    for($i = 2; $i <= $chkVal; $i++) {
        if ($N % $i == 0) {
            $side = $i;
        }
    }

    echo "side -> ".$side.PHP_EOL;
    $remainVal = $N / $side;
    echo "remainVal -> ".$remainVal.PHP_EOL;

    return ($side + $remainVal) * 2;
}
var_dump(solution(30));
?>