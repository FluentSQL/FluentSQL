<?php

class FluentSqlFields extends FluentSqlObject {

  public function add(FluentSqlField $field) {
    $this->_fields[] = $field;
  }

  public function get() {
    return implode(', ', $this->_fields);
  }

}