<?php

class FluentSqlConditionEquals
  extends FluentSqlCondition {

  protected $_field;
  protected $_values;

  public function __construct(FluentSqlField $field, $values, $useCondition = TRUE) {
    if ($useCondition) {
      $this->_field = $field;
      $this->_values = $values;
    }
  }

  public function getCondition($field, $values) {
    $result = '';
    if (is_array($values) && count($values) == 1) {
      $values = current($values);
    }

    if (is_array($values)) {
      $valueSet = array();
      foreach ($values as $value) {
        $valueSet[] = "'" . $this->escapeString($value) . '"';
      }
      $result = sprintf(' %s IN ( %s ) ', $this->escapeString($field), implode(', ', $valueSet));
    } else {
      $result = sprintf(" %s = '%s' ", $this->escapeString($field), $this->escapeString($values));
    }
    return $result;
  }

  public function get() {
    if ($this->_field && $this->_values) {
      return $this->getCondition((string)$this->_field, $this->_values);
    }
  }

}