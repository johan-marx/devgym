<?php

function trySomething($a, $b, $c) {
    if ($a) {
        if ($b >= 3) {
            if (!is_null($c)) {
                doSomething();
            } else {
                die("C is null");
            }
        } else {
            die("B is less than 3");
        }
    } else {
        die("A is falsey");
    }
}

function trySomething2($a, $b, $c) {
    if (!$a) {
        die("A is falsey");
    }

    if ($b < 3) {
        die("B is less than 3");
    }

    if (is_null($c)) {
        die("C is null");
    }

    doSomething();
}


function doSomething() {
    die("I did it");
}
