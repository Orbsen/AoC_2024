<?php

require_once '../04/Functions.php';

$inputRows = file('input04');

$functions = new Functions();

$parsedInput = $functions->parseInput($inputRows);

$countOfSearchedWord = $functions->findWord('XMAS', $parsedInput);

echo ' result of Day04-01: ' . $countOfSearchedWord;
echo '<br>';

$countOfXWord = $functions->findXWord('MAS', $parsedInput);

echo ' result of Day04-02: ' . $countOfXWord;
