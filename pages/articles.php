<?php
require "../includes/config.php";
?>

<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <title><?php echo $config['title']; ?></title>

  <!-- Bootstrap Grid -->
  <link rel="stylesheet" type="text/css" href="/media/assets/bootstrap-grid-only/css/grid12.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

  <!-- Custom -->
  <link rel="stylesheet" type="text/css" href="/media/css/style.css">
</head>

<body>

  <div id="wrapper">

    <?php include "../includes/header.php"; ?>

    <div id="content">
      <div class="container">
        <div class="row">
          <section class="content__left col-md-8">
            <div class="block">
              <h3>Все записи</h3>
              <div class="block__content">
                <div class="articles articles__horizontal">

                  <?php $articles = mysqli_query($connection, "SELECT articles.*, categories.name AS catname FROM articles LEFT JOIN categories ON articles.category=categories.id ORDER BY articles.pubdate DESC;"); ?>

                  <?php while ($item = mysqli_fetch_assoc($articles)) {
                  ?><article class="article">
                      <div class="article__image" style="background-image: url(/media/images/<?php echo $item['image']; ?>);"></div>
                      <div class="article__info">
                        <a href="pages/article.php?id=<?php echo $item['id']; ?>"><?php echo $item['title']; ?></a>
                        <div class="article__info__meta">
                          <small>Категория: <a href="#"><?php echo $item['catname']; ?></a></small>
                        </div>
                        <div class="article__info__preview"><?php echo mb_substr(strip_tags($item['text']), 0, 100, 'utf-8') . "..."; ?></div>
                      </div>
                    </article><?php
                            }
                              ?>
                  
          </section>
          <?php
          include "../includes/sidebar.php";
          ?>
        </div>
      </div>
    </div>

    <?php
    include "../includes/footer.php";
    ?>

  </div>

</body>

</html>