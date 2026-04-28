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
    <div class="multi-desc">
        <div class="multi-desc__header">
            <h2 class="multi-desc__title section__title"><?=$arResult['PARENT_SECTION']['NAME']?></h2>
            <div class="multi-desc__desc"><?=$arResult['PARENT_SECTION']['DESCRIPTION']?></div>
        </div>

        <div class="multi-desc__list">
            <?php foreach($arResult['ITEMS'] as $key => $arItem):?>
                <?php
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <div class="multi-desc__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                    <div class="multi-desc__item-title title"><?=$arItem['NAME']?></div>
                    <div class="multi-desc__item-text"><?=$arItem['PREVIEW_TEXT']?></div>
                </div>
            <?php endforeach?>
        </div>
    </div>
<?php endif?>

