<?php

require_once 'Functions_05.php';

$functions = new Functions_05();

$inputRows = file('input05');
//$inputRows = file('testInput05');

['ruleSet' => $ruleSet, 'updates' => $updates] = $functions->parseInput($inputRows);

$inOrderUpdates = $functions->getInOrderUpdates($ruleSet, $updates);

$sumOfMiddlePageNumber = $functions->getSumOfMiddlePageNumbers($inOrderUpdates);

echo 'Result Day05-01: ' . $sumOfMiddlePageNumber . '<br>';