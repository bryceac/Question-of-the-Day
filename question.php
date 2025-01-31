<?php
    class Question {
        public $date;
        public $question;

        /**
         * constructor that allow an associative array to be used to initialize
         * Question object.
         * 
         * If no array is provided, it creates an empty Question Object.
         */
        function __construct($array = []) {
            if (empty($array)) {
                $this->date = "";
                $this->question = "";
            } else {
                $this->date = $array["date"];
                $this->question = $array["question"];
            }
        }
    }
?>