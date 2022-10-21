<?php
require "includes/config.php";
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

    <?php include "includes/header.php"; ?>

    <div id="content">
      <div class="container">
        <div class="row">
          <section class="content__left col-md-8">
            <div class="block">
              <a href="pages/articles.php">Все записи</a>
              <h3>Новейшее в блоге</h3>
              <div class="block__content">
                <div class="articles articles__horizontal">

                  <?php $articles = mysqli_query($connection, "SELECT articles.*, categories.name AS catname FROM articles LEFT JOIN categories ON articles.category=categories.id ORDER BY articles.pubdate DESC LIMIT 4;"); ?>

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
                  <!-- <article class="article">
                    <div class="article__image" style="background-image: url(/media/images/post-image.jpg);"></div>
                    <div class="article__info">
                      <a href="#">Название статьи</a>
                      <div class="article__info__meta">
                        <small>Категория: <a href="#">Программирование</a></small>
                      </div>
                      <div class="article__info__preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna ...</div>
                    </div>
                  </article>

                  <article class="article">
                    <div class="article__image"></div>
                    <div class="article__info">
                      <a href="#">Название статьи #2</a>
                      <div class="article__info__meta">
                        <small>Категория: <a href="#">Lifestyle</a></small>
                      </div>
                      <div class="article__info__preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna ...</div>
                    </div>
                  </article>

                  <article class="article">
                    <div class="article__image"></div>
                    <div class="article__info">
                      <a href="#">Название статьи #3</a>
                      <div class="article__info__meta">
                        <small>Категория: <a href="#">Программирование</a></small>
                      </div>
                      <div class="article__info__preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna ...</div>
                    </div>
                  </article>

                  <article class="article">
                    <div class="article__image"></div>
                    <div class="article__info">
                      <a href="#">Название статьи #4</a>
                      <div class="article__info__meta">
                        <small>Категория: <a href="#">Lifestyle</a></small>
                      </div>
                      <div class="article__info__preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna ...</div>
                    </div>
                  </article> -->

                </div>
              </div>
            </div>

            <?php $categories = mysqli_query($connection, "SELECT * FROM categories"); ?>

            <?php while ($item = mysqli_fetch_assoc($categories)) {
            ?>
              <div class="block">
                <a href="pages/articles.php">Все записи</a>
                <h3><?php echo $item['name']; ?> [Новейшее]</h3>
                <div class="block__content">
                  <div class="articles articles__horizontal">

                    <?php $articles = mysqli_query($connection, "SELECT articles.* FROM articles WHERE articles.category=" . $item['id'] . " ORDER BY articles.pubdate DESC LIMIT 4;"); ?>
                    <?php while ($item2 = mysqli_fetch_assoc($articles)) {
                    ?>
                      <article class="article">
                        <div class="article__image" style="background-image: url(/media/images/<?php echo $item2['image']; ?>);"></div>
                        <div class="article__info">
                          <a href="pages/article.php?id=<?php echo $item2['id']; ?>"><?php echo $item2['title']; ?></a>
                          <div class="article__info__meta">
                            <small>Категория: <a href="#"><?php echo $item['name']; ?></a></small>
                          </div>
                          <div class="article__info__preview"><?php echo mb_substr(strip_tags($item2['text']), 0, 100, 'utf-8') . "..."; ?></div>
                        </div>
                      </article>
                    <?php
                    }
                    ?>
                  </div>
                </div>
              </div>
            <?php } ?>


            <!-- <a href="#">Все записи</a>
            <h3>Безопасность [Новейшее]</h3>

            <div class="block__content">
              <div class="articles articles__horizontal">

                <article class="article">
                  <div class="article__image"></div>
                  <div class="article__info">
                    <a href="#">Название статьи</a>
                    <div class="article__info__meta">
                      <small>Категория: <a href="#">Программирование</a></small>
                    </div>
                    <div class="article__info__preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna ...</div>
                  </div>
                </article>

                <article class="article">
                  <div class="article__image"></div>
                  <div class="article__info">
                    <a href="#">Название статьи #2</a>
                    <div class="article__info__meta">
                      <small>Категория: <a href="#">Lifestyle</a></small>
                    </div>
                    <div class="article__info__preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna ...</div>
                  </div>
                </article>

                <article class="article">
                  <div class="article__image"></div>
                  <div class="article__info">
                    <a href="#">Название статьи #3</a>
                    <div class="article__info__meta">
                      <small>Категория: <a href="#">Программирование</a></small>
                    </div>
                    <div class="article__info__preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna ...</div>
                  </div>
                </article>

                <article class="article">
                  <div class="article__image"></div>
                  <div class="article__info">
                    <a href="#">Название статьи #4</a>
                    <div class="article__info__meta">
                      <small>Категория: <a href="#">Lifestyle</a></small>
                    </div>
                    <div class="article__info__preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna ...</div>
                  </div>
                </article>

              </div>
            </div>
        </div> -->

            <!-- <div class="block">
          <a href="#">Все записи</a>
          <h3>Программирование [Новейшее]</h3>
          <div class="block__content">
            <div class="articles articles__horizontal">

              <article class="article">
                <div class="article__image"></div>
                <div class="article__info">
                  <a href="#">Название статьи</a>
                  <div class="article__info__meta">
                    <small>Категория: <a href="#">Программирование</a></small>
                  </div>
                  <div class="article__info__preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna ...</div>
                </div>
              </article>

              <article class="article">
                <div class="article__image"></div>
                <div class="article__info">
                  <a href="#">Название статьи #2</a>
                  <div class="article__info__meta">
                    <small>Категория: <a href="#">Lifestyle</a></small>
                  </div>
                  <div class="article__info__preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna ...</div>
                </div>
              </article>

              <article class="article">
                <div class="article__image"></div>
                <div class="article__info">
                  <a href="#">Название статьи #3</a>
                  <div class="article__info__meta">
                    <small>Категория: <a href="#">Программирование</a></small>
                  </div>
                  <div class="article__info__preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna ...</div>
                </div>
              </article>

              <article class="article">
                <div class="article__image"></div>
                <div class="article__info">
                  <a href="#">Название статьи #4</a>
                  <div class="article__info__meta">
                    <small>Категория: <a href="#">Lifestyle</a></small>
                  </div>
                  <div class="article__info__preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna ...</div>
                </div>
              </article> -->

            <!-- </div>
          </div> -->
            <!-- </div> -->
          </section>
          <?php
          include "includes/sidebar.php";
          ?>
        </div>
      </div>
    </div>

    <?php
    include "includes/footer.php";
    ?>

  </div>

</body>

</html>