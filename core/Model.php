<?php

namespace Model;

class Model {
  private $dsn = "mysql:host=localhost;dbname=newsdb;";
  private $user = 'root';
  private $pass = 'root';

  protected $db_context;

  public function __construct() {
    try {
    $this->db_context = new \PDO($this->dsn, $this->user, $this->pass);
    $this->db_context->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      var_dump($e->errorInfo);
    }
  }
}