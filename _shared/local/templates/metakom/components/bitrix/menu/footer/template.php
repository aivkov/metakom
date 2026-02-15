<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?php if (!empty($arResult)): ?>
    <div class="footer__menu footer-menu">
        <ul class="footer-menu__list">
            <?php foreach($arResult as $arItem):?>
                <?php $modal = $arItem['PARAMS']['modal']; ?>
                <li class="footer-menu__item">
                    <a href="<?=$arItem['LINK']?>"
                        <?php if($modal):?> data-modal-ajax-open="<?=$modal?>"<?php endif?>
                        <?php if($arItem['PARAMS']['target']):?> target="<?=$arItem['PARAMS']['target']?>"<?php endif?>><?=$arItem['TEXT']?></a>
                </li>
            <?php endforeach?>
        </ul>
    </div>
<?php endif ?>