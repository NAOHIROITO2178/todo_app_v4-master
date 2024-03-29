<?php

namespace MyApp;

class Todo
{
  private $pdo;

  public function __construct($pdo)
  {
    $this->pdo = $pdo;
    Token::create();
  }

  public function processPost()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      Token::validate();
      $action = filter_input(INPUT_GET, 'action');
    
      switch ($action) {
        case 'add':
          $id = $this->add();
          header('Content-Type: application/json');
          echo json_encode(['id' => $id]);
          break;
        case 'toggle':
          $isDone = $this->toggle();
          header('Content-Type: application/json');
          echo json_encode(['is_done' => $isDone]);
          break;
        case 'delete':
          $this->delete();
          break;
        case 'purge':
          $this->purge();
          break;
        default:
          exit;
      }

      exit;
    }
  }

  private function add()
  {
    $title = trim(filter_input(INPUT_POST, 'title'));
    $category = trim(filter_input(INPUT_POST, 'category'));

    if ($title === '') {
      return;
    }
  
    $stmt = $this->pdo->prepare("INSERT INTO todos (title,category) VALUES (:title,:category)");
    $stmt->bindValue('title', $title, \PDO::PARAM_STR);
    $stmt->bindValue('category', $category, \PDO::PARAM_STR);
    $stmt->execute();
    return (int) $this->pdo->lastInsertId();
  }
  
  private function toggle()
  {
    $id = filter_input(INPUT_POST, 'id');
    if (empty($id)) {
      return;
    }

    $stmt = $this->pdo->prepare("SELECT * FROM todos WHERE id = :id");
    $stmt->bindValue('id', $id, \PDO::PARAM_INT);
    $stmt->execute();
    $todo = $stmt->fetch();
    if (empty($todo)) {
      header('HTTP', true, 404);
      exit;
    }
  
    $stmt = $this->pdo->prepare("UPDATE todos SET is_done = NOT is_done WHERE id = :id");
    $stmt->bindValue('id', $id, \PDO::PARAM_INT);
    $stmt->execute();

    return (boolean) !$todo->is_done;
  }
  
  private function delete()
  {
    $id = filter_input(INPUT_POST, 'id');
    if (empty($id)) {
      return;
    }
  
    $stmt = $this->pdo->prepare("DELETE FROM todos WHERE id = :id");
    $stmt->bindValue('id', $id, \PDO::PARAM_INT);
    $stmt->execute();
  }

  private function purge()
  {
    $category = filter_input(INPUT_POST, 'category');
    if (empty($category)) {
      return;
    }
    $stmt = $this->pdo->prepare("DELETE FROM todos WHERE is_done = 1 AND category = :category");
    $stmt->bindValue('category', $category, \PDO::PARAM_INT);
    $stmt->execute();
  }

  public function getAll($category)
  {
    $stmt = $this->pdo->prepare("SELECT * FROM todos WHERE category = :category ORDER BY id DESC");
    $stmt->bindValue('category', $category, \PDO::PARAM_INT);
    $stmt->execute();
    $todos = $stmt->fetchAll();
    return $todos;
  }
}