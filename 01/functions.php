<?php

/**
 * @param $inputRows
 * @return array $result [int[], int[]]
 */
function parseInput($inputRows): array
{
    $leftList = [];
    $rightList = [];

    foreach ($inputRows as $row) {
        $numbers = preg_split('/\s+/', $row);

        $leftList[] = $numbers[0];
        $rightList[] = $numbers[1];
    }
    return [$leftList, $rightList];
}

/**
 * @param int[] $leftList
 * @param int[] $rightList
 * @return int[]
 */
function getDifferenceDistant(array $leftList, array $rightList): array
{
    $result = [];

    foreach ($leftList as $key => $number) {
        $result[$key] = abs($number - $rightList[$key]);
    }
    return $result;
}

/**
 * @param int[] $leftList
 * @param int[] $rightList
 * @return int[]
 */
function getSimilarity(array $leftList, array $rightList): array
{
    $result = [];

    $mappedRightList = array_count_values($rightList);

    foreach ($leftList as $key => $number) {
        $result[$key] = $mappedRightList[$number] ? $number * $mappedRightList[$number] : 0;
    }
    return $result;
}
