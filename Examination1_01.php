<?php

/**
 * Examination1:
 * Research on Effect of Class Range
 */

require('../vendor/autoload.php');
require('./class/Data.php');

use Macocci7\PhpFrequencyTable\FrequencyTable;
use Macocci7\Research\Data;

$count = 10;
$data = [10, 20, 30, 45, 50, 55, 60, 65, 70, 75, 85, 90, 95];

$ft = new FrequencyTable();
$dt = new Data();

$ft->setClassRange(1);
$ft->setData($data);
$am = $dt->mean($data);
echo '"' . implode('","', ["ClassRange", "MF", "AM", "DIFF", "PDIFF"]) . '"' . "\n";
for ($i = 1; $i > 0.001; $i -= 0.001) {
    $ft->setClassRange($i);
    $mf = $ft->getMean();
    echo implode(",", [$i, $mf, $am, $dt->diff($mf, $am), $dt->diffP($mf, $am)]) . "\n";
}
