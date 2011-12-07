<?php

class FluentSqlConstraints {

  public static function assertInstanceOf($class, $object) {
    if (!$object instanceOf $class) {
      throw new UnexpectedValueException(
        sprintf(
          'Expected object of class %s, "%s" given.',
          $class,
          (is_object($object)) ? get_class($object) : gettype($object)
        )
      );
    }
  }

  public static function assertType($type, $value) {
    if (gettype($value) != $type) {
      throw new UnexpectedValueException(
        sprintf(
          'Expected value of type %s, "%s" given.',
          $type,
          (is_object($value)) ? get_class($value) : gettype($value)
        )
      );
    }
  }
}