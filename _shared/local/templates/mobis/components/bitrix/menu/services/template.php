<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?php if (!empty($arResult)): ?>

    <div class="services-menu">
        <ul class="services-menu__list <?php if(!$arParams['SHOW_FEEDBACK']):?> services-menu__list--center<?php endif?>">
            <?php foreach($arResult as $arItem):?>
                <li class="services-menu__item">
                    <a href="<?=$arItem['LINK']?>" class="services-menu__link btn btn--white btn--transparent"><?=$arItem['TEXT']?></a>
                </li>
            <?php endforeach?>
        </ul>
        <?php if($arParams['SHOW_FEEDBACK']):?>
            <a href="#" class="services-menu__feedback" data-modal-ajax-open="order">Оставить заявку</a>
        <?php endif?>
    </div>

<?php endif ?>