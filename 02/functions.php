<?php

class functions
{
    public const string ASC = 'asc';
    public const string DESC = 'desc';
    public const int MAX_LEVEL_DIFF = 3;

    /**
     * @param string[] $inputRows
     * @return string[]
     */
    public function getSafeReports(array $inputRows): array
    {
        $result = [];

        foreach ($inputRows as $row) {
            $numbers = explode(' ', $row);

            if ($this->calculateSafety($numbers)) {
                $result[] = $row;
            }
        }

        return $result;
    }

    /**
     * @param string[] $numbers
     * @return bool
     */
    protected function calculateSafety(array $numbers): bool
    {
        $maxLength = count($numbers);
        $direction = $numbers[0] < $numbers[1] ? self::ASC : self::DESC;

        foreach ($numbers as $key => $value) {
            if ($key === $maxLength - 1) {
                continue;
            }

            $currentValue = (int)$value;
            $nextValue = (int)$numbers[$key + 1];

            if ($currentValue === $nextValue) {
                return false;
            }

            $currentDirection = $currentValue < $nextValue ? self::ASC : self::DESC;
            $valueDifference = abs($currentValue - $nextValue);

            if ($direction !== $currentDirection) {
                return false;
            }

            if ($valueDifference > self::MAX_LEVEL_DIFF) {
                return false;
            }
        }
        return true;
    }
}