<?php
//Create a function to build a tower given the level of floors.
//Example:
//function buildMyTower($FloorsInt) {
//}
//Output for buildMyTower(6)
// , 6 floors
//‘     *     '
//'    ***    '
//'   *****   '
//'  *******  '
//' ********* '
//'***********'

buildTowerOfBabel(30);

function buildTowerOfBabel($LevelInt) {
    $CurrentLevelInt = 0;
    $MaxWidthInt = getWidth($LevelInt);
    $TowerArray = array();
    while($CurrentLevelInt < $LevelInt) {
        $CurrentLevelInt++;
        $LevelWidthInt = getWidth($CurrentLevelInt);
        $LevelStr = str_repeat('*',$LevelWidthInt);
        while(strlen($LevelStr) < $MaxWidthInt) {
            $LevelStr = ' '.$LevelStr.' ';
        }
        $TowerArray[] = $LevelStr;
    }

    echo '<pre>';
    foreach($TowerArray as $TowerLevelStr) {
        echo $TowerLevelStr.'<br>';
    }
    echo '</pre>';
}

function getWidth($InputInt) {
    return (($InputInt - 1) * 2) + 1;
}