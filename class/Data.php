<?php
namespace Macocci7\Research;

use Faker;

class Data
{
    private $limitLower = 0;
    private $limitUpper = 100;

    public function limit($lower, $upper)
    {
        if (!is_int($lower) || !is_int($upper)) return null;
        if ($lower >= $upper) return null;
        $this->limitLower = $lower;
        $this->limitUpper = $upper;
        return $this;
    }

    public function create($count)
    {
        if (!is_int($count)) return null;
        if ($count < 1) return null;
        $faker = Faker\Factory::create();
        $data = [];
        for ($i = 0; $i < $count; $i++) {
            $data[] = $faker->numberBetween($this->limitLower, $this->limitUpper);
        }
        return $data;
    }

    public function mean($data)
    {
        if (!is_array($data)) return null;
        if (count($data) === 0) return null;
        foreach ($data as $value) {
            if (!is_int($value) && !is_float($value)) return null;
        }
        return array_sum($data) / count($data);
    }

    public function diff($v1, $v2)
    {
        if (!is_int($v1) && !is_float($v1)) return null;
        if (!is_int($v2) && !is_float($v2)) return null;
        return $v1 - $v2;
    }

    public function diffRatio($v1, $v2)
    {
        if (!is_int($v1) && !is_float($v1)) return null;
        if (!is_int($v2) && !is_float($v2)) return null;
        if ($v2 === 0) return null;
        return $this->diff($v1, $v2) / $v2;
    }

    public function diffP($v1, $v2)
    {
        if (!is_int($v1) && !is_float($v1)) return null;
        if (!is_int($v2) && !is_float($v2)) return null;
        if ($v2 === 0) return null;
        return $this->diffRatio($v1, $v2) * 100;
    }
}