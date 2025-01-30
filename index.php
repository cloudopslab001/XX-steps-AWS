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
      $posts = array(
        array(
          "title" => "AWS",
          "detail" => "XXステップで覚えるAWS",
          "image" => "./img/img1.jpg",
          "link" => "https://cloudopslab.net/xx%e3%82%b9%e3%83%86%e3%83%83%e3%83%97%e3%81%a7%e8%a6%9a%e3%81%88%e3%82%8baws/",
        ),
        array(
          "title" => "MariaDB",
          "detail" => "MariaDB入門",
          "image" => "./img/img2.jpg",
          "link" => "https://aws.amazon.com/jp/rds/mariadb/",
        )
      );
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
