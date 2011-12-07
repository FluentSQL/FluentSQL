<?php

abstract class FluentSqlConditionGroup
  extends FluentSqlCondition {

  protected $_concatenator = '';

  protected $_conditions;

  public function __construct() {
    $conditions = func_get_args();
    if (func_num_args() == 1 && is_array($conditions[0])) {
      $conditions = $conditions[0];
    }
    foreach ($conditions as $condition) {
      FluentSqlConstraints::assertInstanceOf('FluentSqlCondition', $condition);
      $this->_conditions[] = $condition;
    }
  }

  public function get() {
    $conditions = array();
    foreach ($this->_conditions as $condition) {
      $conditionString = (string)$condition;
      if ($conditionString != '') {
        $conditions[] = $conditionString;
      }
    }
    return implode(' ' . $this->_concatenator . ' ', $conditions);
  }

}