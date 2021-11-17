<?php
/* @var $spot \common\models\Spot */

use common\components\Helper;
use common\models\Category;
use common\models\Product;

$this->title = $spot->title;
?>

<aside>
    <input id="menu__toggle" type="checkbox" />
    <label class="menu__btn" for="menu__toggle">
        <span></span>
    </label>
    <ul class="menu__box">
        <?php foreach (Category::getList(true) as $rootCategory): ?>
            <li><a class="menu__item" href="#"><?= $rootCategory->title ?></a></li>
        <?php endforeach; ?>
    </ul>
</aside>

<div id="mini-cart">
    <div class="icon">
        <img src="/design/img/cart.png" alt="" class="img-responsive">
    </div>
    <span></span>
    <strong></strong>
</div>

<header class="container-fluid">
    <div class="container">
        <div class="left">
            <a href="/" class="logo"></a>
            <span>Feromon Group — уникальный и самый масштабный Lounge проект Санкт-Петербурга</span>
        </div>
        <div class="right">
            <div class="social">
                <a href="" class="vk"></a>
                <a href="" class="ig"></a>
                <a href="" class="fb"></a>
            </div>
            <span class="phone"><?= $spot->phone ?></span>
        </div>
    </div>
</header>

<section class="video">
    <video autoplay loop muted>
        <source src="/design/img/video.mp4">
    </video>
    <div class="content">
        <h1>FEROMON MENU</h1>
        <p>Соблазн для искушенных - welcome to Feromon Lounge</p>
        <img src="/design/img/scroll.gif" alt="">
    </div>
</section>

<section class="slider">
    <img src="/design/img/slide1.webp" alt="">
    <img src="/design/img/slide2.webp" alt="">
    <img src="/design/img/slide3.webp" alt="">
    <img src="/design/img/slide4.webp" alt="">
    <img src="/design/img/slide5.webp" alt="">
    <img src="/design/img/slide6.webp" alt="">
</section>

<section class="container-fluid menu">
    <div class="container">
        <?php foreach (Product::getTree($spot->id) as $rootCategory): ?>
            <?php if (!count($rootCategory['categories'])) continue; ?>
            <div class="category-item">
                <a href="" class="opener" style="background-image: url(<?= $rootCategory['image'] ?>)"><?= $rootCategory['title'] ?></a>
                <div class="content">
                    <?= $rootCategory['description'] ?>
                    <?php foreach ($rootCategory['categories'] as $childCategory): ?>
                        <div class="subcategory-item">
                            <h3><?= $childCategory['title'] ?> <span class="line"></span></h3>
                            <?= $childCategory['description'] ?>
                            <?php if ($childCategory['view'] == Category::VIEW_TABLE): ?>
                                <div class="products-table">
                                    <?php foreach ($childCategory['products'] as $product): ?>
                                        <div class="products-table-item">
                                            <div>
                                                <h4><?= $product['title'] ?></h4>
                                            </div>
                                            <div>
                                                <strong class="price"><?= Helper::price($product['price']) ?></strong>
                                                <a href="" class="add-to-cart" data-id="<?= $product['id'] ?>">Добавить к заказу</a>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php else: ?>
                                <div class="products-list grid-<?= $childCategory['view'] ?>">
                                    <?php foreach ($childCategory['products'] as $product): ?>
                                        <div class="products-list-item">
                                            <div class="image">
                                                <img class="img-responsive" src="<?= $product['image'] ?>" alt="">
                                                <?php if ($product['image2']): ?>
                                                    <img class=img-responsive src="<?= $product['image2'] ?>" alt="">
                                                <?php endif ?>
                                            </div>
                                            <h4><?= $product['title'] ?></h4>
                                            <?= $product['description'] ?>
                                            <div class="price"><?= Helper::price($product['price']) ?></div>
                                            <a href="" class="add-to-cart" data-id="<?= $product['id'] ?>" data-image="<?= $product['image'] ?>">Добавить к заказу</a>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<section class="container-fluid map">
    <div class="container">
        <div class="left">
            <img src="/design/img/map.webp" alt="" class="img-responsive">
        </div>
        <div class="right">
            <div class="contacts">
                <p><strong>Телефон:</strong></p>
                <p><?= $spot->phone ?></p>
                <p><strong>Адрес:</strong></p>
                <p><?= $spot->address ?></p>
            </div>
            <div class="social">
                <p>Мы в социальных сетях:</p>
                <div class="links">
                    <a href="" class="vk"></a>
                    <a href="" class="ig"></a>
                    <a href="" class="fb"></a>
                </div>
            </div>
            <div class="copy">
                <p>FEROMON GROUP</p>
                <a href="">Политика конфиденциальности</a>
            </div>
        </div>
    </div>
</section>

<section class="container-fluid app">
    <div class="container">
        <div class="left">
            <h3>Скачивай приложение FEROMON и получай уникальный доступ к:</h3>
            <ul>
                <li>накопительной системе баллов, которые ты можешь потратить на эксклюзивный мерч и оплату счета</li>
                <li>партнерским программам и персональным скидкам от наших друзей</li>
                <li>новостям, акциям и подаркам от FEROMON</li>
                <li>удобной системе бронирования столиков в любом из наших заведений</li>
            </ul>
            <div class="links">
                <a href=""><img src="/design/img/ios.png" alt=""></a>
                <a href=""><img src="/design/img/android.png" alt=""></a>
            </div>
            <p><strong>Забирай первые приветственные 200 баллов при установке приложения!</strong></p>
        </div>
        <div class="right">
            <img src="/design/img/phone.webp" alt="" class="img-responsive">
        </div>
    </div>
</section>

<footer class="container-fluid">
    <div class="container">
        Feromon Group © <?= date('Y') ?>
    </div>
</footer>

<div id="overlay"></div>
<div id="cart-popup"></div>
<div id="age-popup">
    <p>Вам есть 18 лет?</p>
    <a href="">Да, мне есть 18 лет</a>
</div>
