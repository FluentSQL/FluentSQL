<?php

class FluentSqlBuilder extends FluentSqlObject {

  protected $_fields = NULL;
  protected $_table = '';
  protected $_joins = array();
  protected $_where;


  public function get() {
    return $this->_buildQuery();
  }

  public function select() {
    $fields = func_get_args();
    foreach ($fields as $field) {
      $this->fields()->add($field);
    }
    return $this;
  }

  public function from(FluentSqlTable $table) {
    $this->_table = $table;
    return $this;
  }

  public function join(FluentSqlJoin $join) {
    FluentSqlConstraints::assertInstanceOf('FluentSqlJoin', $join);
    $this->_joins[] = $join;
    return $this;
  }

  public function where(FluentSqlCondition $condition) {
    if (func_num_args() > 1) {
      $condition = new FluentSqlConditionAnd(func_get_args());
    }
    $this->_where = $condition;
    return $this;
  }

  public function _buildQuery() {
    $result = sprintf(
      "SELECT %s FROM %s %s WHERE %s",
      $this->fields()->get(),
      $this->_table->get(),
      implode(' ', $this->_joins),
      $this->_where->get()
    );
    return FluentSqlFormatter::format($result);
  }

  public function fields(FluentSqlFields $fields = NULL) {
    if (!is_null($fields)) {
      $this->_fields = $fields;
    }
    if (is_null($this->_fields)) {
      $this->_fields = new FluentSqlFields();
    }
    return $this->_fields;
  }
}