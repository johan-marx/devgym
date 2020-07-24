<?php
//Write a function that is given a string, detect whether or not the string is a pangram. Return True if it is, False if not. Ignore numbers and punctuation.

$PangramArray = array(
    "The five boxing wizards jump quickly",
    "The quick brown fox jumps over a lazy dog ",
    "Waltz, nymph, for quick jigs vex Bud.",
    "Not a pangram"
);

foreach($PangramArray as $PangramStr) {
    echo $PangramStr.'<br>'.((isPangram($PangramStr)) ? 'is a PANGRAM' : 'is NOT a PANGRAM').'<br><br>';
}

function isPangram($InputStr) {
    $InputStr = strtoupper($InputStr);
    $LettersArray = range('A', 'Z');
    foreach($LettersArray as $LetterStr) {
        if (strpos($InputStr, $LetterStr) === false) {
            return false;
        }
    }
    return true;
}