<?php

require_once(__DIR__.'/Autoload.php');
spl_autoload_register('FluentSqlAutoload::load');

function FluentSql() {
  return new FluentSqlBuilder();
}