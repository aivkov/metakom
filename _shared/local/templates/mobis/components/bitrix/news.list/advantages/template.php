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
    <div class="advantages">
        <div class="advantages__list <?php if(count($arResult['ITEMS']) < 3):?>advantages__list--2col<?php endif?>">
            <?php foreach($arResult['ITEMS'] as $key => $arItem):?>
                <?php
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <div class="advantages__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                    <div class="advantages__img">
                        <?php $arSmallFile = CFile::ResizeImageGet($arItem['PROPERTIES']['PICTURE']['VALUE'], ['width' => 60, 'height' => 60], BX_RESIZE_IMAGE_PROPORTIONAL_ALT);?>
                        <img src="<?=$arSmallFile['src']?>" alt="<?=$arItem['NAME']?>">
                    </div>
                    <div class="advantages__title title"><?=$arItem['NAME']?></div>
                    <div class="advantages__text"><?=$arItem['PREVIEW_TEXT']?></div>
                </div>
            <?php endforeach?>
        </div>
    </div>
<?php endif?>


