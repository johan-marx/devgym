<?php

function trySomething($a, $b, $c)
{
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

function doSomething()
{
    die("I did it");
}
