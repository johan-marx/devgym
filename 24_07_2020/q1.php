<?php
//Question1Write a function that takes in a string of one or more words, and returns the same string, but with all five or more letter words reversed. Strings passed in will consist of only letters andspaces. Spaces will be included only when more than one word is present.
//Examples
//“Welcome” => returns “emocleW”
//“to the jungle” => returns “to the elgnuj”
//“we have got fun and games” => returns “we have got fun and semag”
//“We got everything you want honey” => returns “We got gnihtyreve you want yenoh”
//“we know the names” => returns “we know the seman”

echo magicReverse("Welcome").'<br>';
echo magicReverse("to the jungle").'<br>';
echo magicReverse("we have got fun and games").'<br>';
echo magicReverse("We got everything you want honey").'<br>';
echo magicReverse("we know the names").'<br>';

function magicReverse($InputStr) {
    $InputArray = explode(' ', $InputStr);
    $OutputArray = array();
    foreach($InputArray as $WordStr) {
        if (strlen($WordStr) >= 5) {
            $OutputArray[] = strrev($WordStr);
        } else {
            $OutputArray[] = $WordStr;
        }
    }
    return implode(' ', $OutputArray);
}