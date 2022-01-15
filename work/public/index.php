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

?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <title>My Todos</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <div class="six_Todos">
    <div>
      <!-- 勉強 -->
      <main data-token="<?= Utils::h($_SESSION['token']); ?>">
        <header>
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

      <!-- 部活動 -->
      <main data-token="<?= Utils::h($_SESSION['token']); ?>">
        <header>
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

      <!-- 友達 -->
      <main data-token="<?= Utils::h($_SESSION['token']); ?>">
        <header>
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
    </div>

    <div>
      <!-- 恋愛  -->
      <main data-token="<?= Utils::h($_SESSION['token']); ?>">
        <header>
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

      <!-- 進路  -->
      <main data-token="<?= Utils::h($_SESSION['token']); ?>">
        <header>
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

      <!-- 学校行事  -->
      <main data-token="<?= Utils::h($_SESSION['token']); ?>">
        <header>
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
    </div>
  </div>
  <form>
    <input type="text" name="title" placeholder="ここに入力してください">
    エンターキーで追加<br>
    <label>
      <input type="radio" name="category" value="study" checked>勉強
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
  </form>
  <script src="js/main.js">
  </script>
</body>
<footer>
<span id="ShowNowTime"></span>

<script type="text/javascript">
timerID = setInterval('time()',500); 

function minute2keta(num) {
   var ret;
   if( num < 10 ) { ret = "0" + num; }
   else { ret = num; }
   return ret;
}

function time() {
	document.getElementById("ShowNowTime").innerHTML = now();
}

function now() {
	var now = new Date();
	var year = now.getFullYear();
	var mon = now.getMonth()+1; 
	var day = now.getDate();
  var you = now.getDay();
  var week = new Array("日","月","火","水","木","金","土");
	var hour = now.getHours();
	var min = minute2keta(now.getMinutes());

	var view = year + " " + mon + "/" + day + "(" +week[you]+ ") " + hour + ":" + min; 
	return view;
}
</script>
</footer>
<form action = "http://localhost:8573">
<button id = "go_chatRoom">困ったことがあったらこちらへどうぞ！</button>
</form>
</html>