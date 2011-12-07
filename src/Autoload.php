<?php

class FluentSqlAutoload {

  public static function load($className) {
    if (!class_exists($className)) {
      if (preg_match_all('([A-Z]{1}[a-z]+)', $className, $matches)) {
        $parts = $matches[0];
        array_shift($parts);
        array_shift($parts);
        $fileName = __DIR__.'/'.implode('/', $parts).'.php';
        if (file_exists($fileName)) {
          include_once($fileName);
        }
      }
    }
  }
}