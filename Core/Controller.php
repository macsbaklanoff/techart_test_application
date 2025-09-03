<?php

namespace Core;
use App\Models\NewsModel;


class Controller
{
    public $countItemsPage = 4;

    public $totalCountNews;

    protected $newsModel;

    public function __construct() {
        $this->newsModel = new NewsModel();
        $this->totalCountNews = $this->newsModel->getCountNews();
    }

    public function showPageNotFount()
    {
        require_once 'App/Views/PageNotFound.php';
        http_response_code(404);
    }
}