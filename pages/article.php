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
    <?php 
    $article = mysqli_query($connection, "SELECT * FROM articles WHERE id=" . (int)$_GET['id']);
    $item=mysqli_fetch_assoc($article);
    mysqli_query($connection, "UPDATE articles SET views=views+1 WHERE id=".$item['id'])
    ?>

    <div id="content">
      <div class="container">
        <div class="row">
          <section class="content__left col-md-8">
            <div class="block">
              <a><?php echo $item['views']; ?> просмотров</a>
              <h3><?php echo $item['title']; ?></h3>
              <div class="block__content">
                <img src="/media/images/post-image.jpg">

                <div class="full-text">
                  <?php echo $item['text']; ?>
                </div>
              </div>
            </div>
            <?php $comments=mysqli_query($connection, "SELECT comments.*, users.username, users.avatar FROM comments LEFT JOIN users ON comments.author_id=users.id WHERE article_id=" . (int)$_GET['id']);?>
            <div class="block">
              <a href="#comment-add-form">Добавить свой</a>
              <h3>Комментарии к статье</h3>
              <div class="block__content">
                <div class="articles articles__vertical">
                  <?php
                    while ($item1 = mysqli_fetch_assoc($comments))
                    {
                      ?><article class="article">
                      <div class="article__image" style="background-image: url(/media/images/<?php echo $item1['avatar']; ?>);"></div>
                      <div class="article__info">
                        <a href="#"><?php echo  $item1['username']?></a>
                        <div class="article__info__meta">
                          <small><?php echo  $item1['pubdate']?></small>
                        </div>
                        <div class="article__info__preview"><?php echo  $item1['text']?></div>
                      </div>
                    </article><?php
                    }
                  ?>
                  <!-- <article class="article">
                    <div class="article__image" style="background-image: url(https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?s=125);"></div>
                    <div class="article__info">
                      <a href="#">Артём aka Snake</a>
                      <div class="article__info__meta">
                        <small>10 минут назад</small>
                      </div>
                      <div class="article__info__preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna ...</div>
                    </div>
                  </article>

                  <article class="article">
                    <div class="article__image" style="background-image: url(https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?s=125);"></div>
                    <div class="article__info">
                      <a href="#">Виталий aka Umka</a>
                      <div class="article__info__meta">
                        <small>7 дней назад</small>
                      </div>
                      <div class="article__info__preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna ...</div>
                    </div>
                  </article>

                  <article class="article">
                    <div class="article__image" style="background-image: url(https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?s=125);"></div>
                    <div class="article__info">
                      <a href="#">Олег aka SnakeEye</a>
                      <div class="article__info__meta">
                        <small>1.1.1970</small>
                      </div>
                      <div class="article__info__preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna ...</div>
                    </div>
                  </article> -->

                </div>
              </div>
            </div>

            <div class="block" id="comment-add-form">
              <h3>Добавить комментарий</h3>
              <div class="block__content">
                <form class="form">
                  <div class="form__group">
                    <div class="row">
                      <div class="col-md-6">
                        <input type="text" class="form__control" required="" name="name" placeholder="Имя">
                      </div>
                      <div class="col-md-6">
                        <input type="text" class="form__control" required="" name="nickname" placeholder="Никнейм">
                      </div>
                    </div>
                  </div>
                  <div class="form__group">
                    <textarea name="text" required="" class="form__control" placeholder="Текст комментария ..."></textarea>
                  </div>
                  <div class="form__group">
                    <input type="submit" class="form__control" name="do_post" value="Добавить комментарий">
                  </div>
                </form>
              </div>
            </div>
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