<?php

namespace App\Models;

use Core\Model;

class NewsModel extends Model
{
    public function getAllNews($countItemsPage, $offset): array
    {
        // $countItemsPage = trim(htmlspecialchars($countItemsPage));
        // $offset = trim(htmlspecialchars($offset));
        
        $data = $this->dbContext->prepare("SELECT * FROM news ORDER BY date DESC LIMIT ? OFFSET ?");

        // $data->bindValue(':countItemPage', $countItemsPage);
        // $data->bindValue(':offset', $offset);
        $data->bindParam(1, $countItemsPage, \PDO::PARAM_INT);
        $data->bindParam(2, $offset, \PDO::PARAM_INT);
        $data->execute();
        return $data->fetchAll(\PDO::FETCH_ASSOC);
        // return $data->execute();
        // $data = $this->dbContext->query("SELECT * FROM news ORDER BY date DESC LIMIT $countItemsPage OFFSET $offset");
        // return $data->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getNewsById($id)
    {
        $id = trim(htmlspecialchars($id));
        $data = $this->dbContext->query("SELECT * FROM news WHERE id=$id");
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