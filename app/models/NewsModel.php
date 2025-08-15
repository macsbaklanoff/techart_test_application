<?php

require_once 'core/model.php';

class NewsModel extends Model {
  public function getAllNews(): array {
    $data = $this->db_context->query("SELECT * FROM news");
    return $data->fetchAll(PDO::FETCH_ASSOC);
  }
  
  public function getNewsById($id) {
    $data = $this->db_context->query("SELECT * FROM news WHERE id=$id");
    return $data->fetch(PDO::FETCH_ASSOC);
  }
}