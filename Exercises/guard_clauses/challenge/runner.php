<?php
require_once('./function.php');

$PostObj = new stdClass();
$PostObj->Id = 234;
// $PostObj->Title = "My Inspiration!";
$PostObj->Content = "Everything can be taken from a man but one thing: the last of the human freedoms—to choose one’s attitude in any given set of circumstances, to choose one’s own way.";
$PostObj->ImagePath = "image.jpg";
$PostObj->Date = new DateTime('21 December 2020');
$PostObj->Comments = array("Great content!", "So inspirational, love it", "You are so pretentious, stop posting");

echo json_encode(validatePost($PostObj));
