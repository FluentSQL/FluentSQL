<?php

class FluentSqlObject {

  public function escapeString($value) {
    FluentSqlConstraints::assertType('string', $value);
    return mysql_escape_string($value);
  }

}