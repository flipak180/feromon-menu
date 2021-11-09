<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\AppAsset;
use yii\bootstrap4\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
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
                <span class="phone">+7 (921) 933-36-33</span>
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
            <div class="category-item">
                <a href="" class="opener" style="background-image: url(/design/img/menu1.webp)">Кальян</a>
                <div class="content">
                    <div class="subcategory-item">
                        <h3>Фруктовые чаши <span class="line"></span></h3>
                        <p>Закажите кальян на фруктовой чаше (табак включен в стоимость чаши)</p>
                        <div class="products-list grid-4">
                            <div class="products-list-item">
                                <div class="image">
                                    <img class="img-responsive" src="/design/img/product1.webp" alt="">
                                    <img class=img-responsive src="/design/img/product1-1.webp" alt="">
                                </div>
                                <h4>Апельсин</h4>
                                <div class="price">690 р.</div>
                                <a href="" class="btn">Добавить к заказу</a>
                            </div>
                            <div class="products-list-item">
                                <div class="image">
                                    <img class="img-responsive" src="/design/img/product1.webp" alt="">
                                    <img class=img-responsive src="/design/img/product1-1.webp" alt="">
                                </div>
                                <h4>Апельсин</h4>
                                <div class="price">690 р.</div>
                                <a href="" class="btn">Добавить к заказу</a>
                            </div>
                            <div class="products-list-item">
                                <div class="image">
                                    <img class="img-responsive" src="/design/img/product1.webp" alt="">
                                    <img class=img-responsive src="/design/img/product1-1.webp" alt="">
                                </div>
                                <h4>Апельсин</h4>
                                <div class="price">690 р.</div>
                                <a href="" class="btn">Добавить к заказу</a>
                            </div>
                            <div class="products-list-item">
                                <div class="image">
                                    <img class="img-responsive" src="/design/img/product1.webp" alt="">
                                    <img class=img-responsive src="/design/img/product1-1.webp" alt="">
                                </div>
                                <h4>Апельсин</h4>
                                <div class="price">690 р.</div>
                                <a href="" class="btn">Добавить к заказу</a>
                            </div>
                            <div class="products-list-item">
                                <div class="image">
                                    <img class="img-responsive" src="/design/img/product1.webp" alt="">
                                    <img class=img-responsive src="/design/img/product1-1.webp" alt="">
                                </div>
                                <h4>Апельсин</h4>
                                <div class="price">690 р.</div>
                                <a href="" class="btn">Добавить к заказу</a>
                            </div>
                            <div class="products-list-item">
                                <div class="image">
                                    <img class="img-responsive" src="/design/img/product1.webp" alt="">
                                    <img class=img-responsive src="/design/img/product1-1.webp" alt="">
                                </div>
                                <h4>Апельсин</h4>
                                <div class="price">690 р.</div>
                                <a href="" class="btn">Добавить к заказу</a>
                            </div>
                        </div>
                        <div class="products-table">
                            <div class="products-table-item">
                                <div>
                                    <h4>Кальян по фиксированной стоимости</h4>
                                </div>
                                <div>
                                    <strong class="price">1200 р.</strong>
                                    <a href="" class="btn">Добавить к заказу</a>
                                </div>
                            </div>
                            <div class="products-table-item">
                                <div>
                                    <h4>Усилители крепости и вкуса</h4>
                                    <p>(ассортимент уточняйте у мастера по кальяну)</p>
                                </div>
                                <div>
                                    <strong class="price">100 р.</strong>
                                    <a href="" class="btn">Добавить к заказу</a>
                                </div>
                            </div>
                            <div class="products-table-item">
                                <div>
                                    <h4>Электронная сигарета Soak</h4>
                                    <p>1500 затяжек</p>
                                </div>
                                <div>
                                    <strong class="price">850 р.</strong>
                                    <a href="" class="btn">Добавить к заказу</a>
                                </div>
                            </div>
                            <div class="products-table-item">
                                <div>
                                    <h4>Табак Take Away</h4>
                                </div>
                                <div>
                                    <strong class="price">450 р.</strong>
                                    <a href="" class="btn">Добавить к заказу</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="category-item">
                <a href="" class="opener" style="background-image: url(/design/img/menu2.webp)">Breakfast by Feromon</a>
                <div class="content">
                    <h4>Конопляный чай</h4>
                    <div class="products-table">
                        <div class="products-table-item">
                            <div>
                                <h4>Большая шишка</h4>
                                <p>Конопляная Большая Шишка, прогретая лучами солнца в Долине Хубачар на территории Республики, сконцентрировала в себе все самое необходимое и полезное от Сибирской природы</p>
                            </div>
                            <div>
                                <strong class="price">180р / 460 р.</strong>
                                <a href="" class="btn">Добавить к заказу</a>
                            </div>
                        </div>
                        <div class="products-table-item">
                            <div>
                                <h4>Освежающий лимон</h4>
                                <p>Конопляный чай с утонченным звучанием конопляных листьев и освежающий ароматной цедрой лимона. Организм получает полезные вещества, наполняется витаминами и антиоксидантами в целом улучшается самочувствие</p>
                            </div>
                            <div>
                                <strong class="price">200 р / 480 р.</strong>
                                <a href="" class="btn">Добавить к заказу</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="category-item">
                <a href="" class="opener" style="background-image: url(/design/img/menu3.webp)">Бизнес ланчи</a>
                <div class="content">
                    <div class="products-list grid-2">
                        <div class="products-list-item">
                            <div class="image">
                                <img class="img-responsive" src="/design/img/product2.jpg" alt="">
                            </div>
                            <h4>Апельсин</h4>
                            <p>Воздушные медовые коржи с прослойкой из сметанного крема не оставят вас равнодушными</p>
                            <div class="price">690 р.</div>
                            <a href="" class="btn">Добавить к заказу</a>
                        </div>
                        <div class="products-list-item">
                            <div class="image">
                                <img class="img-responsive" src="/design/img/product3.webp" alt="">
                            </div>
                            <h4>Апельсин</h4>
                            <div class="price">690 р.</div>
                            <a href="" class="btn">Добавить к заказу</a>
                        </div>
                        <div class="products-list-item">
                            <div class="image">
                                <img class="img-responsive" src="/design/img/product2.jpg" alt="">
                            </div>
                            <h4>Апельсин</h4>
                            <div class="price">690 р.</div>
                            <a href="" class="btn">Добавить к заказу</a>
                        </div>
                        <div class="products-list-item">
                            <div class="image">
                                <img class="img-responsive" src="/design/img/product3.webp" alt="">
                            </div>
                            <h4>Апельсин</h4>
                            <div class="price">690 р.</div>
                            <a href="" class="btn">Добавить к заказу</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="category-item">
                <a href="" class="opener" style="background-image: url(/design/img/menu4.webp)">Азиатское меню</a>
                <div class="content">
                    <div class="products-list grid-3">
                        <div class="products-list-item">
                            <div class="image">
                                <img class="img-responsive" src="/design/img/product2.jpg" alt="">
                            </div>
                            <h4>Апельсин</h4>
                            <p>Воздушные медовые коржи с прослойкой из сметанного крема не оставят вас равнодушными</p>
                            <div class="price">690 р.</div>
                            <a href="" class="btn">Добавить к заказу</a>
                        </div>
                        <div class="products-list-item">
                            <div class="image">
                                <img class="img-responsive" src="/design/img/product3.webp" alt="">
                            </div>
                            <h4>Апельсин</h4>
                            <div class="price">690 р.</div>
                            <a href="" class="btn">Добавить к заказу</a>
                        </div>
                        <div class="products-list-item">
                            <div class="image">
                                <img class="img-responsive" src="/design/img/product2.jpg" alt="">
                            </div>
                            <h4>Апельсин</h4>
                            <div class="price">690 р.</div>
                            <a href="" class="btn">Добавить к заказу</a>
                        </div>
                        <div class="products-list-item">
                            <div class="image">
                                <img class="img-responsive" src="/design/img/product3.webp" alt="">
                            </div>
                            <h4>Апельсин</h4>
                            <div class="price">690 р.</div>
                            <a href="" class="btn">Добавить к заказу</a>
                        </div>
                        <div class="products-list-item">
                            <div class="image">
                                <img class="img-responsive" src="/design/img/product3.webp" alt="">
                            </div>
                            <h4>Апельсин</h4>
                            <div class="price">690 р.</div>
                            <a href="" class="btn">Добавить к заказу</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="category-item">
                <a href="" class="opener" style="background-image: url(/design/img/menu5.webp)">Закуски</a>
                <div class="content"></div>
            </div>
            <div class="category-item">
                <a href="" class="opener" style="background-image: url(/design/img/menu6.webp)">Салаты</a>
                <div class="content"></div>
            </div>
            <div class="category-item">
                <a href="" class="opener" style="background-image: url(/design/img/menu7.webp)">Супы</a>
                <div class="content"></div>
            </div>
            <div class="category-item">
                <a href="" class="opener" style="background-image: url(/design/img/menu8.webp)">Стрит фуд</a>
                <div class="content"></div>
            </div>
            <div class="category-item">
                <a href="" class="opener" style="background-image: url(/design/img/menu9.webp)">Пасты</a>
                <div class="content"></div>
            </div>
            <div class="category-item">
                <a href="" class="opener" style="background-image: url(/design/img/menu10.webp)">Горячее</a>
                <div class="content"></div>
            </div>
            <div class="category-item">
                <a href="" class="opener" style="background-image: url(/design/img/menu11.webp)">Гарниры и соусы</a>
                <div class="content"></div>
            </div>
            <div class="category-item">
                <a href="" class="opener" style="background-image: url(/design/img/menu12.webp)">Десерты</a>
                <div class="content"></div>
            </div>
            <div class="category-item">
                <a href="" class="opener" style="background-image: url(/design/img/menu13.webp)">Пивная карта</a>
                <div class="content"></div>
            </div>
            <div class="category-item">
                <a href="" class="opener" style="background-image: url(/design/img/menu14.webp)">Вино</a>
                <div class="content"></div>
            </div>
            <div class="category-item">
                <a href="" class="opener" style="background-image: url(/design/img/menu15.webp)">Коктейли</a>
                <div class="content"></div>
            </div>
            <div class="category-item">
                <a href="" class="opener" style="background-image: url(/design/img/menu16.webp)">Крепкий алкоголь (50 мл)</a>
                <div class="content"></div>
            </div>
            <div class="category-item">
                <a href="" class="opener" style="background-image: url(/design/img/menu17.webp)">Б/а напитки</a>
                <div class="content"></div>
            </div>
            <div class="category-item">
                <a href="" class="opener" style="background-image: url(/design/img/menu18.webp)">Чай</a>
                <div class="content"></div>
            </div>
            <div class="category-item">
                <a href="" class="opener" style="background-image: url(/design/img/menu19.webp)">Кофе</a>
                <div class="content"></div>
            </div>
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
                    <p>+7(921) 933-36-33</p>
                    <p><strong>Адрес:</strong></p>
                    <p>Ефимова, 3 Ж</p>
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
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
