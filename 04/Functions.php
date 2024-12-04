<?php

class Functions
{
    /**
     * @param string[] $inputRows
     * @return string[][]
     */
    public function parseInput(array $inputRows): array
    {
        $result = [];

        foreach ($inputRows as $inputRow) {
            $result[] = str_split(trim($inputRow));
        }
        return $result;
    }

    /**
     * @param string $word
     * @param string[][] $input
     * @return int
     */
    public function findWord(string $word, array $input): int
    {
        $maxRowCount = count($input) - 1;

        $maxCountWord = strlen($word);

        $keyWord = str_split($word);
        $startingChar = $keyWord[0];

        $resultCount = 0;

        foreach ($input as $keyRow => $inputRow) {
            $rowLength = count($inputRow) - 1;
            $isUpClear = $keyRow >=  $maxCountWord - 1;
            $isDownClear = $keyRow <= $maxRowCount - ($maxCountWord - 1);

            foreach ($inputRow as $keyChar => $char) {
                if ($char !== $startingChar) {
                    continue;
                }

                $isLeftClear = $keyChar >= $maxCountWord - 1;
                $isRightClear = $keyChar <= $rowLength - ($maxCountWord - 1);

                if ($isUpClear && $this->findVerticalWordReverse($keyRow, $keyChar, $keyWord, $input)) {
                    $resultCount++;
                }

                if (($isUpClear && $isLeftClear) && $this->findDiagonalWordUpReversed($keyRow, $keyChar, $keyWord, $input)) {
                    $resultCount++;
                }

                if (($isUpClear && $isRightClear) && $this->findDiagonalWordUp($keyRow, $keyChar, $keyWord, $input)) {
                    $resultCount++;
                }

                if ($isLeftClear && $this->findHorizontalWordReversed($keyRow, $keyChar, $keyWord, $input)) {
                    $resultCount++;
                }

                if ($isRightClear && $this->findHorizontalWord($keyRow, $keyChar, $keyWord, $input)) {
                    $resultCount++;
                }

                if ($isDownClear && $this->findVerticalWord($keyRow, $keyChar, $keyWord, $input)) {
                    $resultCount++;
                }

                if (($isDownClear && $isLeftClear) && $this->findDiagonalWordDownReversed($keyRow, $keyChar, $keyWord, $input)) {
                    $resultCount++;
                }

                if (($isDownClear && $isRightClear) && $this->findDiagonalWordDown($keyRow, $keyChar, $keyWord, $input)) {
                    $resultCount++;
                }
            }
        }

        return $resultCount;
    }

    /**
     * @param int $yCord
     * @param int $xCord
     * @param string[] $word
     * @param string[][] $input
     * @return bool
     */
    protected function findVerticalWordReverse(int $yCord, int $xCord, array $word, array $input): bool
    {
        $firstLetter = array_shift($word);

        for ($i = 0; $i < count($word); $i++) {
            if ($word[$i] !== $input[$yCord - ($i + 1)][$xCord]) {
                return false;
            }
        }
        return true;
    }

    /**
     * @param int $yCord
     * @param int $xCord
     * @param string[] $word
     * @param string[][] $input
     * @return bool
     */
    protected function findVerticalWord(int $yCord, int $xCord, array $word, array $input): bool
    {
        $firstLetter = array_shift($word);

        for ($i = 0; $i < count($word); $i++) {
            if ($word[$i] !== $input[$yCord + ($i + 1)][$xCord]) {
                return false;
            }
        }
        return true;
    }

    /**
     * @param int $yCord
     * @param int $xCord
     * @param string[] $word
     * @param string[][] $input
     * @return bool
     */
    protected function findDiagonalWordUpReversed(int $yCord, int $xCord, array $word, array $input): bool
    {
        $firstLetter = array_shift($word);

        for ($i = 0; $i < count($word); $i++) {
            if ($word[$i] !== $input[$yCord - ($i + 1)][$xCord - ($i + 1)]) {
                return false;
            }
        }
        return true;
    }

    /**
     * @param int $yCord
     * @param int $xCord
     * @param string[] $word
     * @param string[][] $input
     * @return bool
     */
    protected function findDiagonalWordUp(int $yCord, int $xCord, array $word, array $input): bool
    {
        $firstLetter = array_shift($word);

        for ($i = 0; $i < count($word); $i++) {
            if ($word[$i] !== $input[$yCord - ($i + 1)][$xCord + ($i + 1)]) {
                return false;
            }
        }
        return true;
    }

    /**
     * @param int $yCord
     * @param int $xCord
     * @param string[] $word
     * @param string[][] $input
     * @return bool
     */
    protected function findHorizontalWordReversed(int $yCord, int $xCord, array $word, array $input): bool
    {
        $firstLetter = array_shift($word);

        for ($i = 0; $i < count($word); $i++) {
            if ($word[$i] !== $input[$yCord][$xCord - ($i + 1)]) {
                return false;
            }
        }
        return true;
    }

    /**
     * @param int $yCord
     * @param int $xCord
     * @param string[] $word
     * @param string[][] $input
     * @return bool
     */
    protected function findHorizontalWord(int $yCord, int $xCord, array $word, array $input): bool
    {
        $firstLetter = array_shift($word);

        for ($i = 0; $i < count($word); $i++) {
            if ($word[$i] !== $input[$yCord][$xCord + ($i + 1)]) {
                return false;
            }
        }
        return true;
    }

    /**
     * @param int $yCord
     * @param int $xCord
     * @param string[] $word
     * @param string[][] $input
     * @return bool
     */
    protected function findDiagonalWordDownReversed(int $yCord, int $xCord, array $word, array $input): bool
    {
        $firstLetter = array_shift($word);

        for ($i = 0; $i < count($word); $i++) {
            if ($word[$i] !== $input[$yCord + ($i + 1)][$xCord - ($i + 1)]) {
                return false;
            }
        }
        return true;
    }

    /**
     * @param int $yCord
     * @param int $xCord
     * @param string[] $word
     * @param string[][] $input
     * @return bool
     */
    protected function findDiagonalWordDown(int $yCord, int $xCord, array $word, array $input): bool
    {
        $firstLetter = array_shift($word);

        for ($i = 0; $i < count($word); $i++) {
            if ($word[$i] !== $input[$yCord + ($i + 1)][$xCord + ($i + 1)]) {
                return false;
            }
        }
        return true;
    }
}