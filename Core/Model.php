<?php

namespace Core;

use Config;

class Model {

  protected $dbContext;

  public function __construct() {
    $test = require 'Config/ConfigDataBase.php';
    try {
    $this->dbContext = new \PDO("mysql:host={$test['host']};dbname={$test['dbname']};", $test['user'], $test['pass']);
    $this->dbContext->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      var_dump($e->errorInfo);
    }
  }
}