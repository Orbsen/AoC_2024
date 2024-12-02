<?php

require_once 'functions.php';

$functions = new Functions();

$inputRows = file('input02');

$safeReports = $functions->getSafeReports($inputRows);

echo 'result of Day02-01: ' . count($safeReports);