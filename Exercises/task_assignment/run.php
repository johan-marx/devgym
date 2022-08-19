<?php
$filename = "sheet1.csv";
$file = fopen($filename, "r");
$sheet1 = [];
$first_row = true;
while (($getData = fgetcsv($file, 10000, ",")) !== FALSE) {
    if ($first_row) {
        $first_row = false;
        continue;
    }
    $entry = new stdClass();
    $entry->id = $getData[0];
    $entry->exclude = $getData[1];
    $sheet1[] = $entry;
}

$filename = "sheet2.csv";
$file = fopen($filename, "r");
$sheet2 = [];
$first_row = true;
while (($getData = fgetcsv($file, 10000, ",")) !== FALSE) {
    if ($first_row) {
        $first_row = false;
        continue;
    }
    $entry = new stdClass();
    $entry->subject = $getData[0];
    $entry->id = $getData[1];
    $entry->assessor = $getData[2];
    $entry->gender = $getData[3];
    $sheet2[] = $entry;
}

$sheet2 = [...$sheet2, ...$sheet2, ...$sheet2, ...$sheet2, ...$sheet2];

foreach ($sheet1 as $person) {
    $subjects = [];
    $person->tasks = [];
    foreach ($sheet2 as $key => $task) {
        if (!in_array($task->subject, $subjects) && $task->assessor != $person->exclude) {
            $subjects[] = $task->subject;
            $person->tasks[] = $task;
            unset($sheet2[$key]);
        }
    }
}
// echo json_encode($sheet2);
echo json_encode($sheet1);
