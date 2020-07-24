<?php
//region Unit Test
$UnitTestArray = array(
    5 => [20,1,-1,2,-2,3,3,5,5,1,2,4,20,4,-1,-2,5],
    -1 => [1,1,2,-2,5,2,4,4,-1,-2,5],
    10 => [1,1,1,1,1,1,10,1,1,1,1]
);

$TestCountInt = 0;
$SuccessCountInt = 0;
$FailCountInt = 0;
foreach($UnitTestArray as $UnitAnswerInt => $TestIntArray) {
    $TestCountInt++;
    echo '<h3>Unit Test Case '.$TestCountInt.'</h3>';
    echo 'Test Array: '.json_encode($TestIntArray).'<br>';
    echo 'Expected Answer: '.$UnitAnswerInt.'<br>';
    $AnswerInt = findTheOddNumber($TestIntArray);
    echo 'Calculated Answer: '.$AnswerInt.'<br>';
    if ($UnitAnswerInt == $AnswerInt) {
        $SuccessCountInt++;
        echo '<div style="color: green">PASSED</div><br>';
    } else {
        $FailCountInt++;
        echo '<div style="color: red">FAILEDdiv><br>';
    }
    echo '=========================<br>';
}

echo '<h3>Summary</h3>';
echo 'Number of Tests: '.$TestCountInt.'<br>';
echo 'Number Passed: '.$SuccessCountInt.'<br>';
echo 'Number Failed: '.$FailCountInt.'<br>';
//endregion
function findTheOddNumber($Input = []) : int
{
    $CounterArray = array();
    foreach($Input as $InputElementInt) {
        $CounterArray[$InputElementInt] = 0;
    }

    foreach($Input as $InputElementInt) {
        $CounterArray[$InputElementInt]++;
    }

    foreach($CounterArray as $KeyInt => $ValueInt) {
        if ($ValueInt % 2 == 1) {
            return $KeyInt;
        }
    }
}