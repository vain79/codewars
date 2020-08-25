<?php

require __DIR__ . '/vendor/autoload.php';

use PHPUnit\Framework\TestCase;

function bouncingBall($h, $bounce, $window) {
  echo $h . ' ' . $bounce . ' ' . $window . ' ';
  $hnow = $h;
  $count = 0;
  while ($hnow > $window) {
    $hnow = $bounce * $hnow;
    $count = $hnow > $window ? $count + 2 : $count + 1;

  }
  $count = $count == 0 ? -1 : $count;
  return $count;
}

class BouncingBallCases extends TestCase
{
  private function revTest($actual, $expected) {
    $this->assertEquals($expected, $actual);
  }
  public function testBasics() {
    $this->revTest(bouncingBall(3.0, 0.66, 1.5) , 3);
    $this->revTest(bouncingBall(30.0, 0.66, 1.5), 15);
    $this->revTest(bouncingBall(10, 0.6, 10), -1);
  }
}

//$bouncingBall = bouncingBall(3.0, 0.66, 1.5);
//echo $bouncingBall . '<br>';
//$bouncingBall = bouncingBall(30.0, 0.66, 1.5);
//echo $bouncingBall . '<br>';
//$bouncingBall = bouncingBall(10, 0.6, 10);
//echo $bouncingBall . '<br>';
