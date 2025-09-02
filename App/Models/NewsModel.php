<?php

namespace App\Models;

use Core\Model;

class NewsModel extends Model {
  public function getAllNews($countItemsPage, $offset): array {
    $countItemsPage = trim(htmlspecialchars($countItemsPage));
    $offset = trim(htmlspecialchars($offset));
    $data = $this->dbContext->query("SELECT * FROM news ORDER BY date DESC LIMIT $countItemsPage OFFSET $offset");
    return $data->fetchAll(\PDO::FETCH_ASSOC);
  }
  
  public function getNewsById($id) {
    $id = trim(htmlspecialchars($id));
    // var_dump($id);
    $data = $this->dbContext->query("SELECT * FROM news WHERE id=$id");
    return $data->fetch(\PDO::FETCH_ASSOC);
  }

  public function getLastNews() {
    $data = $this->dbContext->query("SELECT * FROM news ORDER BY id DESC LIMIT 1");
    return $data->fetch(\PDO::FETCH_ASSOC);
  }

  public function getCountNews() {
    $data = $this->dbContext->query("SELECT COUNT(*) as count FROM news");
    return (int)$data->fetch(\PDO::FETCH_ASSOC)['count'];
  }
}