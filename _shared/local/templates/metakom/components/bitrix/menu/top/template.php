<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?php if (!empty($arResult)): ?>
    <div class="top-menu js-header-menu">
        <ul class="top-menu__list">
            <?php $previousLevel = 0;?>
            <?php foreach ($arResult as $arItem): ?>

            <?php if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel): ?>
                <?= str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"])); ?>
            <?php endif ?>

            <?php $extraClass = '';
                if($arItem["SELECTED"]) {
                    $extraClass .= ' selected';
                }
                if ($arItem["IS_PARENT"]) {
                    $extraClass .= ' top-menu__item--parent js-popup';
                }
            ?>

            <li class="top-menu__item <?=$extraClass ?>">
                <a href="<?= $arItem["IS_PARENT"] ? 'javascript:void(0)' : $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a>
                <?php if ($arItem["IS_PARENT"]): ?>
                    <ul class="top-menu__list--children js-popup-children">
                <?php endif ?>

            <?php $previousLevel = $arItem["DEPTH_LEVEL"]; ?>

            <?php endforeach ?>

            <?php if ($previousLevel > 1):?>
                <?= str_repeat("</ul></li>", ($previousLevel - 1)); ?>
            <?php endif ?>

        </ul>
                <div class="hamb js-toggle-menu"><i></i><i></i><i></i></div>
    </div>
<?php endif ?>