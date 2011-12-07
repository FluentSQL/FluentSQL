<?php

class FluentSqlQueryConditionEquals
  extends FluentSqlQueryCondition {

  public function __construct($field, $likeString) {
    $this->_field = $field;
    $this->_likeString = $likeString;
  }

  public function get() {
    return sprintf(
      " %s LIKE '%s' ",
      $this->escapeString($this->_field),
      $this->escapeString($this->_likeString)
    );
  }

}