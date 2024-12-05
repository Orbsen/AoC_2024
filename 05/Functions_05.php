<?php

class Functions_05
{
    /**
     * @param string[] $input
     * @return string[][]
     */
    public function parseInput(array $input): array
    {
        $result = [];

        $blankLineIndex = array_search("\n", $input);

        if ($blankLineIndex !== false) {
            $result['ruleSet'] = array_slice($input, 0, $blankLineIndex);
            $result['updates'] = array_slice($input, $blankLineIndex + 1);
        }

        return $result;
    }

    /**
     * @param string[] $ruleSet
     * @param string[] $updates
     * @return string[]
     */
    public function getInOrderUpdates(array $ruleSet, array $updates): array
    {
        $result = [];

        foreach ($updates as $update) {
            $updateOrder = explode(',', $update);

            foreach ($ruleSet as $rule) {
                $rulePair = explode('|', $rule);

                $firstRuleCharIndex = array_search($rulePair[0], $updateOrder);
                $secondRuleCharIndex = array_search($rulePair[1], $updateOrder);

                if (!$firstRuleCharIndex || !$secondRuleCharIndex) {
                    continue;
                }

                if ($firstRuleCharIndex > $secondRuleCharIndex) {
                    continue 2;
                }
            }
            $result[] = $update;
        }
        return $result;
    }

    public function getSumOfMiddlePageNumbers(array $updates): int
    {
        $result = 0;
        foreach ($updates as $update) {
            $updateOrder = explode(',', $update);

            $count  = count($updateOrder);

            $middleIndex = ($count - 1) / 2;

            $result += (int)$updateOrder[$middleIndex];
        }
        return $result;
    }
}