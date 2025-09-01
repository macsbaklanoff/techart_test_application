<?php

namespace App\Models\NewsModel;

use Model\Model;

class NewsModel extends Model {
  public function getAllNews($count_items_page, $offset): array {
    $data = $this->db_context->query("SELECT * FROM news ORDER BY date DESC LIMIT $count_items_page OFFSET $offset");
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

  public function getCountNews() {
    $data = $this->db_context->query("SELECT COUNT(*) as count FROM news");
    return (int)$data->fetch(PDO::FETCH_ASSOC)['count'];
  }
}