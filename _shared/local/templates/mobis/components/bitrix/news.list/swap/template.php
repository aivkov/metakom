<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) {
    die();
}

/** @var array $arParams */
/** @var array $arResult */
/** @global \CMain $APPLICATION */
/** @global \CUser $USER */
/** @global \CDatabase $DB */
/** @var \CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var array $templateData */
/** @var \CBitrixComponent $component */

?>

<?php if($arResult['ITEMS']):?>
    <div class="swap">
        <div class="swap__list">
            <?php foreach($arResult['ITEMS'] as $arItem):?>
                <?php
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <div class="swap__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                    <div class="swap__img">
                        <?php $arSmallFile = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], ['width' => 316, 'height' => 800], BX_RESIZE_IMAGE_PROPORTIONAL_ALT);?>
                        <img src="<?=$arSmallFile['src']?>" alt="<?=$arItem['NAME']?>">
                    </div>
                    <div class="swap__info">
                        <div class="swap__title title"><?=$arItem['NAME']?></div>
                        <div class="swap__text"><?=$arItem['PREVIEW_TEXT']?></div>
                        <?php if($arItem['PROPERTIES']['LIST']['VALUE']):?>
                            <div class="swap__list">
                                <?php foreach ($arItem['PROPERTIES']['LIST']['VALUE'] as $listItem): ?>
                                    <div class="btn btn--transparent"><?= $listItem ?></div>
                                <?php endforeach ?>
                            </div>
                        <?php endif?>
                    </div>
                </div>
            <?php endforeach?>
        </div>
    </div>
<?php endif?>