<?php
/* @var $category array */

use common\components\Helper;
use common\models\Category;

?>
<?php if ($category['view'] == Category::VIEW_TABLE): ?>
    <div class="products-table">
        <?php foreach ($category['products'] as $product): ?>
            <div class="products-table-item">
                <div>
                    <h4><?= $product['title'] ?></h4>
                    <small><?= $product['description'] ?></small>
                </div>
                <?php if ($product['price'] > 0): ?>
                    <div>
                        <strong class="price"><?= Helper::price($product['price']) ?></strong>
                        <a href="" class="add-to-cart" data-id="<?= $product['id'] ?>">Добавить к заказу</a>
                    </div>
                <?php endif ?>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <?php if (($category['view'] == Category::VIEW_ACCORDION) || ($category['view'] == Category::VIEW_ACCORDION_TABLE) || ($category['view'] == Category::VIEW_SLIDER)) : ?>

    <?php endif ?>
    <div class="products-list grid-<?= $category['view'] ?>">
        <?php foreach ($category['products'] as $product): ?>
            <div class="products-list-item">
                <!-- style="background-image: url(<?= Helper::thumb($product['image'], 629, 420, [], true) ?>)" -->
                
                <div class="image">
                    <?= Helper::thumb($product['image'], 629, 420, ['class' => 'img-responsive']) ?>
                    <!--<img class="img-responsive" src="<?= $product['image'] ?>" alt="">-->
                    <?php if ($product['image2']): ?>
                        <?= Helper::thumb($product['image2'], 629, 420, ['class' => 'img-responsive']) ?>
                        <!--<img class=img-responsive src="<?= $product['image2'] ?>" alt="">-->
                    <?php endif ?>

                
                </div>
                <div class="caption-line">
                	<h4><?= $product['title'] ?></h4>
                </div>
                <div class="description-line">
                <?= $product['description'] ?>
                </div>
                <div class="price-line">
                <?php if ($product['price'] > 0): ?>
                    <div class="price"><?= Helper::price($product['price']) ?></div>
                    <a href="" class="add-to-cart" data-id="<?= $product['id'] ?>" data-image="<?= $product['image'] ?>">Добавить к заказу</a>
                <?php endif ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif ?>
