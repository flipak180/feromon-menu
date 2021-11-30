<?php
/* @var $spot Spot */
/* @var $dontKnow Taste */

use common\components\Helper;
use common\models\Product;
use common\models\SliderItem;
use common\models\Spot;
use common\models\Taste;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = $spot->title;

$productTree = Product::getTree($spot->id);
$dontKnow = Taste::find()->orderBy('RAND()')->one();
Yii::info($productTree);
?>

<aside>
    <input id="menu__toggle" type="checkbox" />
    <label class="menu__btn" for="menu__toggle">
        <span></span>
    </label>
    <ul class="menu__box">
        <?php foreach ($productTree as $rootCategory): ?>
            <?php if (!$rootCategory['is_active']) continue; ?>
            <li><a class="menu__item" href="#"><?= $rootCategory['title'] ?></a></li>
        <?php endforeach; ?>
    </ul>
</aside>

<div id="mini-cart">
    <div class="icon">
        <img src="/design/img/logo.webp" alt="" class="img-responsive">
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
    <video autoplay loop muted playsinline class="video1">
        <source src="/design/img/video.mp4">
    </video>
    <video autoplay loop muted playsinline  class="video2">
        <source src="/design/img/video2.mp4">
    </video>
    <div class="content">
        <h1>FEROMON MENU</h1>
        <p>Соблазн для искушенных - welcome to Feromon Lounge</p>
        <img src="/design/img/scroll.gif" alt="">
    </div>
</section>

<section class="slider">
    <?php foreach (SliderItem::getList() as $sliderItem): ?>
        <?php if ($sliderItem->link): ?>
            <a href="<?= $sliderItem->link ?>">
                <?= Helper::thumb($sliderItem->image, 578, 578, ['class' => 'img-responsive']) ?>
            </a>
        <?php else: ?>
            <?= Helper::thumb($sliderItem->image, 578, 578, ['class' => 'img-responsive']) ?>
        <?php endif ?>
    <?php endforeach; ?>
</section>

<section class="container-fluid menu">
    <div class="container">
        <?php foreach ($productTree as $rootCategory): ?>
            <?php if (!$rootCategory['is_active']) continue; ?>
            <div class="category-item">
                <a href="" class="opener" style="background-image: url(<?= Helper::thumb($rootCategory['image'], 1290, 124, [], true) ?>)"><?= $rootCategory['title'] ?></a>
                <div class="content">
                    <?= $rootCategory['description'] ?>
                    <?php foreach ($rootCategory['categories'] as $childCategory): ?>
                        <div class="subcategory-item">
                            <h3><?= $childCategory['title'] ?> <span class="line"></span></h3>
                            <?= $childCategory['description'] ?>
                            <?php if (count($childCategory['products'])): ?>
                                <?= $this->render('_products', ['category' => $childCategory]) ?>
                            <?php endif ?>
                            <?php foreach ($childCategory['categories'] as $subChildCategory): ?>
                                <div class="subcategory-item">
                                    <h4><?= $subChildCategory['title'] ?></h4>
                                    <?= $subChildCategory['description'] ?>
                                    <?php if (count($subChildCategory['products'])): ?>
                                        <?= $this->render('_products', ['category' => $subChildCategory]) ?>
                                    <?php endif ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                    <?php if (count($rootCategory['products'])): ?>
                        <?= $this->render('_products', ['category' => $rootCategory]) ?>
                    <?php endif ?>
                    <?php if ($rootCategory['title'] == 'Кальян'): ?>
                        <div class="text-center">
                            <button class="dont-know btn">Не знаю что покурить</button>
                        </div>
                    <?php endif ?>
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
                <p><small>Мы прислушиваемся к вашим пожеланиям!</small> <br> <a href="mailto:aduard24@bk.ru">Будем рады предложениям по меню!</a></p>
                <p><a href="" class="feedback-link">Ваши любимые блюда в нашем меню! Подскажите свои желания!</a></p>
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
<div id="cart-popup" class="popup"></div>
<div id="age-popup" class="popup">
    <p>Вам есть 18 лет?</p>
    <a href="">Да, мне есть 18 лет</a>
</div>
<div id="feedback-popup" class="popup">
    <?php $form = ActiveForm::begin(['action' => Url::to(['site/feedback'])]); ?>
        <textarea name="text" placeholder="Текст сообщения..."></textarea>
        <button class="btn">Отправить</button>
    <?php ActiveForm::end(); ?>
</div>

<?php if ($dontKnow): ?>
    <div id="dont-know-popup" class="popup">
        <p>Категория: <strong><?= $dontKnow->category ?></strong></p>
        <p>Название микса: <strong><?= $dontKnow->title ?></strong></p>
        <h4>Описание</h4>
        <?= $dontKnow->description ?>
    </div>
<?php endif ?>
