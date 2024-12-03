<?php

require_once '../03/Functions.php';

$functions = new Functions();

$input = file_get_contents('input03');

$instructions = $functions->parse($input);

$result01 = 0;

foreach ($instructions[1] as $key => $firstNumber) {
    $result01 += (int)$firstNumber * (int)$instructions[2][$key];
}

echo 'Result for Day03-01: ' . $result01;

$result02 = $functions->parse02($input);

echo '<br />';
echo 'Result for Day03-02: ' . $result02;
