<?php
require "config.php";
?>


<section class="content__right col-md-4">
    <div class="block">
        <h3>Мы натираем</h3>
        <div class="block__content">
            <script type="text/javascript" src="//ra.revolvermaps.com/0/0/6.js?i=02op3nb0crr&amp;m=7&amp;s=320&amp;c=e63100&amp;cr1=ffffff&amp;f=arial&amp;l=0&amp;bv=90&amp;lx=-420&amp;ly=420&amp;hi=20&amp;he=7&amp;hc=a8ddff&amp;rs=80" async="async"></script>
        </div>
    </div>

    <div class="block">
        <h3>Топ читаемых статей</h3>
        <div class="block__content">
            <div class="articles articles__vertical">

                <?php $articles = mysqli_query($connection, "SELECT articles.*, categories.name AS catname FROM articles LEFT JOIN categories ON articles.category=categories.id ORDER BY articles.views DESC LIMIT 5;"); ?>

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
                    <div class="article__image" style="background-image: url(/media/images/post-image.jpg);"></div>
                    <div class="article__info">
                        <a href="#">Название статьи</a>
                        <div class="article__info__meta">
                            <small>Категория: <a href="#">Программирование</a></small>
                        </div>
                        <div class="article__info__preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna ...</div>
                    </div>
                </article> -->

            </div>
        </div>
    </div>

    <div class="block">
        <h3>Комментарии</h3>
        <div class="block__content">
            <div class="articles articles__vertical">
                <?php $articles = mysqli_query($connection, "SELECT comments.*, articles.title AS article, users.username, users.avatar AS avatar FROM comments LEFT JOIN articles ON comments.article_id=articles.id LEFT JOIN users ON comments.author_id=users.id ORDER BY comments.pubdate DESC LIMIT 5;"); ?>

                <?php while ($item = mysqli_fetch_assoc($articles)) {
                ?>
                <article class="article">
                    <div class="article__image" style="background-image: url(/media/images/<?php echo $item['avatar'];?>);"></div>
                    <div class="article__info">
                        <a href="#"><?php echo $item['username'];?></a>
                        <div class="article__info__meta">
                            <small><a href="#"><?php echo $item['article'];?></a></small>
                        </div>
                        <div class="article__info__preview"><?php echo $item['text'];?></div>
                    </div>
                </article>
                    <?php
                            }
                                ?>
                <!-- <article class="article">
                    <div class="article__image" style="background-image: url(/media/images/post-image.jpg);"></div>
                    <div class="article__info">
                        <a href="#">Jonny Flame</a>
                        <div class="article__info__meta">
                            <small><a href="#">Название статьи #1</a></small>
                        </div>
                        <div class="article__info__preview">Бла бла бла бла бла бла бла, и думаю еще что бла бла бла бла бла бла бла ...</div>
                    </div>
                </article>

                <article class="article">
                    <div class="article__image" style="background-image: url(/media/images/post-image.jpg);"></div>
                    <div class="article__info">
                        <a href="#">Jonny Flame</a>
                        <div class="article__info__meta">
                            <small><a href="#">Название статьи #1</a></small>
                        </div>
                        <div class="article__info__preview">Бла бла бла бла бла бла бла, и думаю еще что бла бла бла бла бла бла бла ...</div>
                    </div>
                </article>

                <article class="article">
                    <div class="article__image" style="background-image: url(/media/images/post-image.jpg);"></div>
                    <div class="article__info">
                        <a href="#">Jonny Flame</a>
                        <div class="article__info__meta">
                            <small><a href="#">Название статьи #1</a></small>
                        </div>
                        <div class="article__info__preview">Бла бла бла бла бла бла бла, и думаю еще что бла бла бла бла бла бла бла ...</div>
                    </div>
                </article>

                <article class="article">
                    <div class="article__image" style="background-image: url(/media/images/post-image.jpg);"></div>
                    <div class="article__info">
                        <a href="#">Jonny Flame</a>
                        <div class="article__info__meta">
                            <small><a href="#">Название статьи #1</a></small>
                        </div>
                        <div class="article__info__preview">Бла бла бла бла бла бла бла, и думаю еще что бла бла бла бла бла бла бла ...</div>
                    </div>
                </article>

                <article class="article">
                    <div class="article__image" style="background-image: url(/media/images/post-image.jpg);"></div>
                    <div class="article__info">
                        <a href="#">Jonny Flame</a>
                        <div class="article__info__meta">
                            <small><a href="#">Название статьи #1</a></small>
                        </div>
                        <div class="article__info__preview">Бла бла бла бла бла бла бла, и думаю еще что бла бла бла бла бла бла бла ...</div>
                    </div>
                </article> -->

            </div>
        </div>
    </div>
</section>