<?php
// import functions file, to load some necessary elements, including helper functions.
include("functions.php");

// load necessary information from file.
$json = file_get_contents("questions.json") ?? "" ;

// create placeholder for log
$history_json;

// attempt to load parse questions file.
$questions = json_decode($json, true);
$history;

// attempt to load log if the file exists.
if (file_exists("history.json")) {
    $history_json = file_get_contents("history.json") ?? "";
}

// attempt to parse history, if there is data to be found.
if (strlen($history_json) == 0) {
    $history = [];
} else {
    $history = json_decode($history_json, true);
}

$today = date("Y-m-d");

// create object to hold today's question.
$question_of_the_day = new Question();
$question_of_the_day->date = $today;

// retrieve random index, in the event a question is not found.
$selected_index = array_rand($questions, 1);

/* 
try to figure out if there is already a question for the day and
assign it as question of the day if so.

Otherwise, randomly pick a question and write it to the log 
as the day's question.
*/
if (is_null(question_for_date($today, $history))) {
    $question_of_the_day->question = $questions[$selected_index];
    $history[] = $question_of_the_day;

    file_put_contents("history.json", json_encode($history, JSON_PRETTY_PRINT));
} else {
    $question_of_the_day = question_for_date($today, $history);
}

echo $question_of_the_day->question;
?>