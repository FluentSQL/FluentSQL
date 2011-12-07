<?php

class FluentSqlElement extends FluentSqlObject {

  protected $_name;
  protected $_alias;

  public function __construct($name, $alias = FALSE) {
    $this->_name = (string)$name;
    $this->_alias = (string)$alias;
  }

  public function name($name = NULL) {
    if (!is_null($name)) {
      $this->_name = $name;
    }
    return $this->escapeString($this->_name);
  }

  public function alias($alias = NULL) {
    if (!is_null($alias)) {
      $this->_alias = $alias;
    }
    return $this->escapeString($this->_alias);
  }

  public function get() {
    if ($this->alias()) {
      return $this->name() . ' AS ' . $this->alias();
    }
    return $this->name();
  }

  public function __toString() {
    return (string)$this->name();
  }

}