<?php

class Functions
{
    /**
     * @param string $input
     * @return string[][]
     */
    public function parse(string $input): array
    {
        $result =[];
        $regex = '/mul\((\d{1,3}),(\d{1,3})\)/';

        preg_match_all($regex, $input, $result);

        return $result;
    }

    public function parse02(string $input): int
    {
        $result = 0;

        $sections = preg_split("/(do\(\)|don't\(\))/", $input, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);

        $collect = true;

        foreach ($sections as $section) {
            $section = trim($section);

            if ($section === 'do()') {
                $collect = true;
            } elseif ($section === "don't()") {
                $collect = false;
            } elseif ($collect) {
                $parsedSection = $this->parse($section);

                foreach ($parsedSection[1] as $key => $value) {
                    $result += (int)$value * (int)$parsedSection[2][$key];
                }
            }
        }

        return $result;
    }
}