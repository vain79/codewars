<?php

require __DIR__ . '/vendor/autoload.php';

use PHPUnit\Framework\TestCase;

function printerError($s) {
  $s_array = preg_split('//u', $s, null, PREG_SPLIT_NO_EMPTY);
  $count = 0;
  $errors = 0;
  foreach ($s_array as $item) {
    $count++;
    if (!preg_match('/[a-m]/', $item)) {
      $errors++;
    }
  }
  return $errors . '/' . $count;
}

//$printerError = printerError("kkkwwwaaaaaaaaaaaaaabbbbbbbbbbbbbbbbbbmmmmmmmmmmmmmmmmmmmxyz");
//echo $printerError . '<br>';

class PrinterErrorTestCases extends TestCase {
  private function revTest($actual, $expected) {
    $this->assertEquals($expected, $actual);
  }
  public function testBasics() {
    $s="aaaaaaaaaaaaaaaabbbbbbbbbbbbbbbbbbmmmmmmmmmmmmmmmmmmmxyz";
    $this->revTest(printerError($s), "3/56");
    $s = "kkkwwwaaaaaaaaaaaaaabbbbbbbbbbbbbbbbbbmmmmmmmmmmmmmmmmmmmxyz";
    $this->revTest(printerError($s), "6/60");
    $s = "kkkwwwaaaaaaaaaaaaaabbbbbbbbbbbbbbbbbbmmmmmmmmmmmmmmmmmmmxyzuuuuu";
    $this->revTest(printerError($s) , "11/65");
  }
}