<?php

require_once(__DIR__ . '/../app/config.php');

use MyApp\Database;
use MyApp\Todo;
use MyApp\Utils;

$pdo = Database::getInstance();

$todo = new Todo($pdo);
$todo->processPost();
$todos_study = $todo->getAll("study");
$todos_club = $todo->getAll("club");
$todos_friend = $todo->getAll("friend");
$todos_love = $todo->getAll("love");
$todos_course = $todo->getAll("course");
$todos_event = $todo->getAll("event");

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>My Todos</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <!-- 勉強 -->
  <div class = "study_div">
    <main data-token="<?= Utils::h($_SESSION['token']); ?>">
      <header>
        <h1>勉強</h1>
      <span class="purge">一括削除</span>
    </header>
    <form name = "study_form">     
      <input type="text" name="title" placeholder="ここに入力">
      <button id = "study_btn">追加</button>
    </form>
    
    <ul>
      <?php foreach ($todos_study as $todo): ?>
        <li data-id="<?= Utils::h($todo->id); ?>">
          <input type="checkbox" <?= $todo->is_done ? 'checked' : ''; ?>>
          <span><?= Utils::h($todo->title); ?></span>
        <span class="delete">x</span>
      </li>
      <?php endforeach; ?>
    </ul>
  </main>
  </div>

    <!-- 部活動
    <div class = "club_div">
      <main data-token="<?= Utils::h($_SESSION['token']); ?>">
        <header>
          <h1>部活動</h1>
          <span class="purge">一括削除</span>
        </header>
        <form name = "club_form">
          <input type="text" name="title" placeholder="ここに入力">
          <button id = "club_btn">追加</button>
        </form>
        
        <ul>
          <?php foreach ($todos_club as $todo): ?>
            <li data-id="<?= Utils::h($todo->id); ?>">
              <input type="checkbox" <?= $todo->is_done ? 'checked' : ''; ?>>
              <span><?= Utils::h($todo->title); ?></span>
              <span class="delete">x</span>
            </li>
            <?php endforeach; ?>
          </ul> 
        </main>
      </div>

    <!-- 友達関係 -->
    <main data-token="<?= Utils::h($_SESSION['token']); ?>">
    <header>
      <h1>友達関係</h1>
      <span class="purge">一括削除</span>
    </header>
    <form name = "friend_form">
      <input type="text" name="title" placeholder="ここに入力">
      <button id = "friend_btn">追加</button>
    </form>

    <ul>
      <?php foreach ($todos_friend as $todo): ?>
      <li data-id="<?= Utils::h($todo->id); ?>">
        <input type="checkbox" <?= $todo->is_done ? 'checked' : ''; ?>>
        <span><?= Utils::h($todo->title); ?></span>
        <span class="delete">x</span>
      </li>
      <?php endforeach; ?>
    </ul> 
    </main>

    <!-- 恋愛 -->
    <main data-token="<?= Utils::h($_SESSION['token']); ?>">
    <header>
      <h1>恋愛</h1>
      <span class="purge">一括削除</span>
    </header>
    <form name = "love_form">
      <input type="text" name="title" placeholder="ここに入力">
      <button id = "love_btn">追加</button>
    </form>

    <ul>
      <?php foreach ($todos_love as $todo): ?>
      <li data-id="<?= Utils::h($todo->id); ?>">
        <input type="checkbox" <?= $todo->is_done ? 'checked' : ''; ?>>
        <span><?= Utils::h($todo->title); ?></span>
        <span class="delete">x</span>
      </li>
      <?php endforeach; ?>
    </ul> 
    </main>

    <!-- 進路 -->
    <main data-token="<?= Utils::h($_SESSION['token']); ?>">
    <header>
      <h1>進路</h1>
      <span class="purge">一括削除</span>
    </header>
    <form name = "course_form">
      <input type="text" name="title" placeholder="ここに入力">
      <button id = "course_btn">追加</button>
    </form>

    <ul>
      <?php foreach ($todos_course as $todo): ?>
      <li data-id="<?= Utils::h($todo->id); ?>">
        <input type="checkbox" <?= $todo->is_done ? 'checked' : ''; ?>>
        <span><?= Utils::h($todo->title); ?></span>
        <span class="delete">x</span>
      </li>
      <?php endforeach; ?>
    </ul> 
    </main>

    <!-- 学校行事 -->
    <main data-token="<?= Utils::h($_SESSION['token']); ?>">
    <header>
      <h1>学校行事</h1>
      <span class="purge">一括削除</span>
    </header>
    <form name = "event_form">
      <input type="text" name="title" placeholder="ここに入力">
      <button id = "event_btn">追加</button>
    </form>

    <ul>
      <?php foreach ($todos_event as $todo): ?>
      <li data-id="<?= Utils::h($todo->id); ?>">
        <input type="checkbox" <?= $todo->is_done ? 'checked' : ''; ?>>
        <span><?= Utils::h($todo->title); ?></span>
        <span class="delete">x</span>
      </li>
      <?php endforeach; ?>
    </ul> 
    </main> -->

  <script src="js/main.js">
  </script>
</body>

</html>