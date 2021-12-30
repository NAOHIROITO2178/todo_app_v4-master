<?php

require_once(__DIR__ . '/../app/config.php');

use MyApp\Database;
use MyApp\Todo;
use MyApp\Utils;

$pdo = Database::getInstance();

$todo = new Todo($pdo);
$todo->processPost();
$todos = $todo->getAll();

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>My Todos</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <div class = "six_Todos">
  <div>
  <main data-token="<?= Utils::h($_SESSION['token']); ?>">
    <header>
      <h1>Todos1</h1>
      <span class="purge">Purge</span>
    </header>

    <form>
      <input type="text" name="title" placeholder="Type new todo.">
    </form>

    <ul>
      <?php foreach ($todos as $todo): ?>
      <li data-id="<?= Utils::h($todo->id); ?>">
        <input type="checkbox" <?= $todo->is_done ? 'checked' : ''; ?>>
        <span><?= Utils::h($todo->title); ?></span>
        <span class="delete">x</span>
      </li>
      <?php endforeach; ?>
    </ul>
  </main>

  <main data-token="<?= Utils::h($_SESSION['token']); ?>">
    <header>
      <h1>Todos2</h1>
      <span class="purge">Purge</span>
    </header>

    <form>
      <input type="text" name="title" placeholder="Type new todo.">
    </form>

    <ul>
      <?php foreach ($todos as $todo): ?>
      <li data-id="<?= Utils::h($todo->id); ?>">
        <input type="checkbox" <?= $todo->is_done ? 'checked' : ''; ?>>
        <span><?= Utils::h($todo->title); ?></span>
        <span class="delete">x</span>
      </li>
      <?php endforeach; ?>
    </ul>
  </main>

  <main data-token="<?= Utils::h($_SESSION['token']); ?>">
    <header>
      <h1>Todos3</h1>
      <span class="purge">Purge</span>
    </header>

    <form>
      <input type="text" name="title" placeholder="Type new todo.">
    </form>

    <ul>
      <?php foreach ($todos as $todo): ?>
      <li data-id="<?= Utils::h($todo->id); ?>">
        <input type="checkbox" <?= $todo->is_done ? 'checked' : ''; ?>>
        <span><?= Utils::h($todo->title); ?></span>
        <span class="delete">x</span>
      </li>
      <?php endforeach; ?>
    </ul>
  </main>
  </div>

  <div>
  <main data-token="<?= Utils::h($_SESSION['token']); ?>">
    <header>
      <h1>Todos4</h1>
      <span class="purge">Purge</span>
    </header>

    <form>
      <input type="text" name="title" placeholder="Type new todo.">
    </form>

    <ul>
      <?php foreach ($todos as $todo): ?>
      <li data-id="<?= Utils::h($todo->id); ?>">
        <input type="checkbox" <?= $todo->is_done ? 'checked' : ''; ?>>
        <span><?= Utils::h($todo->title); ?></span>
        <span class="delete">x</span>
      </li>
      <?php endforeach; ?>
    </ul>
  </main>

  <main data-token="<?= Utils::h($_SESSION['token']); ?>">
    <header>
      <h1>Todos5</h1>
      <span class="purge">Purge</span>
    </header>

    <form>
      <input type="text" name="title" placeholder="Type new todo.">
    </form>

    <ul>
      <?php foreach ($todos as $todo): ?>
      <li data-id="<?= Utils::h($todo->id); ?>">
        <input type="checkbox" <?= $todo->is_done ? 'checked' : ''; ?>>
        <span><?= Utils::h($todo->title); ?></span>
        <span class="delete">x</span>
      </li>
      <?php endforeach; ?>
    </ul>
  </main>

  <main data-token="<?= Utils::h($_SESSION['token']); ?>">
    <header>
      <h1>Todos6</h1>
      <span class="purge">Purge</span>
    </header>

    <form>
      <input type="text" name="title" placeholder="Type new todo.">
    </form>

    <ul>
      <?php foreach ($todos as $todo): ?>
      <li data-id="<?= Utils::h($todo->id); ?>">
        <input type="checkbox" <?= $todo->is_done ? 'checked' : ''; ?>>
        <span><?= Utils::h($todo->title); ?></span>
        <span class="delete">x</span>
      </li>
      <?php endforeach; ?>
    </ul>
  </main>
  </div>
  </div>
  <script src="js/main.js">
  </script>
</body>
<footer id = "Time_zone">
  <?php
  date_default_timezone_set('Asia/Tokyo');
  $date = new DateTime('now');
  echo $date->format('Y m/d H:i');
  ?>
</footer>
</html>