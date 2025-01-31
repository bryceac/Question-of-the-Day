<?php
include("functions.php");
$json = file_get_contents("questions.json") ?? "" ;
$history_json = file_get_contents("history.json") ?? "";

$questions = json_decode($json, true);
$history;

if (strlen($history_json) == 0) {
    $history = [];
} else {
    $history = json_decode($history_json, true);
}

$today = date("Y-m-d");

$question_of_the_day = new Question();
$question_of_the_day->date = $today;

$selected_index = array_rand($questions, 1);

if (is_null(question_for_date($today, $history))) {
    $question_of_the_day->question = $questions[$selected_index];
    $history[] = $question_of_the_day;

    file_put_contents("history.json", json_encode($history, JSON_PRETTY_PRINT));
} else {
    $question_of_the_day = question_for_date($today, $history);
}

echo $question_of_the_day->question;
?>