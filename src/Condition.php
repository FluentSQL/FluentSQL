<?php

abstract class FluentSqlQueryCondition extends FluentSqlObject {

  abstract public function get();

  public function __toString() {
    return $this->get();
  }
}