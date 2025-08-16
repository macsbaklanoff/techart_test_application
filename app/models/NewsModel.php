<?php

require_once 'core/model.php';

class NewsModel extends Model {
  public function getAllNews($count_items_page, $offset): array {
    $data = $this->db_context->query("SELECT * FROM news LIMIT $count_items_page OFFSET $offset");
    return $data->fetchAll(PDO::FETCH_ASSOC);
  }
  
  public function getNewsById($id) {
    $data = $this->db_context->query("SELECT * FROM news WHERE id=$id");
    return $data->fetch(PDO::FETCH_ASSOC);
  }

  public function getLastNews() {
    $data = $this->db_context->query("SELECT * FROM news ORDER BY id DESC LIMIT 1");
    return $data->fetch(PDO::FETCH_ASSOC);
  }
}