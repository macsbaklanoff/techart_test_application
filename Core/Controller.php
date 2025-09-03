<?php

namespace Core;

class Controller
{
    public function showPageNotFount()
    {
        require_once 'App/Views/PageNotFound.php';
        http_response_code(404);
    }
}