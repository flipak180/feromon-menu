<?php
/* @var $spot Spot */
/* @var $dontKnow Taste */

use common\components\Helper;
use common\models\Category;
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
    <ul class="menu__box2">
            <li><a class="menu__item nolink" href="https://feromon.group/podbor-tabaka-nejroset-feromon/" target="_blank">Нейрокальян</a></li>
    </ul>
    <ul class="menu__box">
<!--        <a class="menu__item nolink" href="https://feromon.group/podbor-tabaka-nejroset-feromon/" target="_blank">Нейрокальян</a>-->
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
                <a href="https://vk.com/feromongroup" class="vk" target="_blank"></a>
<!--                <a href="" class="ig"></a>-->
<!--                <a href="" class="fb"></a>-->
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
	<a href="" class="feedback-link">
	    	<img src="/design/img/FG1.jpg" class="img-responsive">
    	</a>
    <?php foreach (SliderItem::getList() as $sliderItem): ?>

        <?php if (in_array($spot->id, $sliderItem->spots_ids)): ?>
            <?php if ($sliderItem->link): ?>
                <a href="<?= $sliderItem->link ?>">
                    <?= Helper::thumb($sliderItem->image, 578, 578, ['class' => 'img-responsive']) ?>
                </a>
            <?php else: ?>
                <?= Helper::thumb($sliderItem->image, 578, 578, ['class' => 'img-responsive']) ?>
            <?php endif ?>
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

                    <?php if ($rootCategory['title'] == 'Кальян'): ?>
                        <div class="content-subcategory">
                            <div class="category-item subcat">
                                <a href="" class="opener subopener" style="background-image: url(/assets/thumbnails/19/19388b28c24df06d6c58be439e5c0b2f.webp)">Цена кальяна</a>
                            </div>
                        </div>

                        <div class="subcategory-item subcat hide">
                        <div class="hookah-pre">
                            <div class="hookah-pre-caption">
                                <h2>РЕЖИМ TIME</h2>
                            </div>
                            <div class="hookah-pre-left">
                                <div class="sub-2cols">
                                    <div class="sub-2cols-left">
                                        <img src="/design/img/x1.png">
                                    </div>
                                    <div class="sub-2cols-right">
                                        1 час = 500 ₽ <br>
                                        Далее 1 мин. = 7 ₽
                                    </div>
                                </div>
                                <div class="sub-2cols">
                                    <div class="sub-2cols-left">
                                        <img src="/design/img/x2.png">
                                    </div>
                                    <div class="sub-2cols-right">
                                        1 час = 380 ₽ на человека <br>
                                        Далее 1 мин. = 5 ₽
                                    </div>
                                </div>
                            </div>
                            <div class="hookah-pre-right">
                                <h3>Что входит TIME?</h3>
                                <ul>
                                    <li>Замена чаши каждые 60 минут</li>
                                    <li>Безлимитный дымный кальян на базовом табаке</li>
                                    <li>Чай на выбор из богатой коллекции высших сортов</li>
                                    <li>Угощение для лучшего настроения!</li>
                                    <li>Игровые приставки и современные настольные игры</li>
                                </ul>
                            </div>
                        </div>

                        <div class="hookah-pre">
                            <div class="hookah-pre-left">
                                <div class="sub-1cols">
                                    <h3>КАЛЬЯН БАЗОВЫЙ </h3>
                                    <span class="minitxt">(входит в time) <br>Simple tea / Hotfeel</span>
                                </div>
                                <div class="sub-2cols">
                                    <div class="sub-2cols-left">
                                        <img src="/design/img/man.png">
                                    </div>
                                    <div class="sub-2cols-right">
                                        от 1 до 2 человек <br>
                                        1 кальян
                                    </div>
                                </div>
                                <div class="sub-2cols">
                                    <div class="sub-2cols-left">
                                        <img src="/design/img/group_man.png">
                                    </div>
                                    <div class="sub-2cols-right">
                                        от 3 до 4 человек<br>
                                        2 кальяна
                                    </div>
                                </div>
                                <div class="sub-2cols">
                                    <div class="sub-2cols-left">
                                        <img src="/design/img/5man.png">
                                    </div>
                                    <div class="sub-2cols-right">
                                        от 5 до 6 человек<br>
                                        3 кальяна
                                    </div>
                                </div>

                            </div>
                            <div class="hookah-pre-right with-border">
                                <h3>КАЛЬЯН НА ПРЕМИАЛЬНОМ ТАБАКЕ ... + 500 РУБ<br/>
									КАЛЬЯН НА ПРЕМИАЛЬНОМ ТАБАКЕ Tangiers... +800 РУБ</h3>
                                (неограниченное количество кальянов на стол) <br>
                                <ul class="no-bullet 2cols">
									
                                   
                                    <li>Adam&amp;Eva</li>
                                    <li>Insite</li>
                                    <li>Overdose</li>
									<li>Tangiers</li>
                                    <li>Daily Hookah</li>
                                    <li>Must Have</li>
                                    <li>Dark Side</li>
                                    <li>Black Burn</li>
                                    <li>Sebero</li>
                                    <li>Smoke Angels</li>
                                    <li>Nаш</li>
                                    <li>Aircraft</li>
									<?php
									if ($spot->id == '1' )
                                    {
                                        echo "<li>ISKRA</li>";
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php endif ?>

                    <?= $rootCategory['description'] ?>

                    <?php foreach ($rootCategory['categories'] as $childCategory): ?>
                        <?php if (!$childCategory['is_active']) continue; ?>

                        <?php if (($childCategory['view'] == Category::VIEW_ACCORDION) or ($childCategory['view'] == Category::VIEW_ACCORDION_TABLE) or ($childCategory['view'] == Category::VIEW_SLIDER)): ?>
                        
                            <div class="content-subcategory">
                                <div class="category-item subcat">
                                    <a href="" class="opener subopener" style="background-image: url(<?= Helper::thumb($childCategory['image'], 1000, 100, [], true) ?>)"><?= $childCategory['title'] ?></a>
                                </div>
                            </div>
                        <?php endif ?>

                        <div class="subcategory-item <? if(($childCategory['view'] == Category::VIEW_ACCORDION) or ($childCategory['view'] == Category::VIEW_ACCORDION_TABLE) or ($childCategory['view'] == Category::VIEW_SLIDER)) { echo "subcat hide"; } ?>">
                            <h3><?= $childCategory['title'] ?> <span class="line"></span></h3>
                            <?= $childCategory['description'] ?>
                            <?= $this->render('_products', ['category' => $childCategory]) ?>
                            <?php foreach ($childCategory['categories'] as $subChildCategory): ?>
                                <?php if (!$subChildCategory['is_active']) continue; ?>
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
                    <?= $this->render('_products', ['category' => $rootCategory]) ?>
<!--                    --><?php //if ($rootCategory['title'] == 'Кальян'): ?>
<!--                        <div class="text-center">-->
<!--                            <button class="dont-know btn">Не знаю что покурить</button>-->
<!--                        </div>-->
<!--                    --><?php //endif ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<section class="container-fluid map">
    <div class="container">
        <div class="left">
            <a href="/design/img/map22.jpg"><img src="/design/img/map22.jpg?v=12" alt="" class="img-responsive" width="100%"></a>
        </div>
        <div class="right">
            <div class="contacts">
<!-- 	            <p><a href="" class="feedback-link">Ваши любимые блюда в нашем меню! Подскажите свои желания!</a></p> -->
                <p><strong>Телефон:</strong></p>
                <p><?= $spot->phone ?></p>
                <p><strong>Адрес:</strong></p>
                <p><?= $spot->address ?></p>
            </div>
            <div class="social">
                <p>Мы в социальных сетях:</p>
                <div class="links">
                    <a href="https://vk.com/feromongroup" class="vk" target="_blank"></a>
<!--                    <a href="" class="ig"></a>-->
<!--                    <a href="" class="fb"></a>-->
                </div>
            </div>
            <div class="copy">
                <p>FEROMON GROUP</p>
                <a href="/site/politika">Политика конфиденциальности</a>
<!--                 <p><small>Мы прислушиваемся к вашим пожеланиям!</small> <br> <a href="mailto:aduard24@bk.ru">Будем рады предложениям по меню!</a></p> -->
                
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
