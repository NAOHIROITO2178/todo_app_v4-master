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
    <!-- 勉強 -->
    <main data-token="<?= Utils::h($_SESSION['token']); ?>">
      <header>
        <h1>勉強</h1>
        <span class="purge">Purge</span>
      </header>

      <form id="form-study">
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

    <!-- 部活動 -->
    <main data-token="<?= Utils::h($_SESSION['token']); ?>">
      <header>
        <h1>部活動</h1>
        <span class="purge">Purge</span>
      </header>

      <form id="form-club">
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

    <!-- 友達 -->
    <main data-token="<?= Utils::h($_SESSION['token']); ?>">
      <header>
        <h1>友達</h1>
        <span class="purge">Purge</span>
      </header>

      <form id="form-friend">
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
  <!-- 恋愛  -->
    <main data-token="<?= Utils::h($_SESSION['token']); ?>">
      <header>
        <h1>恋愛</h1>
        <span class="purge">Purge</span>
      </header>

      <form id="form-love">
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

    <!-- 進路  -->
    <main data-token="<?= Utils::h($_SESSION['token']); ?>">
      <header>
        <h1>進路</h1>
        <span class="purge">Purge</span>
      </header>

      <form id="form-course">
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

    <!-- 学校行事  -->
    <main data-token="<?= Utils::h($_SESSION['token']); ?>">
      <header>
        <h1>学校行事</h1>
        <span class="purge">Purge</span>
      </header>

      <form id="form-event">
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
<footer>
<p id="myid"></p>
    <script>
        t = 0;
        var elem = document.getElementById("myid");
 
        function myfunc(){
            var date = new Date();
            var hours = date.getHours();
            var minutes = date.getMinutes();
            var seconds = date.getSeconds();
            elem.innerHTML = hours+":"+minutes+":"+seconds+;
        }
 
        t = setInterval("myfunc()", 500);
 
    </script>
  </footer>
</html>