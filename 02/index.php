<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <title>html作成ページ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <style>
    .child {
      /* 水平方向の中央揃え */
      margin: 0 auto;
    } 
  </style>
  <body>

  <?php
    $servername = "10.0.21.21";
    $username = "root";
    $password = "aws-test";
    $dbname = "TEST_BLOG";

    try {
        // PDO接続の作成
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
        
        // エラーモードを例外に設定
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // SQLクエリの実行
        $sql = "SELECT * FROM posts";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        // データの取得と表示
        if ($stmt->rowCount() > 0) {
            $posts = $stmt->fetchAll();
        } else {
            echo "データがありません";
        }
    }
    catch(PDOException $e) {
        echo "接続失敗: " . $e->getMessage();
    }

    // 接続を閉じる
    $conn = null;
  ?>

<h2 class="text-center mt-3 mb-5">CloudOps Lab Web-1a</h2>

    <div class="container">
      <?php foreach ($posts as $post) : ?>
      <div class="card">
        <div class="container">
          <div class="row">
            <div class="col-4 d-flex justify-content-center">
              <img src=<?php echo $post["image"]; ?> class="m-1 w-50 rounded-circle" alt="...">
            </div>
            <div class="col-8">
              <h5 class="card-title"><?php echo $post["title"]; ?></h5>
              <p class="card-text"><?php echo $post["detail"]; ?></p>
              <a href=<?php echo $post["link"]; ?> class="btn btn-primary">Go</a>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </body>
</html>
