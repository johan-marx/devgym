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

function doSomething() {
    die("I did it");
}
