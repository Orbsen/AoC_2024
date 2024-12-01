<?php

include 'functions.php';

$inputRows = file('input01');

$parsedArray = parseInput($inputRows);

$leftList = $parsedArray[0];
$rightList = $parsedArray[1];

$sortedLeftList = $leftList;
sort($sortedLeftList);

$sortedRightList = $rightList;
sort($sortedRightList);

$differenceDistance = getDifferenceDistant($sortedLeftList, $sortedRightList);

echo 'Result form Day 01-01 is '. array_sum($differenceDistance);

$similartyScore = getSimilarity($leftList, $rightList);

echo '<br />';
echo 'Result from Day 01-02 is '. array_sum($similartyScore);
