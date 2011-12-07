<?php

class FluentSqlJoin {

  protected $_joinType = ' JOIN ';

  public function __construct(FluentSqlTable $table) {
    $this->_table = $table;
  }

  public function get() {
    if (isset($this->_using)) {
      $condition = sprintf(' USING (%s)', $this->_using->name());
    }
    if (isset($this->_on)) {
      $condition = sprintf(' ON (%s)', $this->_condition->get());
    }
    $result = $this->_joinType . $this->_table->get() . $condition;
    return $result;
  }

  public static function create(FluentSqlTable $table) {
    return new self($table);
  }

  public function using(FluentSqlField $fieldName) {
    $this->_using = $fieldName;
    return $this;
  }

  public function on(FluentSqlCondition $condition) {
    $this->_condition = $condition;
    return $this;
  }

  public function __toString() {
    return $this->get();
  }

}