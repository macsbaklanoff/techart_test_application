<?php

namespace App\Models;

use Core\Model;

class NewsModel extends Model
{
    public function getAllNews($countItemsPage, $offset): array
    {
        $data = $this->dbContext->prepare("SELECT * FROM news ORDER BY date DESC LIMIT :countItemPage OFFSET :offset");
        
        $data->bindParam(':countItemPage', $countItemsPage, \PDO::PARAM_INT);
        
        $data->bindParam(':offset', $offset, \PDO::PARAM_INT);
        
        $data->execute();
        
        return $data->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getNewsById($id)
    {
        
        $data = $this->dbContext->prepare("SELECT * FROM news WHERE id=:id");
        
        $data->bindParam(':id', $id, \PDO::PARAM_INT);
        
        $data->execute();
        
        return $data->fetch(\PDO::FETCH_ASSOC);
    }

    public function getLastNews()
    {
        
        $data = $this->dbContext->query("SELECT * FROM news ORDER BY id DESC LIMIT 1");
        
        return $data->fetch(\PDO::FETCH_ASSOC);
    }

    public function getCountNews()
    {
        
        $data = $this->dbContext->query("SELECT COUNT(*) as count FROM news");
        
        return (int) $data->fetch(\PDO::FETCH_ASSOC)['count'];
    }
}