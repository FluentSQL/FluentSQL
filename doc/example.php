<?php

require_once(__DIR__ . '/../src/FluentSql.php');

$sql = FluentSql()
  ->select(
    new FluentSqlField('*')
  )
  ->from(
    new FluentSqlTable('user', 'u')
  )
  ->join(
    FluentSqlJoin::create(
      new FluentSqlTable('order', 'o')
    )
    ->using(new FluentSqlField('user_id'))
  )
  ->join(
    FluentSqlJoin::create(
      new FluentSqlTable('product', 'p')
    )
    ->using(new FluentSqlField('product_id'))
  )
  ->where(
    new FluentSqlConditionEquals(
      new FluentSqlField('user_id'),
      '1'
    )
  )
  ->get();

var_dump($sql);

$sql = FluentSql()
  ->select(
    new FluentSqlField('name'),
    new FluentSqlField('email')
  )
  ->from(
    new FluentSqlTable('user', 'u')
  )
  ->join(
  FluentSqlJoin::create(
      new FluentSqlTable('order', 'o')
    )->using(new FluentSqlField('user_id')))
  ->join(
  FluentSqlJoin::create(
      new FluentSqlTable('products', 'p')
    )->using(new FluentSqlField('product_id'))
  )
  ->where(
    new FluentSqlConditionEquals(
      new FluentSqlField('u.user_id'),
      '1234',
      ('1234' != 'abc')
    ),
    new FluentSqlConditionEquals(
      new FluentSqlField('o.order_id'),
      'abc'
    )
  )
  ->get();
var_dump($sql);
