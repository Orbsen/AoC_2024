<?php

require_once 'functions.php';

$functions = new Functions();

$inputRows = file('input02');

$unSafeReports = $functions->getUnsafeReports($inputRows);

$countSafeReports = count($inputRows) - count($unSafeReports);

echo 'result of Day02-01: ' . $countSafeReports . '<br>';

$reviewedSafeReports = $functions->calculateWithDampener($unSafeReports);

echo 'result of Day02-02: ' . count($reviewedSafeReports) + $countSafeReports . '<br>';