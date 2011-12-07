<?php

class FluentSqlFormatter {

  public static function format($sqlString) {
    $sqlString = trim($sqlString);
    $sqlString = preg_replace('([\ ]{2,})', ' ', $sqlString);
    if (preg_match_all('([A-Z]+[^A-Z]+)', $sqlString, $matches)) {
      $parts = $matches[0];
      return implode("\n  ", $parts);
    }
  }
}