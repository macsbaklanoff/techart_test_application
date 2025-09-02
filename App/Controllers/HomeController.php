<?php

namespace App\Controllers;

use App\Models\NewsModel;

class HomeController
{
  public function index() {
    require_once __DIR__ ."/../Views/TemplateView.php";
  }
}