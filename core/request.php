<?php 
class Request {
  public string $uri;

  public function __construct($uri) {
    $this->uri = trim($uri, "/");
    }

  public function getMethod(): string {
    return $_SERVER['REQUEST_METHOD'];
  }
  
  public function isGet(): bool {
    return $this->getMethod() == 'GET';
  }

  public function isPost(): bool {
    return $this->getMethod() == 'POST';
  }

}