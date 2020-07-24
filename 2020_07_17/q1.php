<?php
echo toCamelCase("this-is-a-cold-room");
echo '<br>';
echo toCamelCase("This_is-a_cold_room");

function toCamelCase($SentenceStr) {
    $SentenceStr = str_replace('-','_',$SentenceStr);
    $SentenceArray = explode('_', $SentenceStr);

    $ReturnArray = array();
    $FirstWordBool = true;
    foreach($SentenceArray as $SentenceArrayStr) {
        if ($FirstWordBool) {
            $ReturnArray[] = $SentenceArrayStr;
            $FirstWordBool = false;
        } else {
            $ReturnArray[] = ucfirst($SentenceArrayStr);
        }
    }

    return implode('', $ReturnArray);
}