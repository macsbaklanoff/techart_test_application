<?php

class Model {
  protected $db_context;

  public function __construct() {
    try {
    $this->db_context = new PDO("mysql:host=localhost;dbname=newsdb;", 'root', '');
    $this->db_context->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      var_dump($e->errorInfo);
    }
  }
}