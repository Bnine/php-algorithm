<?php
function solution($N) {
    $result = 0;
    $chkVal = intval(sqrt($N));

    $i=1;
    while($i <= $chkVal) {
        if ($N % $i == 0) {
            $result += 2;
        }
        $i++;
    }

    if (($chkVal * $chkVal) == $N) {
        $result--;
    }

    return $result;
}
?>