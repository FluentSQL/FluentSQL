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
    FluentSqlQueryJoin::create(
      new FluentSqlTable('order', 'o')
    )
    ->using(new FluentSqlField('user_id'))
  )
  ->join(
    FluentSqlQueryJoin::create(
      new FluentSqlTable('product', 'p')
    )
    ->using(new FluentSqlField('product_id'))
  )
  ->where(
    new FluentSqlQueryConditionEquals(
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
  FluentSqlQueryJoin::create(
      new FluentSqlTable('order', 'o')
    )->using(new FluentSqlField('user_id')))
  ->join(
  FluentSqlQueryJoin::create(
      new FluentSqlTable('products', 'p')
    )->using(new FluentSqlField('product_id'))
  )
  ->where(
    new FluentSqlQueryConditionEquals(
      new FluentSqlField('u.user_id'),
      '1234',
      ('1234' != 'abc')
    ),
    new FluentSqlQueryConditionEquals(
      new FluentSqlField('o.order_id'),
      'abc'
    )
  )
  ->get();
var_dump($sql);
