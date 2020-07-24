<?php
/**
 * Created by PhpStorm.
 * User: Johan Griesel (Stratusolve (Pty) Ltd)
 * Date: 2017/02/18
 * Time: 10:07 AM
 */
echo highScoringWord(strtolower("If only it were all so simple! If only there were evil people somewhere insidiously committing evil deeds, and it were necessary only to separate them from the rest of us and destroy them. But the line dividing good and evil cuts through the heart of every human being. And who is willing to destroy a piece of his own heart?"));
echo '<br>';
echo highScoringWord("when eactiv a hike on an active");

function highScoringWord($SentenceStr) {
    $SentenceArray = explode(' ', $SentenceStr);
    $HighScoreInt = 0;
    $HighScoreWordStr = '';
    foreach($SentenceArray as $WordStr) {
        $WordScoreInt = 0;
        $LetterArray = str_split($WordStr);
        foreach($LetterArray as $LetterStr) {
            $WordScoreInt += ord($LetterStr);
        }
        if ($WordScoreInt > $HighScoreInt) {
            $HighScoreInt = $WordScoreInt;
            $HighScoreWordStr = $WordStr;
        }
    }
    return $HighScoreWordStr;
}