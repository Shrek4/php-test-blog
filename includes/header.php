<?php
require "config.php";
?>

<header id="header">
    <div class="header__top">
        <div class="container">
            <div class="header__top__logo">
                <h1><?php echo $config['title']; ?></h1>
            </div>
            <nav class="header__top__menu">
                <ul>
                    <li><a href="/">Главная</a></li>
                    <li><a href="/pages/about.php">О shrek</a></li>
                    <li><a href="/">Я ИГОРЬ</a></li>
                </ul>
            </nav>
        </div>
    </div>

    <?php $categories = mysqli_query($connection, "SELECT * FROM categories"); ?>

    <div class="header__bottom">
        <div class="container">
            <nav>
                <ul>
                    <?php
                    while ($item = mysqli_fetch_assoc($categories)) {
                        ?><li><a href="category.php?id=<?php echo $item['id'];?>"><?php echo $item['name'];?></a></li><?php
                    }
                    ?>
                    <!-- <li><a href="#">Безопасность</a></li>
                    <li><a href="#">Программирование</a></li>
                    <li><a href="#">Lifestyle</a></li>
                    <li><a href="#">Музыка</a></li>
                    <li><a href="#">Саморазвитие</a></li>
                    <li><a href="#">Гайды</a></li>
                    <li><a href="#">Обзоры</a></li> -->
                </ul>
            </nav>
        </div>
    </div>
</header>