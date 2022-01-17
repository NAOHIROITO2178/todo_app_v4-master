<?php

require_once(__DIR__ . '/../app/config.php');

use MyApp\Database;
use MyApp\Todo;
use MyApp\Utils;

$pdo = Database::getInstance();

$todo = new Todo($pdo);
$todo->processPost();
$study_todos = $todo->getAll("study");
$club_todos = $todo->getAll("club");
$friend_todos = $todo->getAll("friend");
$love_todos = $todo->getAll("love");
$course_todos = $todo->getAll("course");
$event_todos = $todo->getAll("event");
$hobby_todos = $todo->getAll("hobby");
$other_todos = $todo->getAll("other");

?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <title>My Todos</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <header class="top_title">
    みんなのShoolTodo
  </header>
  <div class="seven_Todos">
    <div>
      <!-- 勉強 -->
      <main data-token="<?= Utils::h($_SESSION['token']); ?>">
        <header data-id="study">
          <h1>勉強</h1>
          <span class="purge">Purge</span>
        </header>
        <ul>
          <?php foreach ($study_todos as $todo) : ?>
            <li data-id="<?= Utils::h($todo->id); ?>">
              <input class="toggle_checkbox" type="checkbox" <?= $todo->is_done ? 'checked' : ''; ?>>
              <span><?= Utils::h($todo->title); ?></span>
              <span class="delete">x</span>
            </li>
          <?php endforeach; ?>
        </ul>
      </main>
      <!-- 勉強 -->

      <!-- 部活動 -->
      <main data-token="<?= Utils::h($_SESSION['token']); ?>">
        <header data-id="club">
          <h1>部活動</h1>
          <span class="purge">Purge</span>
        </header>
        <ul>
          <?php foreach ($club_todos as $todo) : ?>
            <li data-id="<?= Utils::h($todo->id); ?>">
              <input class="toggle_checkbox" type="checkbox" <?= $todo->is_done ? 'checked' : ''; ?>>
              <span><?= Utils::h($todo->title); ?></span>
              <span class="delete">x</span>
            </li>
          <?php endforeach; ?>
        </ul>
      </main>
      <!-- 部活動 -->

      <!-- 友達 -->
      <main data-token="<?= Utils::h($_SESSION['token']); ?>">
        <header data-id="friend">
          <h1>友達</h1>
          <span class="purge">Purge</span>
        </header>
        <ul>
          <?php foreach ($friend_todos as $todo) : ?>
            <li data-id="<?= Utils::h($todo->id); ?>">
              <input class="toggle_checkbox" type="checkbox" <?= $todo->is_done ? 'checked' : ''; ?>>
              <span><?= Utils::h($todo->title); ?></span>
              <span class="delete">x</span>
            </li>
          <?php endforeach; ?>
        </ul>
      </main>
      <!-- 友達 -->

      <!-- 恋愛  -->
      <main data-token="<?= Utils::h($_SESSION['token']); ?>">
        <header data-id="love">
          <h1>恋愛</h1>
          <span class="purge">Purge</span>
        </header>
        <ul>
          <?php foreach ($love_todos as $todo) : ?>
            <li data-id="<?= Utils::h($todo->id); ?>">
              <input class="toggle_checkbox" type="checkbox" <?= $todo->is_done ? 'checked' : ''; ?>>
              <span><?= Utils::h($todo->title); ?></span>
              <span class="delete">x</span>
            </li>
          <?php endforeach; ?>
        </ul>
      </main>
      <!-- 恋愛  -->
    </div>
    <div>
      <!-- 進路  -->
      <main data-token="<?= Utils::h($_SESSION['token']); ?>">
        <header data-id="course">
          <h1>進路</h1>
          <span class="purge">Purge</span>
        </header>
        <ul>
          <?php foreach ($course_todos as $todo) : ?>
            <li data-id="<?= Utils::h($todo->id); ?>">
              <input class="toggle_checkbox" type="checkbox" <?= $todo->is_done ? 'checked' : ''; ?>>
              <span><?= Utils::h($todo->title); ?></span>
              <span class="delete">x</span>
            </li>
          <?php endforeach; ?>
        </ul>
      </main>
      <!-- 進路  -->

      <!-- 学校行事  -->
      <main data-token="<?= Utils::h($_SESSION['token']); ?>">
        <header data-id="event">
          <h1>学校行事</h1>
          <span class="purge">Purge</span>
        </header>
        <ul>
          <?php foreach ($event_todos as $todo) : ?>
            <li data-id="<?= Utils::h($todo->id); ?>">
              <input class="toggle_checkbox" type="checkbox" <?= $todo->is_done ? 'checked' : ''; ?>>
              <span><?= Utils::h($todo->title); ?></span>
              <span class="delete">x</span>
            </li>
          <?php endforeach; ?>
        </ul>
      </main>
      <!-- 学校行事  -->

      <!-- 趣味  -->
      <main data-token="<?= Utils::h($_SESSION['token']); ?>">
        <header data-id="hobby">
          <h1>趣味</h1>
          <span class="purge">Purge</span>
        </header>
        <ul>
          <?php foreach ($hobby_todos as $todo) : ?>
            <li data-id="<?= Utils::h($todo->id); ?>">
              <input class="toggle_checkbox" type="checkbox" <?= $todo->is_done ? 'checked' : ''; ?>>
              <span><?= Utils::h($todo->title); ?></span>
              <span class="delete">x</span>
            </li>
          <?php endforeach; ?>
        </ul>
      </main>
      <!-- 趣味  -->

      <!-- その他 -->
      <main data-token="<?= Utils::h($_SESSION['token']); ?>">
        <header data-id="other">
          <h1>その他</h1>
          <span class="purge">Purge</span>
        </header>
        <ul>
          <?php foreach ($other_todos as $todo) : ?>
            <li data-id="<?= Utils::h($todo->id); ?>">
              <input class="toggle_checkbox" type="checkbox" <?= $todo->is_done ? 'checked' : ''; ?>>
              <span><?= Utils::h($todo->title); ?></span>
              <span class="delete">x</span>
            </li>
          <?php endforeach; ?>
        </ul>
      </main>
      <!-- その他 -->
    </div>
  </div>
  <form>
    <input type="text" name="title" placeholder="ここに入力してください">
    <label>
      <input type="radio" name="category" value="study">勉強
    </label>
    <label>
      <input type="radio" name="category" value="club">部活
    </label>
    <label>
      <input type="radio" name="category" value="friend">友達
    </label>
    <label>
      <input type="radio" name="category" value="love">恋愛
    </label>
    <label>
      <input type="radio" name="category" value="course">進路
    </label>
    <label>
      <input type="radio" name="category" value="event">学校行事
    </label>
    <label>
      <input type="radio" name="category" value="hobby">趣味
    </label>
    <label>
      <input type="radio" name="category" value="other">その他
    </label>
  </form>
  エンターキーで追加
  <script src="js/main.js">
  </script>
</body>
<footer>
  <span id="ShowNowTime"></span>

  <script type="text/javascript">
    timerID = setInterval('time()', 500);

    function minute2keta(num) {
      let addketa;
      if (num < 10) {
        addketa = "0" + num;
      } else {
        addketa = num;
      }
      return addketa;
    }

    function time() {
      document.getElementById("ShowNowTime").innerHTML = now();
    }

    function now() {
      let nowTime = new Date();
      let year = nowTime.getFullYear();
      let mon = nowTime.getMonth() + 1;
      let day = nowTime.getDate();
      let you = nowTime.getDay();
      let week = new Array("日", "月", "火", "水", "木", "金", "土");
      let hour = nowTime.getHours();
      let min = minute2keta(nowTime.getMinutes());

      let view = year + " " + mon + "/" + day + "(" + week[you] + ") " + hour + ":" + min;
      return view;
    }
  </script>
</footer>
<form action="http://localhost:8573">
  <button id="go_chatRoom">困ったことがあったらこちらへどうぞ！</button>
</form>

</html>