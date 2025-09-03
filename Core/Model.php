<?php

namespace Core;

use Config;

class Model
{

  protected $dbContext;

  public function __construct()
  {
    $config = require 'Config/ConfigDataBase.php';
    try 
    {
      $this->dbContext = new \PDO("mysql:host={$config['host']};dbname={$config['dbname']};", $config['user'], $config['pass']);
      $this->dbContext->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    } 
    catch (\PDOException $e) 
    {
      var_dump($e->errorInfo);
    }
  }
}