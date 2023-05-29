<?php

/**
 * Examination2:
 * Research on Effect of Number of Data
 * Data Range is same as Examination1: 85 (10 ~ 95)
 */

require('../vendor/autoload.php');
require('./class/Data.php');

use Macocci7\PhpFrequencyTable\FrequencyTable;
use Macocci7\Research\Data;

$ft = new FrequencyTable();
$dt = new Data();
$dt->limit(10, 95);

$classRange = 1;
$ft->setClassRange($classRange);

echo '"' . implode('","', ["ClassRange", "NumberOfData", "MF", "AM", "DIFF", "PDIFF"]) . '"' . "\n";
for ($count = 13; $count <= 1000; $count++) {
    $data = $dt->create($count);
    $ft->setData($data);
    $am = $dt->mean($data);
    $mf = $ft->getMean();
    echo implode(",", [$classRange, $count, $mf, $am, $dt->diff($mf, $am), $dt->diffP($mf, $am)]) . "\n";
}
